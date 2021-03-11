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
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where("a.status", $searchdata['status']);
        }
        if (isset($searchdata['verification_status']) && $searchdata['verification_status'] != '' && $searchdata['verification_status'] != null) {
            if($searchdata['verification_status']=='Due'){
                $this->db->where("a.due_date <= '".date('Y-m-d')."' " );
            }else{
                $this->db->where("a.verification_status", $searchdata['verification_status']);
            }
        }
        if (isset($searchdata['tag_pr']) && $searchdata['tag_pr'] != '' && $searchdata['tag_pr'] != null) {
            $this->db->where("(a.pr_no like '%" . $searchdata['tag_pr'] . "%' or a.tag_no like '%" . $searchdata['tag_pr'] . "%' )");
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

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(a.tag_no like '%" . $search . "%' OR  a.status_name like '%" . $search . "%')");
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
        if (isset($searchdata['verification_status']) && $searchdata['verification_status'] != '' && $searchdata['verification_status'] != null) {
            if($searchdata['verification_status']=='Due'){
                $this->db->where("a.due_date <= '".date('Y-m-d')."' " );
            }else{
                $this->db->where("a.verification_status", $searchdata['verification_status']);
            }
        }
        if (isset($searchdata['status']) && $searchdata['status'] != '' && $searchdata['status'] != null) {
            $this->db->where("a.status", $searchdata['status']);
        }
        if (isset($searchdata['tag_pr']) && $searchdata['tag_pr'] != '' && $searchdata['tag_pr'] != null) {
            $this->db->where("(a.pr_no like '%" . $searchdata['tag_pr'] . "%' or a.tag_no like '%" . $searchdata['tag_pr'] . "%' )");
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

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            $this->db->where("(a.tag_no like '%" . $search . "%' OR  a.status_name like '%" . $search . "%')");
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
            foreach ($searchdata['idAsset_multiple'] as $a){
                $this->db->or_where('idAsset', $a);
            }
        }
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->limit(50, 0);
        $this->db->order_by('idAsset','desc');
        $query = $this->db->get();
        return $query->result();
    }

    function getAssetDocsByIdAsset($searchdata)
    {
        $idAsset = '';
        if (isset($searchdata['idAsset']) && $searchdata['idAsset'] != '' && $searchdata['idAsset'] != null) {
            $idAsset = $searchdata['idAsset'];
        }
        $this->db->select('*');
        $this->db->from('a_asset_docs');
        $this->db->where('idAsset', $idAsset);
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