<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mprojected extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('b_projected');
        $this->db->where('isActive', 1);
        $this->db->order_By('idPrjn', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getProjected($searchdata)
    {
        $start = 0;
        $length = 25;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }


        if (isset($searchdata['prjn_month']) && $searchdata['prjn_month'] != '' && $searchdata['prjn_month'] != null) {
            $this->db->where('p.prjn_month', $searchdata['prjn_month']);
        }
        if (isset($searchdata['prjn_year']) && $searchdata['prjn_year'] != '' && $searchdata['prjn_year'] != null) {
            $this->db->where('p.prjn_year', $searchdata['prjn_year']);
        }
        if (isset($searchdata['proj_code']) && $searchdata['proj_code'] != '' && $searchdata['proj_code'] != null) {
            $this->db->where('p.proj_code', $searchdata['proj_code']);
        }
        if (isset($searchdata['bdgt_code']) && $searchdata['bdgt_code'] != '' && $searchdata['bdgt_code'] != null) {
            $this->db->where('p.bdgt_code', $searchdata['bdgt_code']);
        }
        if (isset($searchdata['emp_code']) && $searchdata['emp_code'] != '' && $searchdata['emp_code'] != null) {
            $this->db->where('p.empl_code', $searchdata['emp_code']);
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(p.proj_code like '%" . $search . "%' 
            OR  p.bdgt_code like '%" . $search . "%'
            OR  p.empl_code like '%" . $search . "%'
            OR  p.prjn_pctg like '%" . $search . "%'
            OR  p.prjn_month like '%" . $search . "%'
            OR  p.prjn_year like '%" . $search . "%'
            OR  hr_desig.desig like '%" . $search . "%'
            OR  hr_employee.empname like '%" . $search . "%'
            )");
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }
        $this->db->select('p.idPrjn,
	p.proj_code,
	p.empl_code,
	p.prjn_pctg,
	p.prjn_month,
	p.prjn_year,
	p.bdgt_code,
	hr_desig.desig,
	hr_employee.empname');
        $this->db->from('b_projected p');
        $this->db->join('hr_employee', 'p.empl_code = hr_employee.empno', 'left');
        $this->db->join('hr_desig', 'hr_desig ON hr_employee.titdesi = hr_desig.id', 'left');
        $this->db->where('p.isActive', 1);
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalProjected($searchdata)
    {
        if (isset($searchdata['prjn_month']) && $searchdata['prjn_month'] != '' && $searchdata['prjn_month'] != null) {
            $this->db->where('p.prjn_month', $searchdata['prjn_month']);
        }
        if (isset($searchdata['prjn_year']) && $searchdata['prjn_year'] != '' && $searchdata['prjn_year'] != null) {
            $this->db->where('p.prjn_year', $searchdata['prjn_year']);
        }
        if (isset($searchdata['proj_code']) && $searchdata['proj_code'] != '' && $searchdata['proj_code'] != null) {
            $this->db->where('p.proj_code', $searchdata['proj_code']);
        }
        if (isset($searchdata['bdgt_code']) && $searchdata['bdgt_code'] != '' && $searchdata['bdgt_code'] != null) {
            $this->db->where('p.bdgt_code', $searchdata['bdgt_code']);
        }
        if (isset($searchdata['emp_code']) && $searchdata['emp_code'] != '' && $searchdata['emp_code'] != null) {
            $this->db->where('p.empl_code', $searchdata['emp_code']);
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(p.proj_code like '%" . $search . "%' 
            OR  p.bdgt_code like '%" . $search . "%'
            OR  p.empl_code like '%" . $search . "%'
            OR  p.prjn_pctg like '%" . $search . "%'
            OR  p.prjn_month like '%" . $search . "%'
            OR  p.prjn_year like '%" . $search . "%'
            OR  hr_desig.desig like '%" . $search . "%'
            OR  hr_employee.empname like '%" . $search . "%'
            )");
        }
        $this->db->select('count(p.idPrjn) as cnttotal');
        $this->db->from('b_projected p');
        $this->db->join('hr_employee', 'p.empl_code = hr_employee.empno', 'left');
        $this->db->join('hr_desig', 'hr_desig ON hr_employee.titdesi = hr_desig.id', 'left');
        $this->db->where('p.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function checkBdgtProjected($searchdata)
    {
        if (isset($searchdata['proj_code']) && $searchdata['proj_code'] != '' && $searchdata['proj_code'] != null) {
            $this->db->where('p.proj_code', $searchdata['proj_code']);
        }
        if (isset($searchdata['bdgt_code']) && $searchdata['bdgt_code'] != '' && $searchdata['bdgt_code'] != null) {
            $this->db->where('p.bdgt_code', $searchdata['bdgt_code']);
        }
        if (isset($searchdata['prjn_month']) && $searchdata['prjn_month'] != '' && $searchdata['prjn_month'] != null) {
            $this->db->where('p.prjn_month', $searchdata['prjn_month']);
        }
        if (isset($searchdata['prjn_year']) && $searchdata['prjn_year'] != '' && $searchdata['prjn_year'] != null) {
            $this->db->where('p.prjn_year', $searchdata['prjn_year']);
        }
        if (isset($searchdata['hr_active']) && $searchdata['hr_active'] != '' && $searchdata['hr_active'] != null) {
            $this->db->where('hr_employee.status', 1);
            $this->db->join('hr_employee', 'p.empl_code = hr_employee.empno', 'left');
        }
        $this->db->select('*');
        $this->db->from('b_projected p');
        $this->db->where('p.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}