<?php
class Data_model extends CI_Model {
	function __construct()
	{
		
	}
	
	// 获取idc信息
	public function get_src_list() {
		$idc = array();
		$this->db->select('server_ip,idc_name');
		$this->db->where('idc_status', 'online');
		$query = $this->db->get('tb_idcinfo');
		foreach ($query->result_array() as $row) {
			# code...
			$idc[$row['server_ip']] = $row['idc_name'];
		}
		return $idc;
	}

	// 获取省份列表
	public function get_province() {
		$province = array();
		$this->db->distinct();
		$this->db->select('province');
		$this->db->where('province is not NULL');
		$this->db->order_by('province');
		$query = $this->db->get('tb_nettest');
		foreach ($query->result_array() as $row) {
			# code...
			array_push($province, $row['province']);
		}
		return $province;
	}

	// 获取网络信息
	public function get_network() {
		$network = array();
		$this->db->select('name,alias');
		$query = $this->db->get('tb_netinfo');
		foreach ($query->result_array() as $row) {
			# code...
			$network[$row['alias']] = $row['name'];
		}
		return $network;
	}

	// 拿到31省数据的平均值
	public function get_31_province_avg_data($data) {

		if ($data['stime'] && $data['etime']){
			$this->db->select('province');
			$this->db->select_avg($data['options'], 'avg_options');
			$this->db->where('src_ip', $data['srcip']);
			$this->db->where('network', $data['network']);
			$this->db->where('test_time <=', $data['etime']);
			$this->db->where('test_time >=', $data['stime']);
			$this->db->group_by('province');

			//$sql = sprintf("select province,avg(%s) as min_connect from tb_nettest where src_ip='%s' and network='%s' and date(test_time) between '%s' and '%s' group by province",$connect,$srcip,$network,$data['stime'],$data['etime']);
		}elseif ($data['stime'] && $data['etime'] == ""){
			$this->db->select('province');
			$this->db->select_avg($data['options'], 'avg_options');
			$this->db->where('src_ip', $data['srcip']);
			$this->db->where('network', $data['network']);
			$this->db->where('test_time >=', $data['stime']);
			$this->db->group_by('province');

			//$sql = sprintf("select province,avg(%s) as min_connect from tb_nettest where src_ip='%s' and network='%s' and date(test_time)>='%s' group by province",$connect,$srcip,$network,$data['stime']);
		}elseif ($data['stime'] == "" && $data['etime']){
			$this->db->select('province');
			$this->db->select_avg($data['options'], 'avg_options');
			$this->db->where('src_ip', $data['srcip']);
			$this->db->where('network', $data['network']);
			$this->db->where('test_time <=', $data['etime']);
			$this->db->group_by('province');

			//$sql = sprintf("select province,avg(%s) as min_connect from tb_nettest where src_ip='%s' and network='%s' and date(test_time)<='%s' group by province",$connect,$srcip,$network,$data['etime']);
		}else{
			$this->db->select('province');
			$this->db->select_avg($data['options'], 'avg_options');
			$this->db->where('src_ip', $data['srcip']);
			$this->db->where('network', $data['network']);
			$this->db->group_by('province');
			
			//$sql = sprintf("select province,avg(%s) as min_connect from tb_nettest where src_ip='%s' and network='%s' group by province",$connect,$srcip,$network);
		}
		$query = $this->db->get('tb_nettest');
		return($query->result_array());
	}

}

/* End of file data_model.php */
/* Location: ./app/model/data_model.php */