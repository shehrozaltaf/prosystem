<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 09/10/2020
 * Time: 10:22
 */


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mempmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    function getDataFromTableByID($id)
    {
        //$query = $this->db->query("SELECT e.id,ddlemptype,ddlcategory,empno,offemail,empname,cnicno,convert(varchar(13), dob, 105) dob,qual,landlineccode,landline,cellno1ccode,cellno1,cellno2ccode,cellno2,personnme,emcellnoccode,emcellno,emlandnoccode,emlandno,resaddr,peremail,gncno,ddlband,titdesi,convert(varchar(13), rehiredt, 105) rehiredt,convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,hiresalary,ddlhardship,amount,benefits,peme,gop,convert(varchar(13),gopdt, 105) gopdt,entity,dept,cardissue,letterapp,confirmation,status,remarks,pic,doc,userid,entrydate,e.degree,e.field,d.id id1,d.degree degree1,f.id idf,f.field ffield FROM hr_employee e inner join hr_degree d on e.degree = d.id inner join hr_field f on e.field = f.id where e.id='$id'");

        $query = $this->db->query("SELECT id,ddlemptype,ddlcategory,empno,offemail,empname,cnicno,convert(varchar(13), dob, 105) dob,landlineccode,chk_landline,chk_emlandno,landline,cellno1ccode,cellno1,cellno2ccode,cellno2,personnme,emcellnoccode,emcellno,emlandnoccode,emlandno,resaddr,peremail,gncno,ddlband,titdesi,convert(varchar(13), rehiredt, 105) rehiredt,convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,hiresalary,ddlhardship,amount,benefits,peme,gop,convert(varchar(13),gopdt, 105) gopdt,entity,dept,cardissue,letterapp,confirmation,status,remarks,pic,doc,userid,entrydate,degree,field FROM hr_employee where id='$id'");
        return $query->result();
    }


    function getDataSupervisor()
    {
        $query = $this->db->query("SELECT empno,empname FROM hr_employee");
        return $query->result();
    }


    function getDesignation($id)
    {
        $query = $this->db->query("SELECT id,desig,band FROM hr_desig where band='$id'");
        $results = array();
        foreach ($query->result() as $row) {
            $results[] = $row;
        }

        return $results;
    }

    /*shehroz*/
    function getEmployeeDataByEmpNo($empno)
    {
        $this->db->select('*');
        $this->db->from('hr_employee');
        $this->db->where('empno', $empno);
        $query = $this->db->get();
        return $query->result();
    }

    /*shehroz*/
    function getAssetByEmpNo($empno)
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->where('emp_no', $empno);
        $query = $this->db->get();
        return $query->result();
    }

    function getEmployeeDataByEmpNo2($empno)
    {
        $query = $this->db->query("SELECT convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,status FROM hr_employee where empno='$empno'");

        $results = array();

        foreach ($query->result() as $row) {
            $results['results'] = array(
                "conexpiry" => $row->conexpiry,
                "workproj" => $row->workproj,
                "chargproj" => $row->chargproj,
                "ddlloc" => $row->ddlloc,
                "supernme" => $row->supernme,
                "status" => $row->status
            );
        }

        return $results;
        //return $query->result_array();
    }

    function getEmployeeData($id)
    {
        $query = $this->db->query("SELECT id,ddlemptype,ddlcategory,empno,offemail,empname,cnicno,convert(varchar(13), dob, 105) dob,degree,field,landlineccode,landline,cellno1ccode,cellno1,cellno2ccode,cellno2,personnme,emcellnoccode,emcellno,emlandnoccode,emlandno,resaddr,peremail,gncno,ddlband,titdesi,convert(varchar(13), rehiredt, 105) rehiredt,convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,hiresalary,ddlhardship,amount,benefits,peme,gop,convert(varchar(13),gopdt, 105) gopdt,entity,dept,cardissue,letterapp,confirmation,status,remarks,pic,doc,userid,entrydate,degree,field FROM hr_employee where id='$id'");

        foreach ($query->result() as $row) {
            $results['results'] = array(
                "ddlemptype" => $row->ddlemptype,
                "ddlcategory" => $row->ddlcategory,
                "empno" => $row->empno,
                "offemail" => $row->offemail,
                "empname" => $row->empname,
                "cnicno" => $row->cnicno,
                "dob" => $row->dob,
                "degree" => $row->degree,
                "field" => $row->field,
                "landlineccode" => $row->landlineccode,
                "chk_landline" => $row->chk_landline,
                "landline" => $row->landline,
                "cellno1ccode" => $row->cellno1ccode,
                "cellno1" => $row->cellno1,
                "cellno2ccode" => $row->cellno2ccode,
                "cellno2" => $row->cellno2,
                "personnme" => $row->personnme,
                "emcellnoccode" => $row->emcellnoccode,
                "emcellno" => $row->emcellno,
                "emlandnoccode" => $row->emlandnoccode,
                "emlandno" => $row->emlandno,
                "chk_emlandno" => $row->chk_emlandno,
                "resaddr" => $row->resaddr,
                "gncno" => $row->gncno,
                "ddlband" => $row->ddlband,
                "titdesi" => $row->titdesi,
                "rehiredt" => $row->rehiredt,
                "conexpiry" => $row->conexpiry,
                "workproj" => $row->workproj,
                "chargproj" => $row->chargproj,
                "ddlloc" => $row->ddlloc,
                "supernme" => $row->supernme,
                "hiresalary" => $row->hiresalary,
                "ddlhardship" => $row->ddlhardship,
                "amount" => $row->amount,
                "benefits" => $row->benefits,
                "peme" => $row->peme,
                "gop" => $row->gop,
                "gopdt" => $row->gopdt,
                "entity" => $row->entity,
                "dept" => $row->dept,
                "cardissue" => $row->cardissue,
                "letterapp" => $row->letterapp,
                "confirmation" => $row->confirmation,
                "status" => $row->status,
                "remarks" => $row->remarks,
                "pic" => $row->pic,
                "doc" => $row->doc
            );
        }

        return $results['results'];
        //return $query->result_array();
    }

    function getAllEmployee($searchdata)
    {
        /*shehroz*/

        $start = 0;
        $length = 500000;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }


        if (isset($searchdata['projects']) && $searchdata['projects'] != '' && $searchdata['projects'] != null) {
            $this->db->where("(e.workproj like '%" . $searchdata['projects'] . "%')");
        }
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where("(e.ddlloc like '%" . $searchdata['location'] . "%')");
        }
        if (isset($searchdata['category']) && $searchdata['category'] != '' && $searchdata['category'] != null) {
            $this->db->where("(e.ddlcategory like '%" . $searchdata['category'] . "%')");
        }
        if (isset($searchdata['entity']) && $searchdata['entity'] != '' && $searchdata['entity'] != null) {
            $this->db->where('e.entity', $searchdata['entity']);
        }
        if (isset($searchdata['band']) && $searchdata['band'] != '' && $searchdata['band'] != null) {
            $this->db->where('e.ddlband', $searchdata['band']);
        }

        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where('e.status', $searchdata['status']);
        }

        if (isset($searchdata['empname']) && $searchdata['empname'] != '' && $searchdata['empname'] != null) {
            $this->db->where("(e1.empname like '%" . $searchdata['empname'] . "%')");
        }

        if (isset($searchdata['empno']) && $searchdata['empno'] != '' && $searchdata['empno'] != null) {
            $this->db->where('e1.empno', $searchdata['empno']);
        }

        if (isset($searchdata['hiredatefrom']) && $searchdata['hiredatefrom'] != '' && $searchdata['hiredatefrom'] != null &&
            isset($searchdata['hiredateto']) && $searchdata['hiredateto'] != '' && $searchdata['hiredateto'] != null) {
            $this->db->where("e.rehiredt between '" . date('Y-m-d', strtotime($searchdata['hiredateto'])) . "' and '" . date('Y-m-d', strtotime($searchdata['hiredatefrom'])) . "'");
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }
       /* $this->db->select('e1.id id,
            et4.emptype EmployeeType,
            c4.category EmployeeCategory,
            e1.empno EmployeeNo,
            e1.empname EmployeeName,
            de4.desig Designation,
            e.empname SupervisorName, 
            e.empname SupervisorCode, 
            pr4.proj_name WorkProjectCode,
            pr4.proj_name WorkingProject,
            pr41.proj_name ChargingProject,
            loc4.location LocationCode,
            e.conexpiry ConExpiry,
            st4.status Status');
        $this->db->from('hr_employee e');
        $this->db->join('hr_category c', 'e.ddlcategory = c.id', 'left');
        $this->db->join('hr_emptype et', 'e.ddlemptype = et.id', 'left');
        $this->db->join('hr_desig de', 'e.titdesi = de.id', 'left');
        $this->db->join('hr_band b', 'e.ddlband = b.id', 'left');
        $this->db->join('hr_band b1', 'b1.id = de.band', 'left');
        $this->db->join('location loc', 'loc.id = e.ddlloc', 'left');
        $this->db->join('hr_status st', 'st.id = e.status', 'left');
        $this->db->join('project pr', 'pr.proj_code = e.workproj', 'left');
        $this->db->join('project pr1', 'pr1.proj_code = e.chargproj', 'left');
        $this->db->join('hr_employee e1', 'e.empno = e1.supernme', 'left');
        $this->db->join('hr_category c4', 'e1.ddlcategory = c4.id', 'left');
        $this->db->join('hr_emptype et4', 'e1.ddlemptype = et4.id', 'left');
        $this->db->join('hr_desig de4', 'e1.titdesi = de4.id', 'left');
        $this->db->join('hr_band b4', 'e1.ddlband = b4.id', 'left');
        $this->db->join('hr_band b41', 'b41.id = de.band', 'left');
        $this->db->join('location loc4', 'loc4.id = e1.ddlloc', 'left');
        $this->db->join('hr_status st4', 'st4.id = e1.status', 'left');
        $this->db->join('project pr4', 'pr4.proj_code = e1.workproj', 'left');
        $this->db->join('project pr41', 'pr41.proj_code = e1.chargproj', 'left');
        $this->db->where('e1.supernme IS NOT NULL');*/

        $this->db->select('*');
        $this->db->from('employee_view e');
        $this->db->limit($length, $start);
        $query = $this->db->get();


        return $query->result();

    }

    function getAllEmployee2()
    {
        /*$query = $this->db->query("select id, case when ddlemptype = 1 then 'Payroll' when ddlemptype = 2 then 'Service Contract' when ddlemptype = 3 then 'Consultancy Contract' end 'EmployeeType',
      case when ddlcategory = 1 then 'Academic' when ddlcategory = 2 then 'Administration' when ddlcategory = 3 then 'Allied Health' end 'EmployeeCategory',
empno 'EmployeeNo', empname 'EmployeeName'
from hr_employee");*/


        /*  Following query to show records in  complete forms    */

        /*$query = $this->db->query("select e.id,
et.emptype 'EmployeeType',
c.category 'EmployeeCategory',
e.empno 'EmployeeNo',
e.empname 'EmployeeName',
e1.supernme 'SupervisorCode',
e1.empname 'SupervisorName',
pr.proj_name 'WorkingProject',
pr1.proj_name 'ChargingProject',
loc.location 'Location',
e.conexpiry 'ContractExpiry',
st.status 'Status',
e.workproj 'WorkProjectCode',
e.chargproj 'ChargeProjectCode',
e.ddlloc 'LocationCode',
e.conexpiry 'ConExpiry',
e.status 'StatusCode'
from hr_employee e inner join hr_category c on e.ddlcategory = c.id
inner join hr_emptype et on e.ddlemptype = et.id
inner join location loc on loc.id = e.ddlloc
inner join hr_status st on st.id = e.status
inner join project pr on pr.proj_code = e.workproj
inner join project pr1 on pr1.proj_code = e.chargproj
inner join hr_employee e1 on e1.empno = e.supernme
order by e.id desc");*/

        /*  Following query to show records in SaveDraft and in complete forms    */

        $query = $this->db->query("select e.id, 
et.emptype 'EmployeeType', 
c.category 'EmployeeCategory', 
e.empno 'EmployeeNo', 
e.empname 'EmployeeName',
e1.supernme 'SupervisorCode', 
e1.empname 'SupervisorName',
pr.proj_name 'WorkingProject', 
pr1.proj_name 'ChargingProject',
loc.location 'Location', 
e.conexpiry 'ContractExpiry', 
st.status 'Status',
e.workproj 'WorkProjectCode', 
e.chargproj 'ChargeProjectCode',
e.ddlloc 'LocationCode', 
e.conexpiry 'ConExpiry', 
e.status 'StatusCode'
from hr_employee e 
left join hr_category c on e.ddlcategory = c.id 
left join hr_emptype et on e.ddlemptype = et.id
left join location loc on loc.id = e.ddlloc
left join hr_status st on st.id = e.status
left join project pr on pr.proj_code = e.workproj
left join project pr1 on pr1.proj_code = e.chargproj
left join hr_employee e1 on e1.empno = e.supernme
order by e.id desc");

        return $query->result();
    }

    function getAllEmployeeForReport()
    {
        $query = $this->db->query("select e.id, 
et.emptype 'EmployeeType', 
c.category 'EmployeeCategory', 
e.empno 'EmployeeNo', 
e.empname 'EmployeeName', 
de.desig 'Designation', 
e1.empname 'SupervisorName',
pr.proj_name 'WorkingProject', 
pr1.proj_name 'ChargingProject',
loc.location 'Location', 
e.conexpiry 'ContractExpiry', 
st.status 'Status'
from hr_employee e 
inner join hr_category c on e.ddlcategory = c.id 
inner join hr_emptype et on e.ddlemptype = et.id
inner join hr_desig de on e.titdesi = de.id
inner join location loc on loc.id = e.ddlloc
inner join hr_status st on st.id = e.status
inner join project pr on pr.proj_code = e.workproj
inner join project pr1 on pr1.proj_code = e.chargproj
inner join hr_employee e1 on e1.empno = e.supernme");

        return $query->result();
    }

    function getEmployee($searchdata)
    {
        date_default_timezone_set('Asia/Karachi');
        $now = new DateTime();

        $start = 0;
        $length = 25;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }


        if (isset($searchdata['projects']) && $searchdata['projects'] != '' && $searchdata['projects'] != null) {
            $this->db->where("(e.workproj like '%" . $searchdata['projects'] . "%')");
        }
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where("(e.ddlloc like '%" . $searchdata['location'] . "%')");
        }
        if (isset($searchdata['category']) && $searchdata['category'] != '' && $searchdata['category'] != null) {
            $this->db->where("(e.ddlcategory like '%" . $searchdata['category'] . "%')");
        }
        if (isset($searchdata['entity']) && $searchdata['entity'] != '' && $searchdata['entity'] != null) {
            $this->db->where('e.entity', $searchdata['entity']);
        }
        if (isset($searchdata['band']) && $searchdata['band'] != '' && $searchdata['band'] != null) {
            $this->db->where('e.ddlband', $searchdata['band']);
        }

        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where('e.status', $searchdata['status']);
        }

        if (isset($searchdata['empname']) && $searchdata['empname'] != '' && $searchdata['empname'] != null) {
            $this->db->where("(e1.empname like '%" . $searchdata['empname'] . "%')");
        }

        if (isset($searchdata['empno']) && $searchdata['empno'] != '' && $searchdata['empno'] != null) {
            $this->db->where('e1.empno', $searchdata['empno']);
        }

        if (isset($searchdata['hiredatefrom']) && $searchdata['hiredatefrom'] != '' && $searchdata['hiredatefrom'] != null &&
            isset($searchdata['hiredateto']) && $searchdata['hiredateto'] != '' && $searchdata['hiredateto'] != null) {
            $this->db->where("e.rehiredt between '" . date('Y-m-d', strtotime($searchdata['hiredateto'])) . "' and '" . date('Y-m-d', strtotime($searchdata['hiredatefrom'])) . "'");
        }


        /*if (isset($searchdata['salaryfrom']) && $searchdata['salaryfrom'] != '' && $searchdata['salaryfrom'] != null &&
            isset($searchdata['salaryto']) && $searchdata['salaryto'] != '' && $searchdata['salaryto'] != null) {

            //$this->db->where("convert(numeric, " + $this->encrypt->decode( + " e1.hiresalary ") + ") between '" . $searchdata['salaryfrom'] . "' and '" . $searchdata['salaryto'] . "'");
            $this->db->where("e1.hiresalary between '" . $this->encrypt->encode($searchdata['salaryfrom']) . "' and '" . $this->encrypt->encode($searchdata['salaryto']) . "'");
        }*/


        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }


        $this->db->select('e1.id id,
            et4.emptype EmployeeType,
            c4.category EmployeeCategory,
            e1.empno EmployeeNo,
            e1.empname EmployeeName,
            de4.desig Designation,
            e.empname SupervisorName,
            pr4.proj_name WorkingProject,
            pr41.proj_name ChargingProject,
            loc4.location Location,
            e.conexpiry ContractExpiry,
            st4.status Status');

        $this->db->from('hr_employee e');
        $this->db->join('hr_category c', 'e.ddlcategory = c.id');
        $this->db->join('hr_emptype et', 'e.ddlemptype = et.id');
        $this->db->join('hr_desig de', 'e.titdesi = de.id');
        $this->db->join('hr_band b', 'e.ddlband = b.id');
        $this->db->join('hr_band b1', 'b1.id = de.band');
        $this->db->join('location loc', 'loc.id = e.ddlloc');
        $this->db->join('hr_status st', 'st.id = e.status');
        $this->db->join('project pr', 'pr.proj_code = e.workproj');
        $this->db->join('project pr1', 'pr1.proj_code = e.chargproj');
        $this->db->join('hr_employee e1', 'e.empno = e1.supernme');
        $this->db->join('hr_category c4', 'e1.ddlcategory = c4.id');
        $this->db->join('hr_emptype et4', 'e1.ddlemptype = et4.id');
        $this->db->join('hr_desig de4', 'e1.titdesi = de4.id');
        $this->db->join('hr_band b4', 'e1.ddlband = b4.id');
        $this->db->join('hr_band b41', 'b41.id = de.band');
        $this->db->join('location loc4', 'loc4.id = e1.ddlloc');
        $this->db->join('hr_status st4', 'st4.id = e1.status');
        $this->db->join('project pr4', 'pr4.proj_code = e1.workproj');
        $this->db->join('project pr41', 'pr41.proj_code = e1.chargproj');

        $this->db->where('e1.supernme IS NOT NULL');

        $this->db->limit($length, $start);
        $query = $this->db->get();

        //echo $this->db->last_query();
        //die();

        return $query->result();


        /*$query = $this->db->query('select e.id id,
            et.emptype EmployeeType,
            c.category EmployeeCategory,
            e1.empno EmployeeNo,
            e1.empname EmployeeName,
            de.desig Designation,
            e.empname SupervisorName,
            pr.proj_name WorkingProject,
            pr1.proj_name ChargingProject,
            loc.location Location,
            e.conexpiry ContractExpiry,
            st.status Status from
            hr_employee e join hr_category c on e.ddlcategory = c.id
        join hr_emptype et on e.ddlemptype = et.id
        join hr_desig de on e.titdesi = de.id
        join hr_band b on e.ddlband = b.id
        join hr_band b1 on b1.id = de.band
        join location loc on loc.id = e.ddlloc
        join hr_status st on st.id = e.status
        join project pr on pr.proj_code = e.workproj
        join project pr1 on pr1.proj_code = e.chargproj
        join hr_employee e1 on e.empno = e1.supernme');


        foreach ($query->result() as $row) {
            $results['data'] = array(
                "id" => $row->id,
                "EmployeeType" => $row->EmployeeType,
                "EmployeeCategory" => $row->EmployeeCategory,
                "EmployeeNo" => $row->EmployeeNo,
                "EmployeeName" => ucwords($row->EmployeeName),
                "Designation" => ucwords($row->Designation),
                "SupervisorName" => ucwords($row->SupervisorName),
                "WorkingProject" => ucwords($row->WorkingProject),
                "ChargingProject" => ucwords($row->ChargingProject),
                "Location" => ucwords($row->Location),
                "ContractExpiry" => $row->ContractExpiry,
                "Status" => ucwords($row->Status)
            );
        }*/

        //return $results['data'];
    }


    function getCntTotalEmployee($searchdata)
    {

        if (isset($searchdata['projects']) && $searchdata['projects'] != '' && $searchdata['projects'] != null) {
            $this->db->where("(e.workproj like '%" . $searchdata['projects'] . "%')");
        }
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where("(e.ddlloc like '%" . $searchdata['location'] . "%')");
        }
        if (isset($searchdata['category']) && $searchdata['category'] != '' && $searchdata['category'] != null) {
            $this->db->where("(e.ddlcategory like '%" . $searchdata['category'] . "%')");
        }
        if (isset($searchdata['entity']) && $searchdata['entity'] != '' && $searchdata['entity'] != null) {
            $this->db->where('e.entity', $searchdata['entity']);
        }
        if (isset($searchdata['band']) && $searchdata['band'] != '' && $searchdata['band'] != null) {
            $this->db->where('e.ddlband', $searchdata['band']);
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where('e.status', $searchdata['status']);
        }


        if (isset($searchdata['empname']) && $searchdata['empname'] != '' && $searchdata['empname'] != null) {
            $this->db->where("(e1.empname like '%" . $searchdata['empname'] . "%')");
        }

        if (isset($searchdata['empno']) && $searchdata['empno'] != '' && $searchdata['empno'] != null) {
            $this->db->where('e1.empno', $searchdata['empno']);
        }

        if (isset($searchdata['hiredatefrom']) && $searchdata['hiredatefrom'] != '' && $searchdata['hiredatefrom'] != null &&
            isset($searchdata['hiredateto']) && $searchdata['hiredateto'] != '' && $searchdata['hiredateto'] != null) {
            $this->db->where("e.rehiredt between '" . date('Y-m-d', strtotime($searchdata['hiredatefrom'])) . "' and '" . date('Y-m-d', strtotime($searchdata['hiredateto'])) . "'");
        }


        /*if (isset($searchdata['salaryfrom']) && $searchdata['salaryfrom'] != '' && $searchdata['salaryfrom'] != null &&
            isset($searchdata['salaryto']) && $searchdata['salaryto'] != '' && $searchdata['salaryto'] != null) {
            $this->db->where("e1.hiresalary between '" . $searchdata['salaryfrom'] . "' and '" . $searchdata['salaryto'] . "'");
        }*/


        $this->db->select('count(e.id) as cnttotal');
        //$this->db->from('hr_employee e');

        /*$this->db->from('hr_employee e');
        $this->db->join('hr_category c', 'e.ddlcategory = c.id');
        $this->db->join('hr_emptype et', 'e.ddlemptype = et.id');
        $this->db->join('hr_desig de', 'e.titdesi = de.id');
        $this->db->join('hr_band b', 'e.ddlband = b.id');
        $this->db->join('hr_band b1', 'b1.id = de.band');
        $this->db->join('location loc', 'loc.id = e.ddlloc');
        $this->db->join('hr_status st', 'st.id = e.status');
        $this->db->join('project pr', 'pr.proj_code = e.workproj');
        $this->db->join('project pr1', 'pr1.proj_code = e.chargproj');
        $this->db->join('hr_employee e1', 'e.empno = e1.supernme');*/


        $this->db->from('hr_employee e');
        $this->db->join('hr_category c', 'e.ddlcategory = c.id');
        $this->db->join('hr_emptype et', 'e.ddlemptype = et.id');
        $this->db->join('hr_desig de', 'e.titdesi = de.id');
        $this->db->join('hr_band b', 'e.ddlband = b.id');
        $this->db->join('hr_band b1', 'b1.id = de.band');
        $this->db->join('location loc', 'loc.id = e.ddlloc');
        $this->db->join('hr_status st', 'st.id = e.status');
        $this->db->join('project pr', 'pr.proj_code = e.workproj');
        $this->db->join('project pr1', 'pr1.proj_code = e.chargproj');
        $this->db->join('hr_employee e1', 'e.empno = e1.supernme');
        $this->db->join('hr_category c4', 'e1.ddlcategory = c4.id');
        $this->db->join('hr_emptype et4', 'e1.ddlemptype = et4.id');
        $this->db->join('hr_desig de4', 'e1.titdesi = de4.id');
        $this->db->join('hr_band b4', 'e1.ddlband = b4.id');
        $this->db->join('hr_band b41', 'b41.id = de.band');
        $this->db->join('location loc4', 'loc4.id = e1.ddlloc');
        $this->db->join('hr_status st4', 'st4.id = e1.status');
        $this->db->join('project pr4', 'pr4.proj_code = e1.workproj');
        $this->db->join('project pr41', 'pr41.proj_code = e1.chargproj');

        $this->db->where('e1.supernme IS NOT NULL');


        $query = $this->db->get();
        return $query->result();
    }

}
