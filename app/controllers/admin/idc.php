<?php
Class Idc extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function add_servers() {
        $layout_data['content_body'] = $this->load->view('admin/add_servers', '', true);
        $this->load->view('admin/layout',$layout_data);
    }
}
/* End of file idc.php */
/* Location: ./app/controllers/admin/idc.php */