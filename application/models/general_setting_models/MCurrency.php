<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MCurrency extends CI_Model
{
    function getAllCurrency()
    {
        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where('isActive', 1);
        $this->db->order_By('idCurrency', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditCurrency($id)
    {
        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where('idCurrency', $id);
        $query = $this->db->get();
        return $query->result();
    }

}