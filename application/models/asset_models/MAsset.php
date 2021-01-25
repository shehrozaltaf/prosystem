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
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where("a.location", $searchdata['location']);
        }
        if (isset($searchdata['sublocation']) && $searchdata['sublocation'] != '' && $searchdata['sublocation'] != null) {
            $this->db->where("a.sublocation", $searchdata['sublocation']);
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where("a.status", $searchdata['status']);
        }
        if (isset($searchdata['prno']) && $searchdata['prno'] != '' && $searchdata['prno'] != null) {
            $this->db->where("(a.pr_no like '%" . $searchdata['prno'] . "%')");
        }
        if (isset($searchdata['paedsid']) && $searchdata['paedsid'] != '' && $searchdata['paedsid'] != null) {
            $this->db->where("(a.tag_no like '%" . $searchdata['paedsid'] . "%')");
        }
        if (isset($searchdata['writeOffNod']) && $searchdata['writeOffNod'] != '' && $searchdata['writeOffNod'] != null) {
            $this->db->where("(a.writeOffNod like '%" . $searchdata['writeOffNod'] . "%')");
        }
        if (isset($searchdata['dateTo']) && $searchdata['dateTo'] != '' && $searchdata['dateTo'] != null) {
            $this->db->where("(a.pur_date >= '" . date('Y-m-d', strtotime($searchdata['dateTo'])) . "')");
        }
        if (isset($searchdata['dateFrom']) && $searchdata['dateFrom'] != '' && $searchdata['dateFrom'] != null) {
            $this->db->where("(a.pur_date <= '" . date('Y-m-d', strtotime($searchdata['dateFrom'])) . "')");
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(a.username like '%" . $search . "%' OR  a_status.status_name like '%" . $search . "%')");
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }
        $this->db->select('a.idAsset,
	a.idCategory,
	a.desc,
	a.model,
	a.product_no,
	a.serial_no,
	a.tag_no,
	a.po_no,
	a.cost,
	a.idCurrency,
	a.idSourceOfPurchase,
	a.pr_no,
	a.emp_no,
	a.resp_person_name,
	a.proj,
	a.ou,
	a.account,
	a.dept,
	a.fund,
	a.proj_name,
	a.prog,
	a.proj_code,
	a.idSubLocation,
	a.idLocation,
	a.verification_status,
	a.last_verify_date,
	a.due_date,
	a.pur_date,
	a.status,
	a.writOff_formNo,
	a.wo_date,
	a.remarks,
	a.pr_path,
	a_status.status_name ');
        $this->db->from('a_asset a');
        $this->db->join('a_status', 'a.status = a_status.id', 'left');
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
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where("a.location", $searchdata['location']);
        }
        if (isset($searchdata['sublocation']) && $searchdata['sublocation'] != '' && $searchdata['sublocation'] != null) {
            $this->db->where("a.sublocation", $searchdata['sublocation']);
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where("a.status", $searchdata['status']);
        }
        if (isset($searchdata['prno']) && $searchdata['prno'] != '' && $searchdata['prno'] != null) {
            $this->db->where("(a.pr_no like '%" . $searchdata['prno'] . "%')");
        }
        if (isset($searchdata['paedsid']) && $searchdata['paedsid'] != '' && $searchdata['paedsid'] != null) {
            $this->db->where("(a.tag_no like '%" . $searchdata['paedsid'] . "%')");
        }
        if (isset($searchdata['writeOffNod']) && $searchdata['writeOffNod'] != '' && $searchdata['writeOffNod'] != null) {
            $this->db->where("(a.writeOffNod like '%" . $searchdata['writeOffNod'] . "%')");
        }
        if (isset($searchdata['dateTo']) && $searchdata['dateTo'] != '' && $searchdata['dateTo'] != null) {
            $this->db->where("(a.pur_date >= '" . date('Y-m-d', strtotime($searchdata['dateTo'])) . "')");
        }
        if (isset($searchdata['dateFrom']) && $searchdata['dateFrom'] != '' && $searchdata['dateFrom'] != null) {
            $this->db->where("(a.pur_date <= '" . date('Y-m-d', strtotime($searchdata['dateFrom'])) . "')");
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(a.username like '%" . $search . "%' OR  a_status.status_name like '%" . $search . "%')");
        }

        $this->db->select('count(a.idAsset) as cnttotal');
        $this->db->from('a_asset a');
        $this->db->join('a_status', 'a.status = a_status.id', 'left');
        $this->db->where('a.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getAssetById($searchdata)
    {
        $id = '';
        if (isset($searchdata['id']) && $searchdata['id'] != '' && $searchdata['id'] != null) {
            $id = $searchdata['id'];
        }
        $this->db->select('*');
        $this->db->from('i_paedsasset');
        $this->db->where('id', $id);
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

    function getAuditTrialById($searchdata)
    {
        $FormID = '';
        if (isset($searchdata['id']) && $searchdata['id'] != '' && $searchdata['id'] != null) {
            $FormID = $searchdata['id'];
        }
        $this->db->select('i_AuditTrials.id,
i_AuditTrials.FormID,
i_AuditTrials.FormName,
i_AuditTrials.Fieldid,
i_AuditTrials.FieldName,
i_AuditTrials.OldValue,
i_AuditTrials.NewValue,
i_AuditTrials.effdt,
i_AuditTrials.createdBy,
i_AuditTrials.createdDateTime,
users_dash.username');
        $this->db->from('i_AuditTrials');
        $this->db->join('users_dash', 'i_AuditTrials.createdBy = users_dash.id', 'left');
        $this->db->where('FormID', $FormID);
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }



}