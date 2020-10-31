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


    function selectAllQuery($table, $orderBy, $whereClause = '')
    {
        if (isset($whereClause) && $whereClause != '' && $whereClause != 0) {
            $this->db->where($whereClause, 1);
        }
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

    /*==========Log=============*/

    function insrt_inventory_AT($formId, $FormName, $Fieldid, $FieldName, $OldValue, $NewValue)
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

    /*======================Custom Functions======================*/

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

}