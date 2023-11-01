<?php

class UserModel extends CI_Model
{
	var $table = "users";
	var $primaryKey = "id";

	public function getByEmailAndPassword($email, $password)
	{
		$this->db->where('email', $email);
		$user = $this->db->get("users")->row();
		if (!$user) {
			return false;
		};
		if (password_verify($password, $user->password)) {
			// Password cocok
			return $user;
		} else {
			// Password tidak cocok
			return false;
		}
	}


	public function insertGetId($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get($id = null)
	{
		$this->db->from('users');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get()->row();
		return $query;
	}

	public function getAll()
	{
		//hanya mengembalikan data yang is_active = 1
		$this->db->where("is_active", 1);
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	// delete data
	public function delete($id)
	{
		//hanya mengupdate is_active dari 1 menjadi 0
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, array("is_active" => 0));
	}

	public function getById($id)
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("id", $id);
		$query = $this->db->get();
		return $query;
	}

	public function getUsersJson() {
        $query = $this->db->get('users');
        return $query->result_array();
    }
}
