<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mproject extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('isActive', 1);
        $this->db->order_By('idProject', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    function getProjectById($id)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('isActive', 1);
        $this->db->where('idProject', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getProjectByProCode($code)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('isActive', 1);
        $this->db->where('proj_code', $code);
        $query = $this->db->get();
        return $query->result();
    }



    function getProjectBands($code)
    {
        /*not in use*/
        $this->db->select('*');
        $this->db->from('b_budget');
        $this->db->where('b_budget.isActive', 1);
        $this->db->where('b_budget.proj_code', $code);
        $query = $this->db->get();
        return $query->result();
    }




}