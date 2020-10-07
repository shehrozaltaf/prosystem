<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Custom extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    function selectAllQuery($table, $orderBy)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_By($orderBy, 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function selectAll($Qry)
    {
        $query = $this->db->query($Qry);
        $DataRetuen = $query->result();
        if ($DataRetuen) {
            return $DataRetuen;
        } else {
            return 0;
        }
    }

    function Insert($Data, $idReturn, $table, $getLastId = 'N')
    {
        $insert = $this->db->insert($table, $Data);
        if ($insert) {
            if ($getLastId === 'Y') {
                $returnValue = $this->db->insert_id();
            } elseif (!isset($Data[$idReturn]) || $Data[$idReturn] == '') {
                $returnValue = 1;
            } else {
                $returnValue = $Data[$idReturn];
            }
            return $returnValue;
        } else {
            return FALSE;
        }
    }

    function Edit($Data, $key, $value, $table)
    {
        $this->db->where($key, $value);
        $update = $this->db->update($table, $Data);
        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function getGUID()
    {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen . substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12);
            return $uuid;
        }
    }

    /*==========Log=============*/
    function trackLogs($array, $log_type)
    {
        date_default_timezone_set("Asia/Karachi");
        $UserName = (isset($array['UserName ']) ? $array['UserName '] : $_SESSION['login']['username']);
        if (isset($log_type) && $log_type == 'user_logs') {
            $logFilePath = 'customLogs/user_logs/' . $UserName . 'logs_' . date("n_j_Y") . '.txt';
        } else {
            $logFilePath = 'customLogs/daily_logs/logs_' . date("n_j_Y") . '.txt';
        }
        $action = (isset($array['action']) ? $array['action'] : 'Invalid Action');
        $postData = '';
        if (isset($array['PostData']) && $array['PostData'] != '') {
            foreach ($array['PostData'] as $key => $post) {
                $postData .= $key . ' = ' . $post . PHP_EOL;
            }

        }
        $result = (isset($array['result']) ? $array['result'] : 'Invalid Result');
        $idUser = (isset($array['idUser']) ? $array['idUser'] : $_SESSION['login']['idUser']);
        $log = "UserIPAddress: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F-j-Y g:i a") . PHP_EOL .
            "idUser: " . $idUser .
            ", UserName: " . $UserName . PHP_EOL .
            "Action: " . $action . PHP_EOL .
            "Result: " . $result . PHP_EOL .
            "PostData: " . $postData . PHP_EOL .
            "-------------------------------------------------" . PHP_EOL;
        $txt = fopen($logFilePath, "a") or die("Unable to open file!");
        fwrite($txt, $log);
        fclose($txt);
    }

    /*======================Custom Functions======================*/


    function getDataFromTableByID($id)
    {
        $query = $this->db->query("SELECT id,ddlemptype,ddlcategory,empno,empname,cnicno,convert(varchar(13), dob, 105) dob,qual,landlineccode,landline,cellno1ccode,cellno1,cellno2ccode,cellno2,personnme,emcellnoccode,emcellno,emlandnoccode,emlandno,resaddr,gncno,ddlband,titdesi,convert(varchar(13), rehiredt, 105) rehiredt,convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,hiresalary,ddlhardship,amount,benefits,peme,gop,convert(varchar(13),gopdt, 105) gopdt,entity,dept,cardissue,letterapp,confirmation,status,remarks,pic,doc,userid,entrydate FROM forms where id='$id'");
        return $query->result();
    }


    function getSupervisorName($supernme)
    {
        $query = $this->db->query("SELECT id,ddlemptype,ddlcategory,empno,empname,cnicno,convert(varchar(13), dob, 105) dob,qual,landlineccode,landline,cellno1ccode,cellno1,cellno2ccode,cellno2,personnme,emcellnoccode,emcellno,emlandnoccode,emlandno,resaddr,gncno,ddlband,titdesi,convert(varchar(13), rehiredt, 105) rehiredt,convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,hiresalary,ddlhardship,amount,benefits,peme,gop,convert(varchar(13),gopdt, 105) gopdt,entity,dept,cardissue,letterapp,confirmation,status,remarks,pic,doc,userid,entrydate FROM forms where supernme like '" . $supernme . "%'");

        echo $supernme;

        //return $query->result();
    }


    function getEmployeeData($id)
    {
        $query = $this->db->query("SELECT id,ddlemptype,ddlcategory,empno,empname,cnicno,convert(varchar(13), dob, 105) dob,qual,landlineccode,landline,cellno1ccode,cellno1,cellno2ccode,cellno2,personnme,emcellnoccode,emcellno,emlandnoccode,emlandno,resaddr,gncno,ddlband,titdesi,convert(varchar(13), rehiredt, 105) rehiredt,convert(varchar(13), conexpiry, 105) conexpiry,workproj,chargproj,ddlloc,supernme,hiresalary,ddlhardship,amount,benefits,peme,gop,convert(varchar(13),gopdt, 105) gopdt,entity,dept,cardissue,letterapp,confirmation,status,remarks,pic,doc,userid,entrydate FROM forms where id='$id'");

        foreach ($query->result() as $row) {
            $results['results'] = array(
                "ddlemptype" => $row->ddlemptype,
                "ddlcategory" => $row->ddlcategory,
                "empno" => $row->empno,
                "empname" => $row->empname,
                "cnicno" => $row->cnicno,
                "dob" => $row->dob,
                "qual" => $row->qual,
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
                "doc" => $row->doc
            );
        }

        return $results['results'];
        //return $query->result_array();
    }

}