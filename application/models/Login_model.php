<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function login()
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('jabatan', $jabatan);
        return $this->db->get('user')->row();
    }
    public function update($email, $data)
    {
        $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }
    public function getUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user');
    }
    public function getEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('user');
    }
    public function getJabatan()
    {
        $this->db->where('jabatan');
        return $this->db->get('user')->row();
    }
}
