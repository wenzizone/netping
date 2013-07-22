<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {

		$province = array();
		$idc = array();
		$network = array();
		$options = array(
			'min_connect' => '最小值',
			'avg_connect' => '平均值',
			'max_connect' => '最大值',
			'lost_packet' => '丢包率'
		);

		$this->load->model('db_model');


		# 获取idc信息
		$query = $this->db_model->query('SELECT server_ip,idc_name FROM net_test.tb_idcinfo WHERE idc_status="online"');
		foreach ($query as $row) {
			$idc[$row->server_ip] = $row->idc_name;
		}
		
		
		# 获取省份列表
		$query = $this->db_model->query('SELECT DISTINCT province FROM tb_nettest where province is not NULL order by province');
		foreach ($query as $row) {
			array_push($province, $row->province);
		}

		#获取网络信息
		$query = $this->db_model->query('SELECT name,alias FROM tb_netinfo');
		foreach ($query as $row) {
			$network[$row->alias] = $row->name;
		}
		//var_dump($network);
		//exit();
		$data = array('arrayidc' => $idc, 'arrayprovince' => $province, 'arraynetwork' => $network,'options' => $options);
		$layout_data['content_body'] = $this->load->view('index', $data, true);
		$this->load->view('layout', $layout_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */