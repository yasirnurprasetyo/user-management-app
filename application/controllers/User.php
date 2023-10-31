<?php

class User extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model("UserModel");
		// isLogin();
		date_default_timezone_set('Asia/Jakarta');
	}

    public function index() {
		$listUser = $this->UserModel->getAll();
		$data = array(
			"header" => "User",
			"page" => "content/user/v_list_user",
			"users" => $listUser
		);
		$this->load->view("layouts/main", $data);
	}

    
}