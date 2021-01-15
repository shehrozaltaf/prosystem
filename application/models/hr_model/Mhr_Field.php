<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 20/11/2020
 * Time: 11:17
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mhr_Field extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    function getAllField()
    {
        $this->db->select('*');
        $this->db->from('hr_field');
        $this->db->order_By('field', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    function getFieldAlreadyExists($id, $field)
    {
        $query = $this->db->query("SELECT * FROM hr_field where field='$field'");

        $results = array();

        foreach ($query->result() as $row) {

            if($id != $row->id)
            {
                $results['results'] = array(
                    "id" => $row->id,
                    "field" => $row->field
                );
            }
        }

        return $results;
        //return $query->result_array();
    }


    function getFieldAlreadyExistsWithOutID($field)
    {
        $query = $this->db->query("SELECT * FROM hr_field where field='$field'");

        $results = array();

        foreach ($query->result() as $row) {
            $results['results'] = array(
                "id" => $row->id,
                "field" => $row->field
            );
        }

        return $results;
        //return $query->result_array();
    }

}