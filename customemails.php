<?php


function sendEnquiryemail($to, $subject, $html_message){

	$msgg = "";
	// Build the email headers.

	$email_headers = "MIME-Version: 1.0" . "\r\n";

	$email_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $email_headers .= "From: Studycoach <vaigainfotech.programmer2@gmail.com>";



	if (mail($to, $subject, $html_message, $email_headers)) {

        // Set a 200 (okay) response code.

        http_response_code(200);

        $msgg = "<div class='success'>Thank You! Your message has been sent.</div>";

    } else {

        // Set a 500 (internal server error) response code.

        http_response_code(500);

        $msgg = "<div class='warning'>Oops! Something went wrong and we couldn't send your message.</div>";

    }
    return $msgg;
}


if($_POST['form-1'] == "form-1"){
	$p_name 	= $_POST['p_name'];
	$p_mobile 	= $_POST['p_mobile'];
	$p_email 	= $_POST['p_email'];
	$con_email 	= $_POST['con_email'];
	$p_location = $_POST['p_location'];
	$msg_body= "";

	$msg_body .= "<p>Dear Admin,</p> <p>Please find details below.</p>";
	if($p_name){ $msg_body .= "<p>Name : ".$p_name."</p>"; }
	if($p_mobile){ $msg_body .= "<p>Phone : ".$p_mobile."</p>"; }
	if($p_email){ $msg_body .= "<p>Email : ".$p_email."</p>"; }
	if($p_location){ $msg_body .= "<p>Location : ".$p_location."</p>"; }

	$reg_email = "studycoach365@gmail.com";
	$subject = "Studycoach :: Enquiry from - ".strtoupper($p_name);

    $msg = sendEnquiryemail($reg_email, $subject, $msg_body);

    echo $msg;
} 


?>