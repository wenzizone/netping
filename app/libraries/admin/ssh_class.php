<?php
class Ssh_class {
    private $conn;    //远程连接句柄
    private $host;    //远程主机地址
    private $username;    //远程主机登陆用户名
    private $passwd;    //远程主机登陆密码
    private $port;    //远程主机ssh端口号
    private $remote_cmd;    //远程主机上要执行的命令
    
    function __construct($remot_host,$username,$passwd,$port) {
        $this->host = $remot_host;
        $this->username = $username;
        $this->port = $port;
        $this->passwd = $passwd;
        $this->conn = ssh2_connect($this->host,$this->port) or die("连接远程服务器失败");
        ssh2_auth_password($this->conn, $this->username, $this->passwd) or die("远程验证失败，请检查用户名密码"); 
    }
    
    /**
     * 远程执行命令
     * @param $cmd
     */
    function ssh_exec($cmd) {
        $this->remote_cmd = $cmd;
        $stream['stdout'] = ssh2_exec($this->conn, $this->remote_cmd);
        $stream['stderr'] = ssh2_fetch_stream($stream['stdout'], SSH2_STREAM_STDERR);
        return $stream;
    }
    
    /**
     * 使用scp从远端传送文件 到本地
     * @param $remote_file
     * @param $local_file
     */
    function ssh_scp($remote_file,$local_file) {
        return ssh2_scp_recv($this->conn, $remote_file, $local_file);
    }
}
/* End of file ssh_class.php */
/* Location: ./app/libraries/admin/ssh_class.php */