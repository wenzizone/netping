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

	public function add_servers() {
		$layout_data['content_body'] = $this->load->view('admin/add_servers', '', true);
		$this->load->view('admin/layout',$layout_data);
	}
}

/* End of file api.php */
/* Location: ./app/controllers/admin/api.php */