<?php ob_start();
ini_set('memory_limit', '-1');
ini_set('sqlsrv.ClientBufferMaxKBSize', '5242888');
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '5242888');
header('Content-type: text/html; charset=utf-8');

class Reports extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('budget_model/mreports');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Projected",
            "result" => "View Projected page. Fucntion: Projected/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive', 'DESC');
        $data['hr_employee'] = $Custom->selectAllQuery('hr_employee', 'id', 'status');
        $data['hr_desig'] = $Custom->selectAllQuery('hr_desig', 'id', '');
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/reports', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getExcel()
    {
        ob_end_clean();
        $fileName = 'budget_report_' . time() . '.xlsx';
        $this->load->library('excel');

        if (isset($_GET['p']) && $_GET['p'] != '' && $_GET['p'] != 0) {
            $Mreports = new Mreports();
            $searchData = array();
            $searchData['proj_code'] = (isset($_GET['p']) && $_GET['p'] != '' && $_GET['p'] != 0 ? $_GET['p'] : 0);
            $searchData['bdgt_code'] = (isset($_GET['b']) && $_GET['b'] != '' && $_GET['b'] != 0 ? $_GET['b'] : 0);
            $searchData['prjn_month'] = (isset($_GET['m']) && $_GET['m'] != '' && $_GET['m'] != 0 ? $_GET['m'] : 0);
            $searchData['prjn_year'] = (isset($_GET['y']) && $_GET['y'] != '' && $_GET['y'] != 0 ? $_GET['y'] : 0);
            $objPHPExcel = new    PHPExcel();

            $d=date('M-Y',strtotime('01-'.$searchData['prjn_month'].'-'.$searchData['prjn_year']));
            /*============Sheet 1============*/
            $data = $Mreports->getBandData($searchData);
            $objPHPExcel->setActiveSheetIndex(0,'Bands');
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Grant End Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', $d);

            $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Designation');
            $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Budgeted FTE');
            $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Actual FTE');
            $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Variance FTE');

            $rowCount = 2;
            foreach ($data as $list) {
                $prjn_pctg = 0;
                $actl_pctg = 0;

                if (isset($list->prjn_pctg) && $list->prjn_pctg != '') {
                    $prjn_pctg = $list->prjn_pctg;
                }
                if (isset($list->actl_pctg) && $list->actl_pctg != '') {
                    $actl_pctg = $list->actl_pctg;
                }
                $variance_pctg = $prjn_pctg - $actl_pctg;
                $rowCount++;
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->desig);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $prjn_pctg . '%');
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $actl_pctg . '%');
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $variance_pctg . '%');
            }
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getStyle('A2:Z2')->getFont()->setName('Calibri');
            $objPHPExcel->getActiveSheet()->getStyle('A2:Z2')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle("A2:Z2")->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet()->setTitle('Bands');

            /*============Sheet 2============*/
            $getEmpData = $Mreports->getEmpData($searchData);
            $myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'Employers');
            $objPHPExcel->addSheet($myWorkSheet, 1);
            $objPHPExcel->setActiveSheetIndex(1);
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Grant End Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', $d);
            $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'ID');
            $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Designation');
            $objPHPExcel->getActiveSheet()->SetCellValue('D2', '%');
            $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Project');
            $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Position');

            $rowCounte = 2;
            foreach ($getEmpData as $list_emp) {
                $rowCounte++;
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCounte, $list_emp->empl_code);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCounte,  $list_emp->empname);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCounte,  $list_emp->desig);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCounte,  $list_emp->actl_pctg.'%');
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCounte,  $list_emp->proj_code);
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCounte,  $list_emp->bdgt_code);
            }

            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle("A2:Z2")->getFont()->setBold(true);
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            header('Cache-Control: max-age=0'); //no cache
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
        } else {
            echo 'Invalid Project';
        }

    }

}

?>