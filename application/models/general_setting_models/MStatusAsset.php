<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MStatusAsset extends CI_Model
{
    function getAllStatusAssets()
    {
        $this->db->select('*');
        $this->db->from('a_status');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditStatusAsset($id)
    {
        $this->db->select('*');
        $this->db->from('a_status');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('a_status');
        $this->db->where('status_value', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}