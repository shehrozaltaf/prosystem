<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mreports extends CI_Model
{

    function getBandData($searchdata)
    {
        /*$sql = "SELECT
	b_budget.idBugt,
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
	b_budget.assigned,
	b_budget.start_m_y,
	b_budget.end_m_y,
	b_projected.prjn_pctg,
	b_actual.actl_pctg,
	hr_desig.desig
FROM
	b_budget
INNER JOIN b_projected ON b_budget.proj_code = b_projected.proj_code AND b_budget.bdgt_code = b_projected.bdgt_code
INNER JOIN b_actual ON b_budget.proj_code = b_actual.proj_code AND b_budget.bdgt_code = b_actual.bdgt_code
LEFT JOIN hr_desig ON b_budget.bdgt_posi = hr_desig.id ";*/
        $sql = "SELECT
	b_budget.idBugt,
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
	b_budget.assigned,
	b_budget.start_m_y,
	b_budget.end_m_y,
	b_projected.prjn_pctg,
	b_actual.actl_pctg,
	hr_desig.desig
FROM
	b_budget
INNER JOIN b_projected ON b_budget.proj_code = b_projected.proj_code  
LEFT JOIN b_actual ON b_budget.proj_code = b_actual.proj_code 
LEFT JOIN hr_desig ON b_budget.bdgt_posi = hr_desig.id ";
        $sql_where = "WHERE  b_projected.isActive=1 AND  b_actual.isActive=1 AND  b_budget.isActive=1  ";
        if (isset($searchdata['proj_code']) && $searchdata['proj_code'] != '' && $searchdata['proj_code'] != null && $searchdata['proj_code'] != 0) {
            $sql_where .= " AND b_projected.proj_code = '" . $searchdata['proj_code'] . "' ";
        }
        if (isset($searchdata['bdgt_code']) && $searchdata['bdgt_code'] != '' && $searchdata['bdgt_code'] != null && $searchdata['bdgt_code'] != 0) {
            $sql_where .= " AND b_projected.bdgt_code = '" . $searchdata['bdgt_code'] . "' ";
        }
        if (isset($searchdata['prjn_month']) && $searchdata['prjn_month'] != '' && $searchdata['prjn_month'] != null && $searchdata['prjn_month'] != 0) {
            $sql_where .= " AND b_projected.prjn_month = '" . $searchdata['prjn_month'] . "' ";
        }
        if (isset($searchdata['prjn_year']) && $searchdata['prjn_year'] != '' && $searchdata['prjn_year'] != null && $searchdata['prjn_year'] != 0) {
            $sql_where .= " AND b_projected.prjn_year = '" . $searchdata['prjn_year'] . "' ";
        }
        $q = $sql . $sql_where;
        $query = $this->db->query($q);
        return $query->result();
    }

    function getEmpData($searchdata)
    {
        $sql = "SELECT
	b_actual.proj_code,
	b_actual.empl_code,
	b_actual.actl_pctg,
	b_actual.actl_month,
	b_actual.actl_year,
	b_actual.bdgt_code,
	b_actual.idActual, 
	hr_employee.empname, 
	hr_desig.desig
FROM
	b_actual
LEFT JOIN hr_employee ON b_actual.empl_code = hr_employee.empno
LEFT JOIN hr_desig ON hr_employee.titdesi = hr_desig.id ";
        $sql_where = "WHERE  b_actual.isActive=1 AND  hr_employee.status=1    ";
        if (isset($searchdata['proj_code']) && $searchdata['proj_code'] != '' && $searchdata['proj_code'] != null && $searchdata['proj_code'] != 0) {
            $sql_where .= " AND b_actual.proj_code = '" . $searchdata['proj_code'] . "' ";
        }
        if (isset($searchdata['bdgt_code']) && $searchdata['bdgt_code'] != '' && $searchdata['bdgt_code'] != null && $searchdata['bdgt_code'] != 0) {
            $sql_where .= " AND b_actual.bdgt_code = '" . $searchdata['bdgt_code'] . "' ";
        }
        if (isset($searchdata['prjn_month']) && $searchdata['prjn_month'] != '' && $searchdata['prjn_month'] != null && $searchdata['prjn_month'] != 0) {
            $sql_where .= " AND b_actual.actl_month = '" . $searchdata['prjn_month'] . "' ";
        }
        if (isset($searchdata['prjn_year']) && $searchdata['prjn_year'] != '' && $searchdata['prjn_year'] != null && $searchdata['prjn_year'] != 0) {
            $sql_where .= " AND b_actual.actl_year = '" . $searchdata['prjn_year'] . "' ";
        }
        $q = $sql . $sql_where;

        $query = $this->db->query($q);
        return $query->result();
    }

}