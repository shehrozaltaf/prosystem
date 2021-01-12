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


    function getLocationAlreadyExists($id, $loc)
    {
        $query = $this->db->query("SELECT * FROM hr_location where location='$loc'");

        $results = array();

        foreach ($query->result() as $row) {

            if ($id != $row->id) {

                $results['results'] = array(
                    "id" => $row->id,
                    "location" => $row->location
                );
            }
        }

        return $results;
        //return $query->result_array();
    }


    function getLocationAlreadyExistsWithOutID($loc)
    {
        $query = $this->db->query("SELECT * FROM hr_location where location='$loc'");

        $results = array();

        foreach ($query->result() as $row) {

            $results['results'] = array(
                "id" => $row->id,
                "location" => $row->location
            );

        }

        return $results;
        //return $query->result_array();
    }

}