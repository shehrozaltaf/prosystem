<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MSourceOfPurchase extends CI_Model
{
    function getAllSourceOfPurchases()
    {
        $this->db->select('*');
        $this->db->from('a_sourceOfPurchase');
        $this->db->where('isActive', 1);
        $this->db->order_By('idSop', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditSourceOfPurchase($id)
    {
        $this->db->select('*');
        $this->db->from('a_sourceOfPurchase');
        $this->db->where('idSop', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('a_sourceOfPurchase');
        $this->db->where('sopValue', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}