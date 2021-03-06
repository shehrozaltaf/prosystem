<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '512M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
ini_set('max_input_vars', '1000000');

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
        $flag = 0;
        $tableColumn = array();

        if (isset($_POST['idTable']) && $_POST['idTable'] != '') {
            $table = $_POST['idTable'];
            $Custom = new Custom();
            $tableColumn = $Custom->getTableColumn($table);
        } else {
            $flag = 1;
        }

        if ($_FILES['file']['name'] != '' && $flag == 0) {
            $file_array = explode(".", $_FILES['file']['name']);
            $extension = end($file_array);
            if ($extension == 'csv') {

                $config['upload_path'] = 'assets/uploads/excelsUpload';
                $config['allowed_types'] = 'csv';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $error = $this->upload->display_errors();
                } else {
                    $file_data = fopen($_FILES['file']['tmp_name'], 'r');
                    $file_header = fgetcsv($file_data);

                    $html .= '<table class="table table-bordered myTable"><thead><tr class="head">';
                    for ($count = 0; $count < count($file_header); $count++) {
                        $html .= '<th class="myClass" data-key="' . $count . '" width="' . (100 / count($file_header)) . '%"> 
                        <select name="set_column_data" class="form-control set_column_data" 
                        onchange="chkCol(this)"   data-column_number="' . $count . '">
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
                    $html .= '</tr></thead><tbody>';
                    $limit = 0;
                    while (($row = fgetcsv($file_data)) !== FALSE) {
                        $limit++;
                        if ($limit < 10000) {
                            $html .= '<tr>';
                            for ($count = 0; $count < count($row); $count++) {
                                if (!isset($row[$count]) || $row[$count] == '') {
                                    $err = 'invalidVal';
                                } else {
                                    $err = '';
                                }
                                $html .= '<td class="' . $err . ' myClass_' . $count . '" data-key="' . $count . '" contenteditable >' . $row[$count] . '</td>';
                            }
                            $html .= '</tr>';
                        }
                        $temp_data[] = $row;
                    }
                    $_SESSION['file_data'] = $temp_data;
                    $html .= '</tbody>
                          </table>
                          <br />
                          <div align="right">
                           <button type="button" onclick="submitData()" name="import" id="import" class="btn btn-success myImpBtn"  >Import</button>
                          </div>
                          <br />
                           <div class="row m-1">
                                        <div class="col-sm-12">
                                            <h4 class="res_heading" style="color: green;"></h4>
                                            <p class="res_msg" style="color: green;"></p>
                                        </div>
                                    </div>';

                }


            } else {
                $error = 'Only <b>.csv</b> file allowed';
            }
        } elseif ($flag == 1) {
            $error = 'Invalid Table';
        } else {
            $error = 'Please Select CSV File';
        }


        $output = array(
            'error' => $error,
            'output' => $html
        );

        echo json_encode($output, true);
    }


    public function addExcelData()
    {
        $data = array();
        if (isset($_POST['head']) && $_POST['head'] != '' && isset($_POST['body']) && $_POST['body'] != '') {
            if (isset($_POST['idTable']) && $_POST['idTable'] != '') {
                $table = $_POST['idTable'];
                $head = $_POST['head'];
                $body = $_POST['body'];
                foreach ($body as $k => $b) {
                    $arr = array();
                    $arr['createdBy'] = $_SESSION['login']['idUser'] . ',excel';
                    $arr['createdDateTime'] = date('Y-m-d H:i:s');
                    foreach ($b as $key => $v) {
                        $ke = $head[$key];
                        $arr[$ke] = $v;
                    }
                    $data[] = $arr;
                }
                if ($this->db->insert_batch($table, $data)) {
                    $res = array('0' => 'Success', '1' => 'Successfully Uploaded');
                } else {
                    $res = array('0' => 'Error', '1' => $this->db->error());
                }
            } else {
                $res = array('0' => 'Error', '1' => 'Invalid Table');
            }
        } else {
            $res = array('0' => 'Error', '1' => 'Invalid Data');
        }
        echo json_encode($res);
    }

}

?>