<?php

namespace App\Http\Controllers;

use Request;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PhpmailerController extends Controller {

	public function sendEmail () {
  	// is method a POST ?
		// echo "here";
		require '../vendor/autoload.php';

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
	    //Server settings
	    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    // echo "<pre>";
	    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'sanjayjanyani43@gmail.com';                 // SMTP username
	    $mail->Password = '******';                           // SMTP password
	    $mail->SMTPSecure = 'tls';          //ssl                  // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                      //465              // TCP port to connect to

	    //Recipients
	    $mail->setFrom('sanjayjanyani43@gmail.com', 'Sanjay');
	    $mail->addAddress('2016.sanjay.janyani@ves.ac.in');     // Add a recipient
	//    $mail->addAddress('ellen@example.com');               // Name is optional
	//    $mail->addReplyTo('info@example.com', 'Information');
	//    $mail->addCC('cc@example.com');
	//    $mail->addBCC('bcc@example.com');

	    //Attachments
	//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);
	    // $my_path="qrimages/".$qr;

	    // $mail->addAttachment("qrimages/11.png");                               // Set email format to HTML
	    $mail->Subject = 'Suggested Jobs';
	    $mail->Body    = 'Some of the positions that match your profiler are <p> Senior Developer at Start Us Insights </p><p>Sr. Software Engineer / Software Engineer - ColdFusion</p><p>Data Scientist Sales & Channel
at HP</p>';
	    $mail->AltBody = 'your password is <b></b> Kindly change your password before using it';

	    $mail->send();
	    // echo 'Message has been sent';
	    // return view('phpmailer');
	}catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
	    return app('App\Http\Controllers\UserController')->jobrecommendation();

	}

	
}
  // 	if(Request::isMethod('get')) {
		// 	require '../vendor/autoload.php';													// load Composer's autoloader

		// 	$mail = new PHPMailer(true);                            // Passing `true` enables exceptions

		// 	try {
		// 		// Server settings
	 //    	$mail->SMTPDebug = 2;                                	// Enable verbose debug output
		// 		$mail->isSMTP();                                     	// Set mailer to use SMTP
		// 		$mail->Host = 'smtp.gmail.com';												// Specify main and backup SMTP servers
		// 		$mail->SMTPAuth = true;                              	// Enable SMTP authentication
		// 		$mail->Username = '2016.sanjay.janynai@ves.ac.in';             // SMTP username
		// 		$mail->Password = 'Sanjay#123';              // SMTP password
		// 		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		// 		$mail->Port = 587;                                    // TCP port to connect to

		// 		//Recipients
		// 		$mail->setFrom('sanjayjanyani43@gmail.com', 'Mailer');
		// 		$mail->addAddress('2016.sanjay.janyani@ves.ac.in', 'Optional name');	// Add a recipient, Name is optional
		// 		$mail->addReplyTo('your-email@gmail.com', 'Mailer');
		// 		$mail->addCC('his-her-email@gmail.com');
		// 		$mail->addBCC('his-her-email@gmail.com');

		// 		//Attachments (optional)
		// 		// $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
		// 		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

		// 		//Content
		// 		$mail->isHTML(true); 																	// Set email format to HTML
		// 		$mail->Subject = Request::input('New Companie');
		// 		$mail->Body    = Request::input('Jp Morgan is reruiting for Java Developer');						// message

		// 		$mail->send();
		// 		echo "here";
		// 		return back()->with('success','Message has been sent!');
		// 	} catch (Exception $e) {
		// 		return back()->with('error','Message could not be sent.');
		// 	}
		// }
  //   	// return view('phpmailer');
  // }