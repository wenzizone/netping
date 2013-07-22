<?php
Class Index extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        //echo "test";
        $layout_data['content_body'] = $this->load->view('admin/index', '', true);
        $this->load->view('admin/layout', $layout_data);
    }
}
/* End of file index.php */
/* Location: ./app/controllers/admin/index.php */