<?php error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '512M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');

class Upload_data extends CI_controller
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
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Upload Data",
            "result" => "View Upload Data page. Fucntion: Upload_data/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'upload_data');

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('upload_data', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function upload()
    {
        $error = '';
        $html = '';
        $tableColumn = array();


        if ($_FILES['file']['name'] != '') {
            if (isset($_POST['idTable']) && $_POST['idTable'] != '') {
                $table = $_POST['idTable'];
                if ($table == 'bl_randomised') {
                    $tableColumn = array('id', 'bl', 'hhno');
                } elseif ($table == 'devices') {
                    $tableColumn = array('id', 'imei', 'deviceid', 'tag', 'appname', 'region', 'appversion', 'updt_date', 'id_org');
                } else {
                    $error = 'Invalid Table';
                }


                $file_array = explode(".", $_FILES['file']['name']);
                $extension = end($file_array);
                if ($extension == 'csv') {
                    $file_data = fopen($_FILES['file']['tmp_name'], 'r');
                    $file_header = fgetcsv($file_data);

                    $html .= '<table class="table table-bordered"><tr>';
                    for ($count = 0; $count < count($file_header); $count++) {

                        /* $html .= '
                            <th>
                             <select name="set_column_data" class="form-control set_column_data" data-column_number="' . $count . '">
                              <option value="">Set Count Data</option>
                              <option value="first_name">First Name</option>
                              <option value="last_name">Last Name</option>
                              <option value="email">Email</option>
                             </select>
                            </th>
                            ';*/
                        $html .= '<th> <select name="set_column_data" class="form-control set_column_data" 
onchange="chkCol(this)"
                                data-column_number="' . $count . '">
                         <option value="">Select Column</option>';
                        foreach ($tableColumn as $t) {
                            $colmSelected = '';
                            if ($file_header[$count] == $t) {
                                $colmSelected = 'selected';
                            }
                            $html .= '<option value="' . $t . '" ' . $colmSelected . '>' . $t . '</option>';
                        }
                        $html .= '</select></th>';
                    }
                    $html .= '</tr>';
                    $limit = 0;
                    while (($row = fgetcsv($file_data)) !== FALSE) {
                        $limit++;
                        if ($limit < 5000) {
                            $html .= '<tr>';
                            for ($count = 0; $count < count($row); $count++) {
                                if(!isset($row[$count]) || $row[$count]==''){
                                    $err='invalidVal';
                                }else{
                                    $err='';
                                }
                                $html .= '<td class="'.$err.'" contenteditable >' . $row[$count] . '</td>';
                            }
                            $html .= '</tr>';
                        }
                        $temp_data[] = $row;
                    }
                    $_SESSION['file_data'] = $temp_data;
                    $html .= '
                          </table>
                          <br />
                          <div align="right">
                           <button type="button" name="import" id="import" class="btn btn-success" disabled>Import</button>
                          </div>
                          <br />';
                } else {
                    $error = 'Only <b>.csv</b> file allowed';
                }


            } else {
                $error = 'Invalid Table';
            }

        } else {
            $error = 'Please Select CSV File';
        }

        $output = array(
            'error' => $error,
            'output' => $html
        );

        echo json_encode($output);
    }


    function fetchCSV()
    {
        if (!empty($_FILES['csv_file']['name'])) {
            $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
            $column = fgetcsv($file_data);
            while ($row = fgetcsv($file_data)) {
                $row_data[] = array(
                    'student_name' => $row[0],
                    'student_phone' => $row[1]
                );
            }
            $output = array(
                'column' => $column,
                'row_data' => $row_data
            );

            echo json_encode($output);

        }

    }

    function importData()
    {
        if (isset($_POST["first_name"])) {
            $connect = new PDO("mysql:host=localhost; dbname=testing", "root", "");
            session_start();
            $file_data = $_SESSION['file_data'];
            unset($_SESSION['file_data']);
            foreach ($file_data as $row) {
                $data[] = '("' . $row[$_POST["first_name"]] . '", "' . $row[$_POST["last_name"]] . '", "' . $row[$_POST["email"]] . '")';
            }
            if (isset($data)) {
                $query = "
                  INSERT INTO csv_file 
                  (first_name, last_name, email) 
                  VALUES " . implode(",", $data) . "
                  ";
                $statement = $connect->prepare($query);
                if ($statement->execute()) {
                    echo 'Data Imported Successfully';
                }
            }
        }
    }

    public function addExcelData()
    {
        $config['upload_path'] = 'assets/uploads/excelsUpload';
        $config['allowed_types'] = 'xlsx|xlx|csv';
        $this->load->library('upload', $config);
        $data = array();
        if (!$this->upload->do_upload('document_file')) {
            /* $error = array('Error' => $this->upload->display_errors());
             print_r($error);*/
            $data = array('0' => 'Error', '1' => $this->upload->display_errors());
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('Error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if (isset($_POST['idTable']) && $_POST['idTable'] != '' && $_POST['idTable'] != '0') {
                $table = $_POST['idTable'];
                $data = array('document_file' => $this->upload->data());
                $file = 'assets/uploads/excelsUpload/' . $data['document_file']['file_name'];
                if (file_exists($file)) {
                    $this->load->library('excel');
                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    foreach ($cell_collection as $cell) {
                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                        if ($row == 1) {
                            $header[$row][$column] = $data_value;
                        } else {
                            $arr_data[$row][$column] = $data_value;
                        }
                    }
                    $myarr = array();
                    foreach ($arr_data as $k => $l) {
                        $c = array();
                        foreach ($header[1] as $h => $v) {
                            $c[$v] = $l[$h];
                        }
                        $myarr[] = $c;
                    }
                    if ($this->db->insert_batch($table, $myarr)) {
                        $data = array('0' => 'Success', '1' => 'Successfully Uploaded');
                    } else {
                        $data = array('0' => 'Error', '1' => $this->db->error());
                    }
                } else {
                    $data = array('0' => 'Error', '1' => 'Error while uploading file');
                }
            } else {
                $data = array('0' => 'Error', '1' => 'Please select table');
            }

        }
        echo json_encode($data);
    }


}

?>