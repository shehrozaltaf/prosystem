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


        if (isset($searchdata['username']) && $searchdata['username'] != '' && $searchdata['username'] != null) {
            $this->db->where("(i.username like '%" . $searchdata['username'] . "%' or hr.empno like '%" . $searchdata['username'] . "%')");
            $this->db->join('hr_employee hr', 'i.username = hr.empname','left');
        }
        if (isset($searchdata['ftag']) && $searchdata['ftag'] != '' && $searchdata['ftag'] != null) {
            $this->db->where("(i.ftag like '%" . $searchdata['ftag'] . "%' or i.aaftag like '%" . $searchdata['ftag'] . "%')");
        }
        if (isset($searchdata['dateTo']) && $searchdata['dateTo'] != '' && $searchdata['dateTo'] != null) {
            $this->db->where("(i.dop >= '" . date('Y-m-d',strtotime($searchdata['dateTo'])) . "')");
        }
        if (isset($searchdata['dateFrom']) && $searchdata['dateFrom'] != '' && $searchdata['dateFrom'] != null) {
            $this->db->where("(i.dop <= '" . date('Y-m-d',strtotime($searchdata['dateFrom'])) . "')");
        }
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where('i.loc', $searchdata['location']);
        }
        if (isset($searchdata['project']) && $searchdata['project'] != '' && $searchdata['project'] != null) {
            $this->db->where('i.project', $searchdata['project']);
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where('i.status', $searchdata['status']);
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(i.username like '%" . $search . "%' OR  i.ftag like '%" . $search . "%')");
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By( $searchdata['orderby'], $searchdata['ordersort']);
        }
        $this->db->select('i.id,
	i.asset_type,
	i.model,
	i.ftag,
	i.product,
	i.serial,
	i.dop,
	i.aaftag,
	i.aaproduct,
	i.aaserial,
	i.aadop,
	i.username,
	i.loc,
	i.remarks,
	i.status,
	i.newEntry,
	i.expiryDateTime,
	i.proj_code,
	i.po_num,
	i.pr_num,
	i.dor,
	i.tagable ');
        $this->db->from('i_paedsasset i');
        $this->db->where('i.isActive',1);
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalAsset($searchdata)
    {

        if (isset($searchdata['username']) && $searchdata['username'] != '' && $searchdata['username'] != null) {
            $this->db->where("(i.username like '%" . $searchdata['username'] . "%' or hr.empno like '%" . $searchdata['username'] . "%')");
            $this->db->join('hr_employee hr', 'i.username = hr.empname','left');
        }
        if (isset($searchdata['ftag']) && $searchdata['ftag'] != '' && $searchdata['ftag'] != null) {
            $this->db->where("(i.ftag like '%" . $searchdata['ftag'] . "%' or i.aaftag like '%" . $searchdata['ftag'] . "%')");
        }
        if (isset($searchdata['dateTo']) && $searchdata['dateTo'] != '' && $searchdata['dateTo'] != null) {
            $this->db->where("(i.dop >= '" . date('Y-m-d',strtotime($searchdata['dateTo'])) . "')");
        }
        if (isset($searchdata['dateFrom']) && $searchdata['dateFrom'] != '' && $searchdata['dateFrom'] != null) {
            $this->db->where("(i.dop <= '" . date('Y-m-d',strtotime($searchdata['dateFrom'])) . "')");
        }
        if (isset($searchdata['location']) && $searchdata['location'] != '' && $searchdata['location'] != null) {
            $this->db->where('i.loc', $searchdata['location']);
        }
        if (isset($searchdata['project']) && $searchdata['project'] != '' && $searchdata['project'] != null) {
            $this->db->where('i.project', $searchdata['project']);
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where('i.status', $searchdata['status']);
        }
        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(i.username like '%" . $search . "%' OR  i.ftag like '%" . $search . "%')");
        }

        $this->db->select('count(i.id) as cnttotal');
        $this->db->from('i_paedsasset i');
        $this->db->where('i.isActive',1);
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
        $this->db->join('users_dash', 'i_AuditTrials.createdBy = users_dash.id','left');
        $this->db->where('FormID', $FormID);
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

}