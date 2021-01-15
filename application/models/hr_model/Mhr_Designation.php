<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 23/11/2020
 * Time: 12:47
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Mhr_Designation extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function getAllDesignation()
    {
        $this->db->select('a.id id, a.desig desig, b.id bandid, b.band band');
        $this->db->from('hr_desig a');
        $this->db->join('hr_band b', 'a.band = b.id');
        //$this->db->order_By('a.field', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    function getDesignationAlreadyExists($id, $desig)
    {
        $query = $this->db->query("SELECT * FROM hr_desig where desig='$desig'");

        $results = array();

        foreach ($query->result() as $row) {

            if($id != $row->id)
            {
                $results['results'] = array(
                    "id" => $row->id,
                    "desig" => $row->desig
                );
            }
        }

        return $results;
        //return $query->result_array();
    }


    function getDesignationAlreadyExistsWithOutID($desig)
    {
        $query = $this->db->query("SELECT * FROM hr_desig where desig='$desig'");

        $results = array();

        foreach ($query->result() as $row) {
            $results['results'] = array(
                "id" => $row->id,
                "desig" => $row->desig
            );
        }

        return $results;
        //return $query->result_array();
    }

}