<?php


		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

		   	 // change to your domain ex : mail@domain.com
	   		$from = "noreply@luvetheme.com";

			if(@$_POST['fullname'] == '')
			{
				echo "{error: 'Name cannot empty'}";
				exit;
			}else if(@$_POST['email'] == ''){
				echo "{error: 'Email cannot empty'}";
				exit;
			}


			if(@$_POST['fullname'] != '' && @$_POST['email'] != '')
			{
				// change to your email address
		        $to = "youtmail@mail.com";

				// mail subject
		        $subject = "[RSVP] Reserved for ".@$_POST['fullname'] ;

		        $headers  = 'MIME-Version: 1.0' . "\r\n";
		        $lf= strtoupper(substr(PHP_OS, 0, 3)) == 'WIN'?"\r\n":"\n";
		        $headers  .= "From: $from" .$lf;
		        $headers .= "Date: ".date('r') .$lf;
		        // $headers .= "X-Sender: $x_sender" .$lf;
		        $headers .= "X-Mailer: PHP" .$lf; // mailer
		        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				$message  = "Name   : ". @$_POST['fullname'].'<br />';
				$message .= "Email  : ". @$_POST['email'].'<br />';
				$message .= "Guests : ". @$_POST['guests'].'<br />';
				$message .= "Notes  : ". @$_POST['notes'].'<br />';


		        if(mail($to,$subject, $message, $headers)){
		        	echo json_encode(array("success"=>"Thank You For Your Reservation, We Will Meet There"));
		        	exit;
		        }



			}


		}
