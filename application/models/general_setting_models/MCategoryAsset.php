<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MCategoryAsset extends CI_Model
{
    function getAllCategoryAssets()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('isActive', 1);
        $this->db->order_By('idCategory', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditCategoryAsset($id)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('idCategory', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}