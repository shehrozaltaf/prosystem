<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MInventory extends CI_Model
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $table = 'i_paedsinventory';
    }

    function getInventory($searchdata)
    {
        $start = 0;
        $length = 25;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }


        if (isset($searchdata['username']) && $searchdata['username'] != '' && $searchdata['username'] != null) {
            $this->db->where("(i.username like '%" . $searchdata['username'] . "%')");
        }
        if (isset($searchdata['ftag']) && $searchdata['ftag'] != '' && $searchdata['ftag'] != null) {
            $this->db->where("(i.ftag like '%" . $searchdata['ftag'] . "%')");
        }
        if (isset($searchdata['aaftag']) && $searchdata['aaftag'] != '' && $searchdata['aaftag'] != null) {
            $this->db->where("(i.aaftag like '%" . $searchdata['aaftag'] . "%')");
        }
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where('i.location', $searchdata['location']);
        }
        if (isset($searchdata['project']) && $searchdata['project'] != '' && $searchdata['project'] != null) {
            $this->db->where('i.project', $searchdata['project']);
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where('i.status', $searchdata['status']);
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(i.username like '%" . $search . "%' OR  i.ftag like '%" . $search . "%')");
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }
        $this->db->select('*');
        $this->db->from('i_paedsinventory i');
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalInventory($searchdata)
    {

        if (isset($searchdata['username']) && $searchdata['username'] != '' && $searchdata['username'] != null) {
            $this->db->where("(i.username like '%" . $searchdata['username'] . "%')");
        }
        if (isset($searchdata['ftag']) && $searchdata['ftag'] != '' && $searchdata['ftag'] != null) {
            $this->db->where("(i.ftag like '%" . $searchdata['ftag'] . "%')");
        }
        if (isset($searchdata['aaftag']) && $searchdata['aaftag'] != '' && $searchdata['aaftag'] != null) {
            $this->db->where("(i.aaftag like '%" . $searchdata['aaftag'] . "%')");
        }
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where('i.location', $searchdata['location']);
        }
        if (isset($searchdata['project']) && $searchdata['project'] != '' && $searchdata['project'] != null) {
            $this->db->where('i.project', $searchdata['project']);
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where('i.status', $searchdata['status']);
        }
        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(i.username like '%" . $search . "%' OR  i.ftag like '%" . $search . "%')");
        }

        $this->db->select('count(id) as cnttotal');
        $this->db->from('i_paedsinventory i');
        $query = $this->db->get();
        return $query->result();
    }
}