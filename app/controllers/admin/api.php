<?php
Class Api extends CI_Controller {
	function __construct() {
  		parent::__construct();
 	}
	public function list_idc() {
		//echo "test";
		$layout_data['content_body'] = $this->load->view('admin/index', '', true);


		$this->load->view('admin/layout', $layout_data);
	}

	public function add_server() {
		$idcarray['server_ip'] = $this->input->post('test_server_ip');	//测试服务器的ip地址
		$idcarray['login_name'] = $this->input->post('test_server_login_name');	//测试服务器的登陆用户
		$idcarray['login_passwd'] = $this->input->post('test_server_login_passwd');	//测试服务器的连接密码
		$idcarray['port'] = $this->input->post('test_server_sshport');	//得到测试服务器的远程端口
		$idcarray['idc_name'] = $this->input->post('idc_name');	//得到idc名称
		$idcarray['online_time'] = date("Y-m-d");	//得到测试idc上线时间
		$idcarray['idc_status'] = 'online';	//设置此服务器状态的在线
		
	}

	public function import_to_db () {
		$Djson = $this->input->post();
		
		//$Djson = stripcslashes($_POST);
		//$Djson = json_decode($$_POST);
		
		$this->load->model('db_model');
		$this->db_model->insert_entry($Djson);
	}
}

/* End of file api.php */
/* Location: ./app/controllers/admin/api.php */