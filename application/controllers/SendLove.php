<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendLove extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		
	}

	public function NotifyNewPassword()
	{
		// $email_to = $this->input->post('email_to');
		// $name_to = $this->input->post('name_to');
		$template = file_get_contents("application/views/emails/newpass.html");

		$subject = "SinvaGroup Chào mừng bạn, hãy Login và đổi pass nhé  :>";
		$content = $template;
		$data = [
			"content" => $template,
			"name" => "MR SIMPLE LOVE"
		];
		$this->send("qbingking@gmail.com", $subject, $data);
	}
	public function sendWithout()
	{
		$mail = new PHPMailer;
		$mail->From = 'from@example.com';
		$mail->FromName = 'Mailer';
		$mail->addAddress('qbingking@gmail.com', 'User');     // Add a recipient

		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}

	}


	public function send($mail_to = null, $subject = null, $data = ['name' => 'Vô danh', 'content' => '_ _ _'])
	{
		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->SMTPDebug = 0;
		    $mail->CharSet = "UTF-8";
		    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'mynameismrbinh@gmail.com';                     // SMTP username
		    $mail->Password   = 'coutbinhdeptrai';                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom('mynameismrbinh@gmail.com', 'GIỎ HÀNG');
		    $mail->addAddress($mail_to, $data["name"]);     // Add a recipient

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $data["content"];
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

}

/* End of file SendEmail.php */
/* Location: ./application/controllers/SendEmail.php */