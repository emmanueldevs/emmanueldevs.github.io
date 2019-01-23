<?php 
error_reporting();
//0
$today = date("jS F, Y h:i:s A");
$eventday = date("jS F, Y");
$autoID = date("U");
$voteday = date("jS F, Y");
$votetime = date("h:i A");

function protect($field){
  $string=htmlentities($field,ENT_QUOTES);
  $string= mysql_real_escape_string(trim(strip_tags(addslashes($field))));
  return $string;
}

function DoDelete($table, $column){
  $sqld = "DELETE FROM $table WHERE $column =".$_GET['id'];;
  $rsqd = mysql_query($sqld) or die("An error occurred. Reason: ".mysql_error());
}

function DoBan($table, $column){
  $today=date("jS F, Y h:i:s A");
  $sqld = "UPDATE $table SET ban = '1', ban_date = '".$today."' WHERE $column =".$_GET['id'];;
  $rsqd = mysql_query($sqld) or die("An error occurred. Reason: ".mysql_error());
}

function DoPermit($table, $column){
  $today=date("jS F, Y h:i:s A");
  $sqld = "UPDATE $table SET ban = '0', permit_date = '".$today."' WHERE $column =".$_GET['id'];;
  $rsqd = mysql_query($sqld) or die("An error occurred. Reason: ".mysql_error());
}

function DoDeactivate($table, $column, $active){
  $today=date("jS F, Y h:i:s A");
  $sqld = "UPDATE $table SET active = '".$active."', date_deactivated = '".$today."' WHERE $column =".$_GET['id'];;
  $rsqd = mysql_query($sqld) or die("An error occurred. Reason: ".mysql_error());
}

function DoActivate($table, $column, $active){
  $sqld = "UPDATE $table SET active = '".$active."' WHERE $column =".$_GET['id'];;
  $rsqd = mysql_query($sqld) or die("An error occurred. Reason: ".mysql_error());
}

function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
       $platform = 'linux';
    }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
       $platform = 'mac';
    }elseif (preg_match('/windows|win32/i', $u_agent)) {
       $platform = 'windows';
    }
//Next get the name of the useragent seperately
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
       $bname = 'Internet Explorer';
       $ub = "MSIE";
    } elseif(preg_match('/Firefox/i',$u_agent)) {
       $bname = 'Mozilla Firefox';
       $ub = "Firefox";
    } elseif(preg_match('/Chrome/i',$u_agent)) {
       $bname = 'Google Chrome';
       $ub = "Chrome";
    }elseif(preg_match('/Safari/i',$u_agent)) {
       $bname = 'Apple Safari';
       $ub = "Safari";
    }elseif(preg_match('/Opera/i',$u_agent)) {
       $bname = 'Opera';
       $ub = "Opera";
    }elseif(preg_match('/Netscape/i',$u_agent)) {
       $bname = 'Netscape';
       $ub = "Netscape";
    }
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
       // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
       //we will have two since we are not using 'other' argument yet
       //see if version is before or after the name
       if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
          $version= $matches['version'][0];
       }else {
          $version= $matches['version'][1];
       }
    }else {
       $version= $matches['version'][0];
    }
    // check if we have a number
    if ($version == null || $version == "") {$version = "?";}
    return array(
       'userAgent' => $u_agent,
       'name'      => $bname,
       'version'   => $version,
       'platform'  => $platform,
       'pattern'   => $pattern
    );
 }
   // now get it
   $ua = getBrowser();
   $userbrowser = "Added From: " . $ua['name'] . " " . $ua['version'] .
      " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
   //print_r($userbrowser);
?>