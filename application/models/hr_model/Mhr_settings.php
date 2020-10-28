<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mhr_settings extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('hr_location');        
        $this->db->order_By('location', 'DESC');
        $query = $this->db->get();
        return $query->result();
    } 


}