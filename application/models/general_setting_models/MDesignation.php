<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MDesignation extends CI_Model
{
    function getAllDesignations()
    {
        $this->db->select('hr_desig.id,
	hr_desig.desig, 
	hr_band.band');
        $this->db->from('hr_desig');
        $this->db->join('hr_band', 'hr_desig.band = hr_band.id', 'LEFT');
        $this->db->where('hr_desig.isActive', 1);
        $this->db->order_By('hr_desig.id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditDesignation($id)
    {
        $this->db->select('*');
        $this->db->from('hr_desig');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name,$band)
    {
        $this->db->select('*');
        $this->db->from('hr_desig');
        $this->db->where('desig', $name);
        $this->db->where('band', $band);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}