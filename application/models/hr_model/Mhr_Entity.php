<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 23/11/2020
 * Time: 17:34
 */


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Mhr_Entity extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function getAllEntity()
    {
        $this->db->select('*');
        $this->db->from('hr_entity');
        $this->db->order_By('entity', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    function getEntityAlreadyExists($id, $entity)
    {
        $query = $this->db->query("SELECT * FROM hr_entity where entity='$entity'");

        $results = array();

        foreach ($query->result() as $row) {

            if ($id != $row->id) {

                $results['results'] = array(
                    "id" => $row->id,
                    "entity" => $row->entity
                );

            }
        }

        return $results;
        //return $query->result_array();
    }


    function getEntityAlreadyExistsWithoutID($entity)
    {
        $query = $this->db->query("SELECT * FROM hr_entity where entity='$entity'");

        $results = array();

        foreach ($query->result() as $row) {

            $results['results'] = array(
                "id" => $row->id,
                "entity" => $row->entity
            );

        }

        return $results;
        //return $query->result_array();
    }
}