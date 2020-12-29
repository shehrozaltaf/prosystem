<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mbudget extends CI_Model
{

    function getAll($proj = '', $searchData = '')
    {
        if (isset($proj) && $proj != '' && $proj != '0') {
            $this->db->where('b_budget.proj_code', $proj);
        }

        if (isset($searchData['s']) && $searchData['s'] != '' && $searchData['s'] != '0') {
            $this->db->where("(b_budget.start_m_y BETWEEN '".$searchData['s']."' AND '".$searchData['e']."') OR
(b_budget.end_m_y BETWEEN '".$searchData['s']."' AND '".$searchData['e']."')");
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