<?php 
 session_start();
 include ("connect.php");
 include ("functions.php");
 if (!isset($_SESSION['email'])) header("Location:login.php");

 //if($_GET['edit']){
$sel = "SELECT * FROM em_users WHERE user_id =".$_SESSION['id'];
//echo $sel;
$rsqf = mysql_query($sel) or die("An error occurred. Reason: ".mysql_error());
//} 

 while($ShowMe = mysql_fetch_assoc($rsqf)){ 
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Emmanuel Adeboje | Administrative page</title>
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
                            <h3 class="breadcrumb-title">Welcome Admin</h3>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="breadcrumb-menu">
                            <ul class="breadvrumb-list">
                                <li>Administrative page</li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area end -->
        <!-- Page content area start -->
        <div class="content">
            <!-- theme blog post section start -->
            <div class="theme-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-5">
                            <aside class="single-widget">
                                <h4 class="widget-title"><?php echo $ShowMe["f_name"]; ?> <?php echo $ShowMe["l_name"]; ?></h4>
                                <div class="recent-post-widget">
                                    <div class="single-post-widget">
                                        <div class="post-widget-content">
                                            <h4><a href="#">Last Login.</a></h4>
                                            <p><?php echo $ShowMe["last_login"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="single-post-widget">
                                        <div class="post-widget-content">
                                            <h4><a href="#">Email.</a></h4>
                                            <p><?php echo $ShowMe["email"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="single-post-widget">
                                        <div class="post-widget-content">
                                            <h4><a href="#">Designation.</a></h4>
                                            <p><?php echo $ShowMe["designation"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <?php 
                        $feed = "SELECT * FROM em_feedback ORDER BY id DESC";
                        //echo $sel;
                        $feedr = mysql_query($feed) or die("An error occurred. Reason: ".mysql_error());
                        $count=mysql_num_rows($feedr);
                        ?>
                        <div class="col-md-9">
                            <div class="blog-comment-section">
                                <h4 class="comment-title">You have (<?php echo $count; ?>) Feedback(s)</h4>
                                <ul class="media-list">
                                    <?php while($ShowFeed = mysql_fetch_assoc($feedr)){ ?>
                                    <li class="media">
                                        <div class="media-content">
                                            <h5><a href="info.php?id=<?php echo $ShowFeed['id']?>&view=option"><?php echo $ShowFeed["name"]; ?></a></h5>
                                            <p>
                                                <span><?php echo $ShowFeed["date_submitted"]; ?></span> / <span><?php echo $ShowFeed["phone"]; ?></span> / <span><?php echo $ShowFeed["subject"]; ?></span>
                                            </p>
                                            <a href="#" class="reply-icon"><?php echo $ShowFeed["email"]; ?></a>
                                        </div>
                                    </li>
                                    <?php }
                                    if($count == 0){ ?>
                                    <li class="media">
                                        <div class="media-content">
                                            <h5><a href="#">Sorry, No Feedback yet.</a></h5>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- theme blog post section end -->
        </div>
        <!-- Page content area end -->
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
<?php } ?>