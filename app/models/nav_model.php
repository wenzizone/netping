<?php
class Nav_model extends CI_Model {
	public function get_nav($cur_nav,$kind) {
		switch ($kind) {
			case 'admin':
				# code...
				return(array(
					'nav' => $this->admin_nav(),
					'nav_cur' => $cur_nav
					));
				break;
			
			case 'page':
				# code...
				return(array(
					'nav' => $this->page_nav(),
					'nav_cur' => $cur_nav
					));
				break;

			default :
				break;
		}
	}



	function page_nav() {
		$page_nav = array(
			array(
				'key' 	=> 'time',
				'title' => '按时间查询',
				'link'	=> 'time'
				),
			array(
				'key'	=> 'city',
				'title'	=> '按城市查询',
				'link'	=> 'city'
				)
			);
		return($page_nav);
	}

	function admin_nav() {
		$admin_nav = array (
			array(
				'key'	=> 'add',
				'title'	=> '服务器添加',
				'link'	=> 'admin/add'
				),
			array(
				'key'	=> 'list',
				'title'	=> '服务器列表',
				'link'	=> 'admin/list'
				)
			);
		return($admin_nav);
	}
}

/* End of file nav_model.php */
/* Location: ./app/model/nav_model.php */