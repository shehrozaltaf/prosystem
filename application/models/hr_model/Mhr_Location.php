<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mhr_Location extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    function getAllLocation()
    {
        $this->db->select('*');
        $this->db->from('hr_location');
        $this->db->order_By('location', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}