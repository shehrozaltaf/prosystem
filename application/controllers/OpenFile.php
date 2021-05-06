<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0);
ini_set('memory_limit', '256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');

class OpenFile extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }


    function index()
    {
        $data = array();
        if(isset($_GET['a']) && $_GET['a']!='' && isset($_GET['doc']) && $_GET['doc']!=''){
            $this->load->model('asset_models/masset');
            $searchData=array();
            $searchData['idAsset'] = $_GET['a'];
            $searchData['docName'] = $_GET['doc'];
            $M = new MAsset();
            $data['docs'] = $M->getAssetDocsByIdAsset($searchData);
        }

        if(isset($_GET['e']) && $_GET['e']!='' && isset($_GET['doc']) && $_GET['doc']!=''){
            $this->load->model('hr_model/Mempmodel');
            $searchData = array();
            $searchData['empno'] = $_GET['e'];
            $searchData['docName'] = $_GET['doc'];
            $M = new Mempmodel();
            $data['docs'] =$M->getEmpDocsByEmpNo($searchData);
        }
        /*==========Log=============*/
        $this->load->view('open_file',$data);
    }


}

?>