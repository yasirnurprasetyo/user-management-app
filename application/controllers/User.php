<?php

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel");
		// isLogin();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$listUser = $this->UserModel->getAll();
		$data = array(
			"header" => "User",
			"page" => "content/user/v_list_user",
			"users" => $listUser
		);
		$this->load->view("layouts/main", $data);
	}

	public function tambah()
	{
		$user = new stdClass();
		$user->no_ktp = null;
		$user->name = null;
		$user->password = null;
		$user->email = null;
		$user->gender = null;
		$user->phone = null;
		$user->role = null;
		$user->photo = null;
		$data = array(
			"header" => "User",
			"pages" => "register",
			"users" => $user,
			"page" => "content/user/v_form_user",
		);
		$this->load->view("layouts/main", $data);
	}

	public function proses_simpan()
	{
		// Upload gambar
		$config['upload_path'] = './upload/images/user/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '.5000';
		$config['file_name'] = 'user-' . date('ymd') . '-' . substr(md5(rand()), 0, 100000);
		$this->load->library('upload', $config);
		$b = $this->input->post(null, TRUE);
		if (isset($_POST['register'])) {
			// Data inputan
			if (@$_FILES['photo']['name'] != null) {
				if ($this->upload->do_upload('photo')) {
					$c = $b['photo'] = $this->upload->data('file_name');
					$users = array(
						"no_ktp" => $this->input->post("no_ktp"),
						"name" => $this->input->post("name"),
						"email" => $this->input->post("email"),
						"password" => $this->input->post("password"),
						"phone" => $this->input->post("phone"),
						"date_birth" => $this->input->post("date_birth"),
						"gender" => $this->input->post("gender"),
						"role" => $this->input->post("role"),
						"photo" => $c
					);
					$this->UserModel->insert($users);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success', 'Data Sukses disimpan');
					}
					redirect("user");
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('user/tambah');
				}
			} else {
				$b["phone"] = null;
				$users = array(
					"no_ktp" => $this->input->post("no_ktp"),
					"name" => $this->input->post("name"),
					"email" => $this->input->post("email"),
					"password" => $this->input->post("password"),
					"phone" => $this->input->post("phone"),
					"date_birth" => $this->input->post("date_birth"),
					"gender" => $this->input->post("gender"),
					"role" => $this->input->post("role")
				);
				$this->UserModel->insert($users);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Sukses disimpan');
				}
				redirect("user");
			}
		}
	}
}
