<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MAsset extends CI_Model
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $table = 'i_paedsasset';
    }

    function getAsset($searchdata)
    {
        $start = 0;
        $length = 25;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }
        if (isset($searchdata['project']) && $searchdata['project'] != '' && $searchdata['project'] != null) {
            $this->db->where("a.proj_code", $searchdata['project']);
        }
        if (isset($searchdata['emp']) && $searchdata['emp'] != '' && $searchdata['emp'] != null) {
            $this->db->where("a.emp_no", $searchdata['emp']);
        }
        if (isset($searchdata['category']) && $searchdata['category'] != '' && $searchdata['category'] != null) {
            $this->db->where("a.idCategory", $searchdata['category']);
        }
        if (isset($searchdata['sop']) && $searchdata['sop'] != '' && $searchdata['sop'] != null) {
            $this->db->where("a.idSourceOfPurchase", $searchdata['sop']);
        }

        if (isset($searchdata['idLocation']) && $searchdata['idLocation'] != '' && $searchdata['idLocation'] != null) {
            $this->db->where("a.idLocation", $searchdata['idLocation']);
        }
        if (isset($searchdata['idSubLocation']) && $searchdata['idSubLocation'] != '' && $searchdata['idSubLocation'] != null) {
            $this->db->where("a.idSubLocation", $searchdata['idSubLocation']);
        }

        if (isset($searchdata['area']) && $searchdata['area'] != '' && $searchdata['area'] != null) {
            $this->db->where("(a.area like '%" . $searchdata['area'] . "%')");
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where("a.status", $searchdata['status']);
        }
        if (isset($searchdata['verification_status']) && $searchdata['verification_status'] != '' && $searchdata['verification_status'] != null) {
            if ($searchdata['verification_status'] == 'Due') {
                $this->db->where("a.due_date <= '" . date('Y-m-d') . "' ");
            } else {
                $this->db->where("a.verification_status", $searchdata['verification_status']);
            }
        }
        if (isset($searchdata['tag_pr']) && $searchdata['tag_pr'] != '' && $searchdata['tag_pr'] != null) {
            $this->db->where("(a.pr_no like '%" . $searchdata['tag_pr'] . "%' or a.tag_no like '%" . $searchdata['tag_pr'] . "%'
             or a.gri_no like '%" . $searchdata['tag_pr'] . "%' )");
        }

        if (isset($searchdata['idAsset']) && $searchdata['idAsset'] != '' && $searchdata['idAsset'] != null) {
            $this->db->where("a.idAsset", $searchdata['idAsset']);
        }
        if (isset($searchdata['writeOffNo']) && $searchdata['writeOffNo'] != '' && $searchdata['writeOffNo'] != null) {
            $this->db->where("(a.writOff_formNo like '%" . $searchdata['writeOffNo'] . "%')");
        }
        if (isset($searchdata['dateTo']) && $searchdata['dateTo'] != '' && $searchdata['dateTo'] != null) {
            $this->db->where("(a.pur_date >= '" . date('Y-m-d', strtotime($searchdata['dateTo'])) . "')");
        }
        if (isset($searchdata['dateFrom']) && $searchdata['dateFrom'] != '' && $searchdata['dateFrom'] != null) {
            $this->db->where("(a.pur_date <= '" . date('Y-m-d', strtotime($searchdata['dateFrom'])) . "')");
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null && $searchdata['search'] != ' ') {
            $search = trim($searchdata['search']);
            $this->db->where("(
            a.tag_no like '%" . $search . "%'
            OR  a.idAsset like '%" . $search . "%'
            OR  a.status_name like '%" . $search . "%'
            OR  a.description like '%" . $search . "%'
            OR  a.model like '%" . $search . "%'
            OR  a.product_no like '%" . $search . "%'
            OR  a.serial_no like '%" . $search . "%'
            OR  a.gri_no like '%" . $search . "%'
            OR  a.tag_no like '%" . $search . "%'
            OR  a.po_no like '%" . $search . "%'
            OR  a.cost like '%" . $search . "%'
            OR  a.pr_no like '%" . $search . "%'
            OR  a.emp_no like '%" . $search . "%'
            OR  a.resp_person_name like '%" . $search . "%'
            OR  a.account like '%" . $search . "%'
            OR  a.ou like '%" . $search . "%'
            OR  a.area like '%" . $search . "%'
            OR  a.category like '%" . $search . "%'
            OR  a.currency like '%" . $search . "%'
            OR  a.sopName like '%" . $search . "%'
            OR  a.empname like '%" . $search . "%'
            OR  a.proj_name like '%" . $search . "%'
            OR  a.remarks like '%" . $search . "%'
            OR  a.verification_status LIKE '%" . $search . "%' )");
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }
        $this->db->select('*');
        $this->db->from('asset a');
        $this->db->where('a.isActive', 1);
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalAsset($searchdata)
    {

        if (isset($searchdata['project']) && $searchdata['project'] != '' && $searchdata['project'] != null) {
            $this->db->where("a.proj_code", $searchdata['project']);
        }
        if (isset($searchdata['emp']) && $searchdata['emp'] != '' && $searchdata['emp'] != null) {
            $this->db->where("a.emp_no", $searchdata['emp']);
        }
        if (isset($searchdata['category']) && $searchdata['category'] != '' && $searchdata['category'] != null) {
            $this->db->where("a.idCategory", $searchdata['category']);
        }
        if (isset($searchdata['sop']) && $searchdata['sop'] != '' && $searchdata['sop'] != null) {
            $this->db->where("a.idSourceOfPurchase", $searchdata['sop']);
        }

        if (isset($searchdata['idLocation']) && $searchdata['idLocation'] != '' && $searchdata['idLocation'] != null) {
            $this->db->where("a.idLocation", $searchdata['idLocation']);
        }
        if (isset($searchdata['idSubLocation']) && $searchdata['idSubLocation'] != '' && $searchdata['idSubLocation'] != null) {
            $this->db->where("a.idSubLocation", $searchdata['idSubLocation']);
        }

        if (isset($searchdata['area']) && $searchdata['area'] != '' && $searchdata['area'] != null) {
            $this->db->where("(a.area like '%" . $searchdata['area'] . "%')");
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where("a.status", $searchdata['status']);
        }
        if (isset($searchdata['verification_status']) && $searchdata['verification_status'] != '' && $searchdata['verification_status'] != null) {
            if ($searchdata['verification_status'] == 'Due') {
                $this->db->where("a.due_date <= '" . date('Y-m-d') . "' ");
            } else {
                $this->db->where("a.verification_status", $searchdata['verification_status']);
            }
        }

        if (isset($searchdata['tag_pr']) && $searchdata['tag_pr'] != '' && $searchdata['tag_pr'] != null) {
            $this->db->where("(a.pr_no like '%" . $searchdata['tag_pr'] . "%' or a.tag_no like '%" . $searchdata['tag_pr'] . "%'
             or a.gri_no like '%" . $searchdata['tag_pr'] . "%' )");
        }

        if (isset($searchdata['idAsset']) && $searchdata['idAsset'] != '' && $searchdata['idAsset'] != null) {
            $this->db->where("a.idAsset", $searchdata['idAsset']);
        }
        if (isset($searchdata['writeOffNo']) && $searchdata['writeOffNo'] != '' && $searchdata['writeOffNo'] != null) {
            $this->db->where("(a.writOff_formNo like '%" . $searchdata['writeOffNo'] . "%')");
        }
        if (isset($searchdata['dateTo']) && $searchdata['dateTo'] != '' && $searchdata['dateTo'] != null) {
            $this->db->where("(a.pur_date >= '" . date('Y-m-d', strtotime($searchdata['dateTo'])) . "')");
        }
        if (isset($searchdata['dateFrom']) && $searchdata['dateFrom'] != '' && $searchdata['dateFrom'] != null) {
            $this->db->where("(a.pur_date <= '" . date('Y-m-d', strtotime($searchdata['dateFrom'])) . "')");
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null && $searchdata['search'] != ' ') {
            $search = trim($searchdata['search']);
            $this->db->where("(
            a.tag_no like '%" . $search . "%'
            OR  a.idAsset like '%" . $search . "%'
            OR  a.status_name like '%" . $search . "%'
            OR  a.description like '%" . $search . "%'
            OR  a.model like '%" . $search . "%'
            OR  a.product_no like '%" . $search . "%'
            OR  a.serial_no like '%" . $search . "%'
            OR  a.gri_no like '%" . $search . "%'
            OR  a.tag_no like '%" . $search . "%'
            OR  a.po_no like '%" . $search . "%'
            OR  a.cost like '%" . $search . "%'
            OR  a.pr_no like '%" . $search . "%'
            OR  a.emp_no like '%" . $search . "%'
            OR  a.resp_person_name like '%" . $search . "%'
            OR  a.account like '%" . $search . "%'
            OR  a.ou like '%" . $search . "%'
            OR  a.area like '%" . $search . "%'
            OR  a.category like '%" . $search . "%'
            OR  a.currency like '%" . $search . "%'
            OR  a.sopName like '%" . $search . "%'
            OR  a.empname like '%" . $search . "%'
            OR  a.proj_name like '%" . $search . "%'
            OR  a.remarks like '%" . $search . "%'
            OR  a.verification_status LIKE '%" . $search . "%' )");
        }

        $this->db->select('count(a.idAsset) as cnttotal');
        $this->db->from('asset a');
        $this->db->where('a.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getAssetById($searchdata)
    {
        $idAsset = '';
        if (isset($searchdata['idAsset']) && $searchdata['idAsset'] != '' && $searchdata['idAsset'] != null) {
            $idAsset = $searchdata['idAsset'];
            $this->db->where('idAsset', $idAsset);
        }
        if (isset($searchdata['idAsset_multiple']) && $searchdata['idAsset_multiple'] != '' && $searchdata['idAsset_multiple'] != null) {
            foreach ($searchdata['idAsset_multiple'] as $a) {
                $this->db->or_where('idAsset', $a);
            }
        }
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->limit(50, 0);
        $this->db->order_by('idAsset', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function getAssetDocsByIdAsset($searchdata)
    {
        $idAsset = '';
        if (isset($searchdata['idAsset']) && $searchdata['idAsset'] != '' && $searchdata['idAsset'] != null) {
            $idAsset = $searchdata['idAsset'];
        }
        if (isset($searchdata['docName']) && $searchdata['docName'] != '' && $searchdata['docName'] != null) {
            $this->db->where('docName', $searchdata['docName']);
        }
        $this->db->select('*');
        $this->db->from('a_asset_docs');
        $this->db->where('idAsset', $idAsset);
        $this->db->where('isActive', 1);
        $this->db->order_by('idAssetImage', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function getAssetLastId()
    {
        $this->db->select('Max(idAsset)+1 as maxAssetId');
        $this->db->from('a_asset');
        $query = $this->db->get();
        return $query->result();
    }

    function chkTagNo($tagNo)
    {
        $this->db->select('tag_no');
        $this->db->from('a_asset');
        $this->db->where('tag_no', $tagNo);
        $query = $this->db->get();
        return $query->result();
    }

    function getAuditTrialById($searchdata)
    {
        $FormID = '';
        if (isset($searchdata['idAsset']) && $searchdata['idAsset'] != '' && $searchdata['idAsset'] != null) {
            $FormID = $searchdata['idAsset'];
        }
        $this->db->select('a_AuditTrials.id,
a_AuditTrials.FormID,
a_AuditTrials.FormName,
a_AuditTrials.Fieldid,
a_AuditTrials.FieldName,
a_AuditTrials.OldValue,
a_AuditTrials.NewValue,
a_AuditTrials.effdt,
a_AuditTrials.createdBy,
a_AuditTrials.createdDateTime,
users_dash.username');
        $this->db->from('a_AuditTrials');
        $this->db->join('users_dash', 'a_AuditTrials.createdBy = users_dash.id', 'left');
        $this->db->where('a_AuditTrials.FormID', $FormID);
        $this->db->where('a_AuditTrials.isActive', 1);
        $this->db->order_By('a_AuditTrials.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function file_newname($path, $filename)
    {
        if ($pos = strrpos($filename, '.')) {
            $name = substr($filename, 0, $pos);
            $ext = substr($filename, $pos);
        } else {
            $name = $filename;
        }
        $newpath = $path . '/' . $filename;
        $newname = $filename;
        $counter = 0;
        while (file_exists($newpath)) {
            $newname = $name . '_' . $counter . $ext;
            $newpath = $path . '/' . $newname;
            $counter++;
        }
        return $newname;
    }


}