<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 23/11/2020
 * Time: 17:14
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Mhr_Dept extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function getAllDept()
    {
        $this->db->select('*');
        $this->db->from('hr_dept');
        $this->db->order_By('dept', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    function getDeptAlreadyExists($id, $dept)
    {
        $query = $this->db->query("SELECT * FROM hr_dept where dept='$dept'");

        $results = array();

        foreach ($query->result() as $row) {

            if ($id != $row->id) {

                $results['results'] = array(
                    "id" => $row->id,
                    "dept" => $row->dept
                );

            }
        }

        return $results;
        //return $query->result_array();
    }


    function getDeptAlreadyExistsWithoutID($dept)
    {
        $query = $this->db->query("SELECT * FROM hr_dept where dept='$dept'");

        $results = array();

        foreach ($query->result() as $row) {

            $results['results'] = array(
                "id" => $row->id,
                "dept" => $row->dept
            );

        }

        return $results;
        //return $query->result_array();
    }
}