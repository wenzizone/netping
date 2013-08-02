<?php

class Api extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('data_model');
	}

	public function get_detail() {
		//var_dump($this->input->post());

		$a_idcip = $this->input->post('idcgroup');	//提交的机房ip组
		$a_province = $this->input->post('prov');	//提交的省份
		$s_network = $this->input->post('network');	//提交的网络环境，电信，网通等等。
		$s_options = $this->input->post('options');	//提交的网络数据类型，如丢包率，最小值等等。
		$s_stime = strtotime($this->input->post('stime'));	//提交查询起始时间(时间戳)
		$s_etime = strtotime($this->input->post('etime'));	//提交查询结束时间(时间戳)

		$this->load->model('db_model');
		$a_idcres = array();
		foreach ($a_idcip as $key => $value) {
			
			$a_prov = array();
			foreach ($a_province as $k => $v) {
				$a_res = array();
				$s_sql = sprintf("select test_time,%s from tb_nettest where src_ip='%s' and province='%s' and network='%s' and test_time between %s and %s order by test_time",$s_options,$value,$v,$s_network,$s_stime,$s_etime);
				$query = $this->db_model->query($s_sql);
				foreach ($query as $row) {
					array_push($a_res, array((int)$row->test_time*1000,(float)$row->$s_options));
				}
				$a_prov[$s_options][$v] = $a_res;
			}
			$a_idcres[$value] = $a_prov;
		}

		echo json_encode($a_idcres);
	}

	public function get_city_check_detail() {
		$a_idcip = $this->input->post('idcgroup');	//提交的机房ip组
		$data['network'] = $this->input->post('network');	//提交的网络环境，电信，网通等等。
		$data['options'] = $this->input->post('options');	//提交的网络数据类型，如丢包率，最小值等等。
		$data['stime'] = strtotime($this->input->post('stime'));	//提交查询起始时间(时间戳)
		$data['etime'] = strtotime($this->input->post('etime'));	//提交查询结束时间(时间戳)
		$data['province'] = $this->data_model->get_province();

		$a_res = array();

		foreach ($a_idcip as $index => $ip) {
			$a_tmp = array();
			$a_tmp_prov = array();
			$a_tmp_value = array();
			$data['srcip'] = $ip;
			# code...
			$a_datatemp = $this->data_model->get_31_province_avg_data($data);
			foreach ($a_datatemp as $row) {
				array_push($a_tmp_prov, $row['province']);
				array_push($a_tmp_value, (float)$row['avg_options']);
			}
			$a_res[$data['options']][$ip] = array('city' => $a_tmp_prov, 'data' => $a_tmp_value);
		}
		echo json_encode($a_res);
		//var_dump($a_res);
		//exit();

	}
}

/* End of file api.php */
/* Location: ./app/controllers/api.php */