<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mbudget extends CI_Model
{

    function getAll($proj = '')
    {
        if (isset($proj) && $proj != '' && $proj != '0') {
            $this->db->where('b_budget.proj_code', $proj);
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

}