<?php
class Fungsi{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('UserModel');
        $id = $this->ci->session->userdata('id');
        $user_data = $this->ci->UserModel->get($id);
        return $user_data;
    }
}