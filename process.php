<?php
error_reporting(0);

function protect($field){
  $string=htmlentities($field,ENT_QUOTES);
  $string= mysql_real_escape_string(trim(strip_tags(addslashes($field))));
  return $string;
}

  $name =  protect($_POST["name"]);
  $email =  protect($_POST["email"]);
  $phone =  protect($_POST["phone"]);
  $message =  protect($_POST["message"]);
  $EmailTo = "emmanueladeboje@gmail.com"; // change with your email
  $Subject = "An enquiry about you from your Portfolio Resume";
  // prepare email body text
  $Body = "Name: ";
  $Body .= $name;
  $Body .= "\n";
  $Body .= "Phone: ";
  $Body .= $phone;
  $Body .= "\n";
  $Body .= "Email: ";
  $Body .= $email;
  $Body .= "\n";
  $Body .= "Message: ";
  $Body .= $message;
  $Body .= "\n";
  // send email
  $success = mail($EmailTo, $Subject, $Body, "From:".$email);
  // redirect to success page
  if ($success){
    echo "Sent successfull 👌";
    //print_r($Body);
  }else{
    echo "invalid";
  }
?>
