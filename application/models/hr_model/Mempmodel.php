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

        $query = $this->db->query("SELECT id,ddlemptype,ddlcategory,empno,offemail,empname,cnicno,convert(varchar(13), dob, 105) dob,landlineccode,landline,cellno1ccode,cellno1,cellno2ccode,cellno2,personnme,emcellnoccode,emcellno,emlandnoccode,emlandno,resaddr,peremail,gncno,ddlband,titdesi,convert(varchar(13), rehiredt, 105) rehiredt,convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,hiresalary,ddlhardship,amount,benefits,peme,gop,convert(varchar(13),gopdt, 105) gopdt,entity,dept,cardissue,letterapp,confirmation,status,remarks,pic,doc,userid,entrydate,degree,field FROM hr_employee where id='$id'");
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


    function getEmployeeDataByEmpNo($empno)
    {
        $query = $this->db->query("SELECT convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,status FROM hr_employee where empno='$empno'");

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

        return $results['results'];
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
                "doc" => $row->doc,
                "degree" => $row->degree,
                "field" => $row->field
            );
        }

        return $results['results'];
        //return $query->result_array();
    }


    function getAllEmployee()
    {
        /*$query = $this->db->query("select id, case when ddlemptype = 1 then 'Payroll' when ddlemptype = 2 then 'Service Contract' when ddlemptype = 3 then 'Consultancy Contract' end 'EmployeeType',
      case when ddlcategory = 1 then 'Academic' when ddlcategory = 2 then 'Administration' when ddlcategory = 3 then 'Allied Health' end 'EmployeeCategory',
empno 'EmployeeNo', empname 'EmployeeName'
from hr_employee");*/


        $query = $this->db->query("select e.id, 
et.emptype 'EmployeeType', 
c.category 'EmployeeCategory', 
e.empno 'EmployeeNo', 
e.empname 'EmployeeName', 
e1.empname 'SupervisorName',
pr.proj_name 'WorkingProject', 
pr1.proj_name 'ChargingProject',
loc.location 'Location', 
e.conexpiry 'ContractExpiry', 
st.status 'Status',
e.workproj, e.chargproj, e.ddlloc, e.conexpiry, e.status
from hr_employee e inner join hr_category c on e.ddlcategory = c.id 
inner join hr_emptype et on e.ddlemptype = et.id
inner join hr_location loc on loc.id = e.ddlloc
inner join hr_status st on st.id = e.status
inner join project pr on pr.proj_code = e.workproj
inner join project pr1 on pr1.proj_code = e.chargproj
inner join hr_employee e1 on e1.empno = e.supernme
 order by e.id desc");

        return $query->result();
    }

}