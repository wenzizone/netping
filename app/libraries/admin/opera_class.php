<?php
class Opera_Model {
    private $remote_host;    //远程主机地址
    private $username;    //远程主机登陆用户名
    private $passwd;    //远程主机登陆密码
    private $port;    //远程主机ssh端口号
    private $remote_cmd;    //远程主机上要执行的命令
    //private $sshd;        //ssh的句柄
    private $time;        //当天日期
    private $CI;

    function __construct($params) {
        $this->remote_host = $params['ip'];
        $this->username = $params['username'];
        $this->passwd = $params['passwd'];
        $this->port = $params['port'];
        $this->CI = &get_instance(); 
        $this->CI->load->library('ssh_class', $params);

        //($this->remote_host, $this->username, $this->passwd, $this->port);
    }

    /**
     * 下线功能
     * @param $time
     */
    function offline($time,$base_dir) {
        $this->time = $time;

        $remote_file = $base_dir . '/net-test.log';
        $local_file = LOG_DIR.$this->remote_host.'_'.$time.'.log';
        /**
         * 第一步：远程执行uninstall脚本，清除crontab内容
         */
        $uninstall_cmd = 'sh ' . $base_dir . '/uninstall';
        $unins_result = $this->CI->ssh_class->ssh_exec($uninstall_cmd);
        stream_set_blocking($unins_result['stdout'], true);
        stream_set_blocking($unins_result['stderr'], true);

        preg_match("/(uninstall done)/", stream_get_contents($unins_result['stdout']), $uninstall_status);
        if (!$uninstall_status[0]) {
            return stream_get_contents($unins_result['stderr']);
        }
        /**
         * 第二步：传回监控日志
         */
        $trans_status = $this->CI->ssh_class->ssh_scp($remote_file, $local_file);
        if (!$trans_status) {
            return "传输log失败，请检查";
        }
        /**
         * 第三步：删除远端服务器上的网络测试脚本
         */
        $del_cmd = 'rm -rf ' . $base_dir;
        $delet_result = $this->CI->ssh_class->ssh_exec($del_cmd);
        stream_set_blocking($delet_result['stderr'], true);

        if (stream_get_contents($delet_result['stderr'])) {
            $FH = fopen(SYSLOG_DIR . '/error.log', 'a');
            fwrite($FH, stream_get_contents($delet_result['stderr']));
            fclose($FH);
            return stream_get_contents($delet_result['stderr']);
        } else {
            return true;
        }
    }
    
    /**
     * 服务器上线功能
     * @param $idcarray
     */

    function online($idcarray) {
        /*
         * 1，远程执行svn checkout
         */
        //获得远程服务器当前路径
        $shell_cmd = 'pwd';
        $shell_result = $this->CI->ssh_class->ssh_exec($shell_cmd);
        stream_set_blocking($shell_result['stdout'], true);
        stream_set_blocking($shell_result['stderr'], true);

        $base_dir = stream_get_contents($shell_result['stdout']);
        if (!$base_dir) {
            return stream_get_contents($shell_result['stderr']);
        }
        $idcarray['basedir'] = trim($base_dir).SCRIPT_BASEDIR;    //设置网络测试脚本的主目录

        $svn_cmd = "svn co '".SCRIPT_POSITION."'".' '.$idcarray['basedir'];
        $svnco_result = $this->CI->ssh_class->ssh_exec($svn_cmd);
        stream_set_blocking($svnco_result['stdout'], true);
        stream_set_blocking($svnco_result['stderr'], true);

        preg_match("/([0-9]{1,})/", stream_get_contents($svnco_result['stdout']), $svn_version);
        if (!$svn_version[0]) {
            return stream_get_contents($svnco_result['stderr']);
        }
        /*
         * 2，远程执行install脚本
         */
        $install_cmd = 'sh '.$idcarray['basedir'].'/install.sh';
        $install_result = $this->CI->ssh_class->ssh_exec($install_cmd);
        stream_set_blocking($install_result['stdout'], true);
        stream_set_blocking($install_result['stderr'], true);
        preg_match("/(install done)/", stream_get_contents($install_result['stdout']),$install_status);
        if (!$install_status) {
            return stream_get_contents($install_result['stderr']);
        }
        /*
         * 3，成功后执行idc信息入库
         */
        $m_idc =new Idc_Model();
        $w_db_status = $m_idc->addidc($idcarray);
        if ($w_db_status) {
            return true;
        } else {
            return "写入数据库出错";
        }
    }
    /**
     * 测试脚本更新
     */
    function update() {
        if ($this->username == 'root') {
            $base_dir = '/root/net-test/';
        } else {
            $base_dir = '/home/'.$this->username.'/net-test/';
        }
        $update_cmd = 'svn up ' . $base_dir;
        $update_status = $this->CI->ssh_class->ssh_exec($update_cmd);

        stream_set_blocking($update_status['stdout'], true);
        stream_set_blocking($update_status['stderr'], true);
        $stdout = stream_get_contents($update_status['stdout']);
        $stderr = stream_get_contents($update_status['stderr']);
        if ($stdout) {
            if($stderr) {
                $msg['status'] = false;
                $msg['msg'] = '远程服务器更新可能部分有问题，请查看日志';
                $FH = fopen(SYSLOG_DIR . '/error.log', 'a');
                fwrite($FH, $stderr);
                return $msg;
            } else {
                $msg['status'] = true;
                preg_match("/([0-9]{1,})/", $stdout, $match);
                $msg['msg'] = '远程服务器已经更新到 ' . $match[0] . ' 版本';
                return $msg;
            }
        } else {
            $msg['status'] = false;
            $msg['msg'] = '远程更新有问题，可能是svn命令不存在，请检查';
            return $msg;
        }
    }
}

/* End of file opera_model.php */
/* Location: ./app/models/admin/opera_model.php */