<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MUser extends CI_Model
{

    function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('users_dash');
        $this->db->where('status', 1);
        $this->db->order_By('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditUser($idUser)
    {
        $this->db->select('*');
        $this->db->from('users_dash');
        $this->db->where('id', $idUser);
        $query = $this->db->get();
        return $query->result();
    }
}