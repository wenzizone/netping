<?php
class Db_model extends CI_Model {
	function __construct()
	{

    }

    public function insert_entry($data) {
    	$this->db->insert('tb_nettest',$data);
    }

    public function query($sql) {
    	$query = $this->db->query($sql);
    	return $query->result();
    }
}

/* End of file db_model.php */
/* Location: ./app/model/db_model.php */