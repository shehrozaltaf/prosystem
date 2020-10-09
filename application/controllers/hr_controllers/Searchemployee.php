<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 10/07/2020
 * Time: 11:22
 */
class Searchemployee extends CI_Controller
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

        $MSettings = new MSettings();
        $Custom = new Custom();

        $data['datatbl'] = $Custom->selectAll("select id, case when ddlemptype = 1 then 'Payroll' when ddlemptype = 2 then 'Service Contract' when ddlemptype = 3 then 'Consultancy Contract' end 'EmployeeType',
      case when ddlcategory = 1 then 'Academic' when ddlcategory = 2 then 'Administration' when ddlcategory = 3 then 'Allied Health' end 'EmployeeCategory',
empno 'EmployeeNo', empname 'EmployeeName'
from forms");

        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        /*==========Log=============*/


        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");


        /*echo "<pre>";
        echo var_dump(json_encode($data['datatbl']));
        echo "</pre>";*/

//        echo json_encode($data);


        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('searchemployee', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    /*Setting Page, User Rights*/
    function getMenuData()
    {
        $this->load->model('msettings');
        $idGroup = $_SESSION['login']['idGroup'];
        $Menu = '';
        $Msetting = new MSettings();
        $getDataRights = $Msetting->getUserRights($idGroup, '1', '');
        if (isset($getDataRights) && count($getDataRights) >= 1) {

            $myresult = array();
            foreach ($getDataRights as $key => $value) {
                if (isset($value->idParent) && $value->idParent != '' && array_key_exists(strtolower($value->idParent), $myresult)) {
                    $mykey = strtolower($value->idParent);
                    $myresult[strtolower($mykey)]->myrow_options[] = $value;
                } else {
                    $mykey = strtolower($value->idPages);
                    $myresult[strtolower($mykey)] = $value;
                }
            }
            foreach ($myresult as $pages) {
                if ($pages->isParent == 1) {
                    $Menu .= '<li class=" nav-item   ' . $pages->menuClass . ' has-sub">
                                      <a href="javascript:void(0)"> 
                                         <i class="feather ' . $pages->menuIcon . '"></i>
                                          <span class="menu-title" data-i18n="' . $pages->pageName . '">' . $pages->pageName . '</span>
                                       </a>
                                       <ul class="menu-content"> ';
                    if (isset($pages->myrow_options) && $pages->myrow_options != '') {
                        foreach ($pages->myrow_options as $options) {
                            $Menu .= ' <li class="' . $options->menuClass . '">
                                        <a href="' . base_url('index.php/' . $options->pageUrl) . '">
                                            <i class="feather ' . $options->menuIcon . '"></i>
                                            <span class="menu-item" data-i18n="' . $options->pageName . '">' . $options->pageName . '</span> 
                                        </a>
                                      </li>';
                        }
                    }
                    $Menu .= ' </ul></li>';
                } else {
                    $Menu .= '<li class=" nav-item ' . $pages->menuClass . '">
                                    <a href="' . base_url('index.php/' . $pages->pageUrl) . '" class="">
                                        <i class="feather ' . $pages->menuIcon . '"></i>
                                        <span class="menu-title" data-i18n="' . $pages->pageName . '">' . $pages->pageName . '</span>
                                    </a>
                              </li>';
                }
            }
        } else {
            $Menu = '';
        }
        $Menu .= ' <li class=" nav-item">
                <a href="javascript:void(0)" onclick="logout()">
                    <i class="feather icon-power"></i>
                    <span class="menu-title" data-i18n="Logout">Logout</span>
                </a>
            </li>';
        echo $Menu;
    }




}