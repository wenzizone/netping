<?php
Class Time extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('nav_model');
	}

	public function index() {
		$data = array();
		$options = array(
			'min_connect' => '最小值',
			'avg_connect' => '平均值',
			'max_connect' => '最大值',
			'lost_packet' => '丢包率'
		);

		$data['arrayidc'] = $this->data_model->get_src_list();
		$data['arrayprovince'] = $this->data_model->get_province();
		$data['arraynetwork'] = $this->data_model->get_network();
		$data['options']= $options;

		//var_dump($network);
		//exit();
		//$data = array('arrayidc' => $idc, 'arrayprovince' => $province, 'arraynetwork' => $network,'options' => $options);
		$layout_data = $this->nav_model->get_nav('time','page');
		$layout_data['content_body'] = $this->load->view('time_check', $data, true);

		$this->load->view('layout', $layout_data);
	}
}

/* End of file time.php */
/* Location: ./app/controllers/time.php */