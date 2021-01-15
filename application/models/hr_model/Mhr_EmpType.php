<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 25/11/2020
 * Time: 12:43
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Mhr_EmpType extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function getAllEmpType()
    {
        $this->db->select('*');
        $this->db->from('hr_emptype');
        $this->db->order_By('emptype', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    function getEmpTypeAlreadyExists($id, $emptype)
    {
        $query = $this->db->query("SELECT * FROM hr_emptype where emptype='$emptype'");

        $results = array();

        foreach ($query->result() as $row) {

            if ($id != $row->id) {

                $results['results'] = array(
                    "id" => $row->id,
                    "emptype" => $row->emptype
                );

            }
        }

        return $results;
        //return $query->result_array();
    }


    function getEmpTypeAlreadyExistsWithoutID($emptype)
    {
        $query = $this->db->query("SELECT * FROM hr_emptype where emptype='$emptype'");

        $results = array();

        foreach ($query->result() as $row) {

            $results['results'] = array(
                "id" => $row->id,
                "emptype" => $row->emptype
            );

        }

        return $results;
        //return $query->result_array();
    }
}