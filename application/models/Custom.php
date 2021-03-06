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

    function getTableColumn($table)
    {
        $fields = $this->db->list_fields($table);
        return $fields;
    }


    function selectAllQuery($table, $orderBy, $whereClause = '', $orderBySort = 'ASC')
    {
//        if (isset($whereClause) && $whereClause != '' && $whereClause != 0) {
        if (isset($whereClause) && $whereClause != '') {
            $this->db->where($whereClause, 1);
        }
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_By($orderBy, $orderBySort);
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

    function Edit($Data, $key, $value, $table)
    {
        $this->db->where($key, $value);
        $update = $this->db->update($table, $Data);
        $trackarray = array("action" => "Edit -> Function: Custom->Edit() ",
            "result" => $update, "Query" => $this->db->last_query());
        $this->trackLogs($trackarray, "user_logs");

        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function trackLogs($array, $log_type)
    {
        date_default_timezone_set("Asia/Karachi");
        $UserName = $_SESSION['login']['UserName'];
//        $logFileDirPath='E:/PortalFiles/customLogs/user_logs/';
        $logFileDirPath = 'C:/PortalFiles/customLogs/user_logs/';
        if (!is_dir($logFileDirPath)) {
            mkdir($logFileDirPath, 0777, TRUE);
        }
        $logFilePath = $logFileDirPath . $UserName . 'logs_' . date("n_j_Y") . '.txt';
        $activityName = (isset($array['activityName']) ? $array['activityName'] : 'Invalid activityName');
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
        $formArray = array();
        $formArray['idUser'] = $idUser;
        $formArray['activityName'] = $activityName;
        $formArray['actiontype'] = $action;
        $formArray['result'] = $result;
        $formArray['postData'] = $postData;
        $formArray['isActive'] = 1;
        $formArray['createdBy'] = $_SESSION['login']['idUser'];
        $formArray['createdDateTime'] = date('Y-m-d H:m:s');
        $InsertData = $this->Insert($formArray, 'id', 'users_dash_activity', 'N');
        $txt = fopen($logFilePath, "a") or die("Unable to open file!");
        fwrite($txt, $log);
        fclose($txt);
//        echo file_put_contents($logFilePath . date("n_j_Y") . '.txt', $log);
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

    function Edit_multi_where($Data, $where, $table)
    {
        if (isset($where) && $where != '') {
            foreach ($where as $k => $v) {
                $this->db->where($k, $v);
            }
            $update = $this->db->update($table, $Data);
            $trackarray = array("action" => "Edit -> Function: Custom->Edit() ",
                "result" => $update, "Query" => $this->db->last_query());
            $this->trackLogs($trackarray, "user_logs");

            if ($update) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /*==========Log=============*/

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

    /*======================Custom Functions======================*/

    function insrt_AT($formId, $FormName, $Fieldid, $FieldName, $OldValue, $NewValue)
    {
        $at_insertArray = array();
        $at_insertArray['FormID'] = $formId;
        $at_insertArray['isActive'] = 1;
        $at_insertArray['createdBy'] = $_SESSION['login']['idUser'];
        $at_insertArray['createdDateTime'] = date('Y-m-d H:i:s');
        $at_insertArray['FormName'] = $FormName;
        $at_insertArray['Fieldid'] = $Fieldid;
        $at_insertArray['FieldName'] = $FieldName;
        $at_insertArray['OldValue'] = $OldValue;
        $at_insertArray['NewValue'] = $NewValue;
        $insrt = $this->Insert($at_insertArray, 'id', 'i_AuditTrials', 'N');
        if ($insrt) {
            return true;
        } else {
            return false;
        }
    }

    function getEmpAllDetails($empNo = '')
    {
        if (isset($empNo) && $empNo != '' && $empNo != null) {
            $this->db->where('hr_employee.empno', $empNo);
        }
        $this->db->select('hr_employee.id, 
                hr_employee.empno, 
                hr_employee.offemail, 
                hr_employee.empname, 
                hr_employee.cnicno, 
                hr_desig.desig, 
                hr_employee.pic');
        $this->db->from('hr_employee');
        $this->db->join('hr_desig', 'hr_employee.titdesi = hr_desig.id', 'left');
        $this->db->where('hr_employee.status', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getSubLocations($idLocation)
    {
        $this->db->select('location_sub.id, 
	location_sub.location_sub, 
	location_sub.idLocation');
        $this->db->from('location_sub');
        $this->db->where('location_sub.isActive', 1);
        $this->db->where('location_sub.idLocation', $idLocation);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

}