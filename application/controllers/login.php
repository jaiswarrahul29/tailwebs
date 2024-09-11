<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        if ($this->session->userdata('admin_user')) {
            redirect(base_url());
        } else {
            $this->load->view('login');
        }
    }


    public function auth()
    {
        $username = $_POST['username'];
        $password = md5(sha1($_POST['password']));

        $user = $this->admin_model->getUserByUsername($username);


        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Invalid email format please try again!');
            redirect(base_url('login'));
        } else {
            if (!empty($user)) {
                if ($user->password == $password) {
                    $session_data = [
                        "user_id" => $user->id,
                        "name" => $user->name,
                        "email" => $user->email,
                    ];
                    $this->session->set_userdata("admin_user", $session_data);

                    $this->session->set_flashdata('success', 'Logged In Successfully');
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('error', 'Wrong Password please try again!');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('error', 'Wrong Email and Password please try again!');
                redirect(base_url('login'));
            }
        }
    }


    public function forgetPassword()
    {
        $email = $_POST['email'];

        $user = $this->admin_model->getUserByUsername($email);

        if (!empty($user)) {
            $html = "Please Click this link to reset your password. Link=> " . base_url() . "login/reset?token=" . md5(sha1($email));

            // SMTP SERVER 
            $config['protocol']    = 'smtp';
            $config['smtp_host']   = 'ssl://smtp.googlemail.com';
            $config['smtp_port']   = 465;
            $config['smtp_user']   = 'umeshrise2911@gmail.com';
            $config['smtp_pass']   = 'wrjwntxxgqhmrzya';
            $config['mailtype']    = 'html';
            $config['charset']     = 'iso-8859-1';
            $config['wordwrap']    = TRUE;
            $config['newline']     = "\r\n";


            // Set email parameters
            $this->email->from('umeshrise2911@gmail.com', 'Umesh Jaiswar');
            $this->email->to($email);  // Recipient's email
            $this->email->subject('Tailwebs Dashboard | Reset Password');
            $this->email->message($html);

            // Send email
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Reset Email sent successfully, Please Check your Email!');
            } else {
                // show_error($this->email->print_debugger());
                $this->session->set_flashdata('error', 'Failed to reset password please try after some time.');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Email Address, Please contact Admin');
        }


        redirect(base_url('login'));
    }


    public function reset()
    {
        $token = $_GET['token'];
        $users = $this->admin_model->getAllUsers();

        if (!empty($token)) {
            foreach ($users as $user) {
                if ($token == md5(sha1($user->email))) {
                    $this->load->view('reset');
                } else {
                    $this->session->set_flashdata('error', 'Invalid Parameter please contact admin or try to reset password again!');
                    redirect(base_url('login'));
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Parameter please contact admin or try to reset password again!');
            redirect(base_url('login'));
        }
    }

    public function updatePassword()
    {
        $password = md5(sha1($_POST['password']));
        $confirmPassword = md5(sha1($_POST['confirmPassword']));
        $token = $_POST['token'];

        if ($password == $confirmPassword) {

            $users = $this->admin_model->getAllUsers();

            foreach ($users as $user) {
                if ($token == md5(sha1($user->email))) {
                    $data = [
                        "password" => $password
                    ];
                    if ($this->admin_model->updateUser($user->email, $data)) {
                        $this->session->set_flashdata('success', 'Password Updated Successfully!');
                        redirect(base_url('login'));
                    }else{
                        $this->session->set_flashdata('error', 'Something went wrong please try again!');
                        redirect(base_url('login'));
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Parameter please contact admin or try to reset password again!');
                    redirect(base_url('login'));
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Password and Confirm Password Not Match, please try again!');
            $redirect = "login/reset?token=" . $token;
            redirect(base_url($redirect));
        }
    }
}
