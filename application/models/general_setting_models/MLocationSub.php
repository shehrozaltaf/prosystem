<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MLocationSub extends CI_Model
{
    function getAllLocationSubs()
    {

        $this->db->select('location_sub.id,
	location_sub.idLocation,
	location_sub.location_sub,
	location_sub.isActive,
	location.location');
        $this->db->from('location_sub');
        $this->db->where('location_sub.isActive', 1);
        $this->db->join('location', 'location_sub.idLocation = location.id', 'LEFT');
        $this->db->order_By('location_sub.id', 'DESC');
        $this->db->order_By('location_sub.idLocation', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditLocationSub($id)
    {
        $this->db->select('*');
        $this->db->from('location_sub');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name, $id)
    {
        $this->db->select('*');
        $this->db->from('location_sub');
        $this->db->where('location_sub', $name);
        $this->db->where('idLocation', $id);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}