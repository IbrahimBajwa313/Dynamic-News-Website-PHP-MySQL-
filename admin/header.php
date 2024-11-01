<?php
session_start(); 
include "config.php";

if (!isset($_SESSION['username'])){
    header("location: http://localhost/news-website/admin/");
}
?>  


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <?php   
                        $sql_logo = "SELECT logo FROM settings";
                        $result_logo = mysqli_query($conn,$sql_logo) or die("Logo Query Failed");
                        $row_logo = mysqli_fetch_assoc($result_logo);
                    ?>
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="images/<?php echo $row_logo['logo'] ; ?>"></a>
                    </div>
                    <!-- /LOGO -->

                     
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-3">
                        <a class="admin-logout" style="margin-right: 7px;">Hi <?php echo $_SESSION['username'] ; ?><br></a>
                        <a href="logout.php" class="admin-logout" > logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>

                            <?php
                            if( $_SESSION['user_role'] == 1){ ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>

                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
