<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
    }

    public function index()
    {
        $this->load->view("layouts/login");
    }

    public function proses()
    {
        $email =  $this->input->post("email", TRUE);
        $password =  $this->input->post("password", TRUE);
        $user = $this->UserModel->getByEmailAndPassword($email, $password);
        // echo var_dump("user",$user);
        if ($user == null) {
            $this->session->set_flashdata('error', 'Email dan Password anda tidak ditemukan!');
            // redirect("login");
        } else {
            // Apa yang mau dikirimkan melalui session
            $dataSession = array(
                "id_data" => $user->id,
                "name_data" => $user->name,
                "email_data" => $user->email,
                "is_active_data" => $user->is_active,
                "is_logged_in" => true
            );
            $this->session->set_userdata($dataSession);
            $this->session->set_flashdata('success', 'Selamat datang di K-24  ' . $user->name);
            redirect("user");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}