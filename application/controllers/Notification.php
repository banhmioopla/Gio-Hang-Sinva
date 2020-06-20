<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Notification extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('account') == "")
		{
			$this->session->sess_destroy();
			return redirect('Login');
		}
		$this->load->helper('giohang/main'); // helper
		$this->load->helper('giohang/vendors'); // helper
		$this->load->model('user_model');
	}
	public function index()
	{
		$menu = array();
		$data = array();
		
		// print_r($this->apartment_tag_model->get()); die;
		$data = [
			'template' => 'body-contents/notification'
		];

		$menu = [
			'list_menu' => get_menubar($this->session->status),
			'account' => $this->session->account
		];

	    $referlink['base_url_plugins'] = base_url()."templates";
    	$referlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$referlink['title_head'] = "GH - Sinva";

    	$footer = [
    		'vendors' => 
    			load_vendors(
    				array(
						'jquery-bottom',
						'form-bottom',
						'data-table-bottom',
						'buttons-bottom',
						'Xeditable-bottom',
						'core-bottom',
						'wysiwig-bottom'
					)
    			)
    	];

		$this->load->view('components/header',$referlink);
		$this->load->view('components/header-content', $menu);
		$this->load->view('main-content-page', $data);
		$this->load->view('components/footer', $footer);
		
		// control loading footer js scripts file, that splited by role user
		
		$this->load->view('ajax-scripts/noti-board'); // yummy
		$this->load->view('ajax-scripts/onload'); // yummy

	}
	public function SendMail()
	{
		$email_members = $this->user_model->get_email();
		// print_r($email_members); die;
		$sender_name = $this->session->fullname;
		$header_content = "Xin chào, đây là giohang, email được gửi từ ".$sender_name."! \n\n";
		$subject = "Thông báo từ SINVA - giỏ hàng";
		$content = $header_content.$this->input->post("content");
		;

		foreach ($email_members as $member) {
			// $this->notification_model->add();
			if($member['email'] != '')
			{
				$this->sendthelove($member['email'], $member['fullname'], $subject, $content);
			}
			
		}
	}

	public function sendthelove($mail_to = null, $name_to, $subject = null, $content)
	{
		$mail = new PHPMailer();
		try {
		    //Server settings
		    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->SMTPDebug = 0;
		    $mail->CharSet = "UTF-8";
		    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'mynameismrbinh@gmail.com';                     // SMTP username
		    $mail->Password   = 'xanhdotimvang';                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom('mynameismrbinh@gmail.com', 'GH Sinva');
		    $mail->addAddress($mail_to, $name_to);     // Add a recipient

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $content;

		    $success = $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

}

/* End of file Notification.php */
/* Location: ./application/controllers/Notification.php */