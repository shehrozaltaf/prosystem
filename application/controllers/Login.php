<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
error_reporting(0);
ini_set('memory_limit', '256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin');
    }

    function index($msg = NULL)
    {
        $data = array();
        $Login = new MLogin();
        $SeesionInfo = $this->session->all_userdata();
        if (isset($_SESSION['login']['idUser'])) {
            redirect(base_url('index.php/hr_controllers/employee_entry'), refresh);
        } else {
            $this->load->view('auth/login', $data);
        }
    }

    function getLogin()
    {
        $username = $this->input->post('login_username');
        $Password = $this->input->post('login_password');
        if (!isset($username) || $username == '' || $username == 'undefined') {
            echo 4;
            exit();
        }
        if (!isset($Password) || $Password == '' || $Password == 'undefined') {
            echo 5;
            exit();
        }
        $Login = new MLogin();
        $this->form_validation->set_rules('login_username', 'UserName', 'required');
        $this->form_validation->set_rules('login_password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo 3;
            exit();
        } else {
            $result = $Login->validate($username, $Password);

            $Custom = new Custom();
            if (count($result) == 1) {

                if ($Password === $result[0]->password) {
                    $data = array(
                        'idUser' => $result[0]->id,
                        'username' => $result[0]->username,
                        'password' => $result[0]->password,
                        'idGroup' => $result[0]->idGroup,
                        'full_name' => $result[0]->full_name
                    );
                    $this->session->set_userdata('login', $data);
                    $trackarray = array("action" => "Login Success",
                        "result" => "User " . $result[0]->username . ": Login Success");
                    $Custom->trackLogs($trackarray, "user_logs");
                    echo 1;
                } else {
                    $trackarray = array("action" => "Invalid Password",
                        "result" => "User " . $result[0]->username . ": incorrect password");
                    $Custom->trackLogs($trackarray, "user_logs");
                    echo 2;
                }
            } else {
                echo 3;
            }
        }
    }

    function getLogout()
    {
        $Custom = new Custom();
        $trackarray = array("action" => "Logout",
            "result" => "User " . $_SESSION['login']['username'] . ": Logout");
        $Custom->trackLogs($trackarray, "user_logs");
        session_destroy();
    }

    function recover_password()
    {
        $this->load->view('auth/recover_password');
    }


    public function forgetPwd_SendEmail()
    {
        if (isset($_POST['email']) && $_POST['email'] != '') {
            $Mlogin = new MLogin();
            $ForgetPass = $Mlogin->ForgetPass($_POST['email']);
            if (isset($ForgetPass[0]) && $ForgetPass[0]->password != '' && $ForgetPass[0]->email != '') {
                $userName = $ForgetPass[0]->username;
                $password = $ForgetPass[0]->password;
                $email = $ForgetPass[0]->email;
                $this->load->library('email');
                $Subject = "Recover Password - " . PROJECT_NAME;
                $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
                            <title>' . html_escape($Subject) . '</title>
                            <style type="text/css">
                                body {
                                    font-family: Arial, Verdana, Helvetica, sans-serif;font-size: 16px;
                                }
                            </style>
                        </head>
                        <body>
                        Dear ' . $userName . ',<br/><br/>
                        <p>Your old password is: <strong>' . $password . '</strong>. You can change your password from the <a href="' . base_url() . '">portal</a>.</p>
                        <br/>
                        
                        <p style=\'  background-color: yellow; font-weight: 600;\'>Note: This is an automated message, please ignore if the task is completed.</p> <br>
                        
                        <p>Thank you </p> 
                        <p>Regards,</p>
                        <p><a href="' . base_url() . '">' . PROJECT_NAME . '</a></p>
                        </body>
                        </html>';
                $from = 'sk_khan911@hotmail.com';
                $to = $email;
                $email_setting = array('mailtype' => 'html');
                $this->email->initialize($email_setting);
                $res = $this->email
                    ->from($from)
                    ->to($to)
                    ->subject($Subject)
                    ->message($body)
                    ->send();
                if ($res) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            } else {
                $result = 3;
            }
        } else {
            $result = 2;
        }
        echo $result;
    }

}