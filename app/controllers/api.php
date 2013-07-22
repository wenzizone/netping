<?php

class Api extends CI_Controller {
	public function get_detail() {
		var_dump($this->input->post());
		exit();
	}
}

/* End of file api.php */
/* Location: ./app/controllers/api.php */