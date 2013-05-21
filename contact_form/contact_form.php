<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once("config.php");
if(isset($_POST["action"]) && $_POST["action"]=="contact_form")
{
	//contact form
	require_once("../phpMailer/class.phpmailer.php");
	$result = array();
	$result["isOk"] = true;
	if($_POST["first_name"]!="" && $_POST["last_name"]!="" && $_POST["email"]!="" && preg_match("#^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$#", $_POST["email"]) && $_POST["message"]!="")
	{
		$values = array(
			"department" => $_POST["department"],
			"first_name" => $_POST["first_name"],
			"last_name" => $_POST["last_name"],
			"date_of_birth" => $_POST["date_of_birth"],
			"phone_number" => $_POST["phone_number"],
			"social_security_number" => $_POST["social_security_number"],
			"email" => $_POST["email"],
			"message" => $_POST["message"]
		);
		if((bool)ini_get("magic_quotes_gpc")) 
			$values = array_map("stripslashes", $values);
		$values = array_map("htmlspecialchars", $values);

		$mail=new PHPMailer();

		$mail->CharSet='UTF-8';

		$mail->SetFrom($values["email"], $values["first_name"]);
		$mail->AddAddress(_to_email, _to_name);

		$smtp=_smtp_host;
		if(!empty($smtp))
		{
			$mail->IsSMTP();
			$mail->SMTPAuth = true; 
			$mail->Host = _smtp_host;
			$mail->Username = _smtp_username;
			$mail->Password = _smtp_password;
			if((int)_smtp_port>0)
				$mail->Port = (int)_smtp_port;
			$mail->SMTPSecure = _smtp_secure;
		}

		$mail->Subject = _subject_email;
		$mail->MsgHTML(include("../contact_form/template.php"));

		if($mail->Send())
			$result["submit_message"] = _msg_send_ok;
		else
		{
			$result["isOk"] = false;
			$result["submit_message"] = _msg_send_error;
		}
	}
	else
	{
		$result["isOk"] = false;
		if($_POST["first_name"]=="")
			$result["error_first_name"] = _msg_invalid_data_first_name;
		if($_POST["last_name"]=="")
			$result["error_last_name"] = _msg_invalid_data_last_name;
		if($_POST["email"]=="" || $_POST["email"]==_def_email || !preg_match("#^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$#", $_POST["email"]))
			$result["error_email"] = _msg_invalid_data_email;
		if($_POST["message"]=="" || $_POST["message"]==_def_message)
			$result["error_message"] = _msg_invalid_data_message;
	}
	echo @json_encode($result);
	exit();
}
?>