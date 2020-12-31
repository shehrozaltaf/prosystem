<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mbudget extends CI_Model
{
    function getBdgt($searchdata)
    {
        $start = 0;
        $length = 25;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }


        if (isset($searchdata['proj_code']) && $searchdata['proj_code'] != '' && $searchdata['proj_code'] != null && $searchdata['proj_code'] != 0) {
            $this->db->where('b_budget.proj_code', $searchdata['proj_code']);
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(b_budget.proj_code like '%" . $search . "%' 
            OR  b_budget.bdgt_code like '%" . $search . "%' 
            OR  hr_desig.desig like '%" . $search . "%'
            OR  hr_band.band like '%" . $search . "%'
            OR b_budget.bdgt_amnt like '%" . $search . "%'
            OR b_budget.bdgt_pctg like '%" . $search . "%'
            OR b_budget.start_m_y like '%" . $search . "%'
            OR b_budget.end_m_y like '%" . $search . "%'
            )");
        }

        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }
        $this->db->select('b_budget.idBugt,
	b_budget.proj_code,
	b_budget.bdgt_code,
	b_budget.bdgt_posi,
	b_budget.bdgt_band,
	b_budget.bdgt_amnt,
	b_budget.bdgt_pctg,
	b_budget.bdgt_start_month,
	b_budget.bdgt_start_year,
	b_budget.bdgt_end_month,
	b_budget.bdgt_end_year,
	b_budget.start_m_y,
    b_budget.end_m_y,
	hr_band.band,
	hr_desig.desig');
        $this->db->from('b_budget');
        $this->db->join('hr_band', 'b_budget.bdgt_band = hr_band.id', 'left');
        $this->db->join('hr_desig', 'b_budget.bdgt_posi = hr_desig.id', 'left');
        $this->db->where('b_budget.isActive', 1);
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalBdgt($searchdata)
    {

        if (isset($searchdata['proj_code']) && $searchdata['proj_code'] != '' && $searchdata['proj_code'] != null && $searchdata['proj_code'] != 0) {
            $this->db->where('b_budget.proj_code', $searchdata['proj_code']);
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(b_budget.proj_code like '%" . $search . "%' 
            OR  b_budget.bdgt_code like '%" . $search . "%' 
            OR  hr_desig.desig like '%" . $search . "%'
            OR  hr_band.band like '%" . $search . "%'
            OR b_budget.bdgt_amnt like '%" . $search . "%'
            OR b_budget.bdgt_pctg like '%" . $search . "%'
            )");
        }
        $this->db->select('count(idBugt) as cnttotal');
        $this->db->from('b_budget');
        $this->db->join('hr_band', 'b_budget.bdgt_band = hr_band.id', 'left');
        $this->db->join('hr_desig', 'b_budget.bdgt_posi = hr_desig.id', 'left');
        $this->db->where('isActive', 1);

        $query = $this->db->get();
        return $query->result();
    }

    function getAll($proj = '', $searchData = '')
    {
        if (isset($proj) && $proj != '' && $proj != '0') {
            $this->db->where('b_budget.proj_code', $proj);
        }

        if (isset($searchData['s']) && $searchData['s'] != '' && $searchData['s'] != '0') {
            $this->db->where("((b_budget.start_m_y BETWEEN '".$searchData['s']."' AND '".$searchData['e']."') OR
(b_budget.end_m_y BETWEEN '".$searchData['s']."' AND '".$searchData['e']."'))");
        }

        $this->db->select('b_budget.idBugt,
	b_budget.proj_code,
	b_budget.bdgt_code,
	b_budget.bdgt_posi,
	b_budget.bdgt_band,
	b_budget.bdgt_amnt,
	b_budget.bdgt_pctg,
	b_budget.bdgt_start_month,
	b_budget.bdgt_start_year,
	b_budget.bdgt_end_month,
	b_budget.bdgt_end_year,
	hr_band.band,
	hr_desig.desig');
        $this->db->from('b_budget');
        $this->db->join('hr_band', 'b_budget.bdgt_band = hr_band.id', 'left');
        $this->db->join('hr_desig', 'b_budget.bdgt_posi = hr_desig.id', 'left');
        $this->db->where('b_budget.isActive', 1);
        $this->db->order_By('b_budget.idBugt', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getDesignation($band)
    {
        $this->db->select('*');
        $this->db->from('hr_desig');
        $this->db->where('band', $band);
        $this->db->order_By('desig', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getBandEmp($code)
    {
        $this->db->select('hr_employee.id,
	hr_employee.pic,
	hr_employee.empno,
	hr_employee.empname,
	hr_employee.workproj,
	hr_desig.desig');
        $this->db->from('hr_employee');
        $this->db->join('hr_desig', 'hr_employee.titdesi = hr_desig.id', 'left');
        $this->db->where('hr_employee.status', 1);
        $this->db->where('hr_employee.ddlband', $code);
        $query = $this->db->get();
        return $query->result();
    }

    function getBands_Month_Year($bcode, $procode)
    {
        $this->db->select('bdgt_start_month,
	bdgt_start_year,
	bdgt_end_month,
	bdgt_end_year');
        $this->db->from('b_budget');
        $this->db->where('b_budget.isActive', 1);
        $this->db->where('b_budget.bdgt_code', $bcode);
        $this->db->where('b_budget.proj_code', $procode);
        $this->db->group_by('b_budget.bdgt_start_month');
        $this->db->group_by('b_budget.bdgt_start_year');
        $this->db->group_by('b_budget.bdgt_end_month');
        $this->db->group_by('b_budget.bdgt_end_year');
        $query = $this->db->get();
        return $query->result();
    }


}