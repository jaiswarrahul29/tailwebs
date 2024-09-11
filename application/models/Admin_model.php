<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function getUserByUsername($username)
    {
        $query = $this->db->get_where('admin_users', array('email' => $username));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }


    public function getAllUsers()
    {
        $query = $this->db->get('admin_users');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }


    public function updateUser($email, $data)
    {
        $this->db->where(array('email' => $email))->update('admin_users', $data);
        return true;
    }
}
