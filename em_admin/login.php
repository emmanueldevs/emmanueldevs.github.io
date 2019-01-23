<?php
 session_start();
 include ("functions.php");

 if (isset($_SESSION['email'])) header("Location: index.php");
 if (isset($_POST['email'])) {
require_once("connect.php");
// Define $myusername and $mypassword
$email = protect($_POST['email']);
$password = protect($_POST['password']);
//$password = md5($password);

//echo $password;
$sql="SELECT * FROM em_users WHERE email='$email' AND password='$password' AND active = 1";
//echo $sql;
$result=mysql_query($sql) or die ('cannot insert data. '. 'Reason: ' . mysql_error());

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $email and $password, table row must be 1 row
if($count==1){
while($rows=mysql_fetch_assoc($result)) {
    $id= $rows['user_id'];
    $fullname = $rows['f_name']."  ".$rows['l_name'];
    $email= $rows['email'];
    $designation=$rows['designation'];
    $firstname = $row['f_name'];
    $lastname = $row['l_name'];
}
    $login = "UPDATE em_users SET last_login = '".$today."' WHERE user_id = $id";
    $lgin = mysql_query($login) or die ('cannot insert data. '. 'Reason: ' . mysql_error());
// Register $email, $password and redirect to file "index"

$_SESSION['email'] = $email;
$_SESSION['id'] = $id;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['fullname'] = $fullname;
$_SESSION['designation'] = $designation;

header("location: index.php");
}
else {
$_POST['userid']="";
$_POST['password']="";
 $warning =  "Wrong Username or Password";
}

}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Emmanuel Adeboje | Administrative Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/icons/emmanuel.png">
    <!-- All CSS files included -->
    <link rel="stylesheet" href="../css/elements.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <style type="text/css">
    .breadcrumb-section {
        background: rgba(0, 0, 0, 0) url(../img/bg/1.jpg) repeat scroll center center / cover;
        padding: 250px 0 150px;
    }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!--Loader-->
    <div class="loader">
        <div class="loader-area">
            <h1 class="circle-logo">Emmanuel.</h1>
        </div>
    </div>
    <!-- Loader end -->
    <!-- Main wrapper start -->
    <div class="wrapper">
        <!-- Header area start -->
        <?php include ('header.php'); ?>
        <!-- Header area end -->
        <!-- Breadcrumb area start -->
        <div class="breadcrumb-section" id="home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="breadcrumb-title-area">
                            <h3 class="breadcrumb-title">Administrative Login</h3>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="breadcrumb-menu">
                            <ul class="breadvrumb-list">
                                <li><a href="index.html">home</a></li>
                                <li>Admin Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-9">
                            <div class="blog-comment-section">
                                <h5 class="comment-title" style="color: #fff;margin-top: 30px;">Login to Dashboard</h5>
                                <div class="comment-form">
                                    <form action="" id="mike-comment-form" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="button">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-5">
                            <aside class="single-widget">
                                <h5 class="widget-title" style="color: #fff;margin-top: 30px;">Admin Only</h5>
                                <div class="tags">
                                    <a href="../">Go Back To Homepage</a>
                                </div>
                            </aside>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Breadcrumb area end -->
        <!-- Footer section start -->
        <?php include ('footer.php'); ?>
        <!-- Footer section end -->
    </div>
    <!-- Main wrapper end -->
    <!-- All JavaScript files included -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>