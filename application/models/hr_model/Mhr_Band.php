<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 21/11/2020
 * Time: 15:04
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Mhr_Band extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function getAllBand()
    {
        $this->db->select('*');
        $this->db->from('hr_band');
        $this->db->order_By('band', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    function getBandAlreadyExists($id, $band)
    {
        $query = $this->db->query("SELECT * FROM hr_band where band='$band'");

        $results = array();

        foreach ($query->result() as $row) {

            if ($id != $row->id) {

                $results['results'] = array(
                    "id" => $row->id,
                    "band" => $row->band
                );

            }
        }

        return $results;
        //return $query->result_array();
    }


    function getBandAlreadyExistsWithoutID($band)
    {
        $query = $this->db->query("SELECT * FROM hr_band where band='$band'");

        $results = array();

        foreach ($query->result() as $row) {

            $results['results'] = array(
                "id" => $row->id,
                "band" => $row->band
            );

        }

        return $results;
        //return $query->result_array();
    }
}