<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Kayode's Blog</title>

    <!-- Favicon -->
    <link rel="icon" href="/view/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/view/style.css">

</head>

<body>
    <!-- Preloader -->
    <!--<div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>-->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-area d-flex align-items-center">
                            <div class="news-title">
                                <p>Latest Blogs:</p>
                            </div>
                            <div id="breakingNewsTicker" class="ticker">
                            <ul>
                            <?php
                                                        include ("admin/dbconfig.php");
                                                            $query=mysqli_query($con,"SELECT * FROM blog order by 1 DESC LIMIT 0,1");
                                                            
                                                        while ($row = mysqli_fetch_array($query)){
                                                                $id = $row['blogId'];
                                                                $blogName = $row['blogName'];
                                                                $blogBody = $row['blogBody'];
                                                                $image = $row['image'];
                                                                $category = $row['blogCategory'];
                                                        
                                                        ?>
                               
                                    <li><a href="single-post.php?id=<?php echo $id ?>"><?php echo $blogName ?></a></li>
                                    
                                </ul>
                                                        <?php }?>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-12 col-md-6">
                    
                        <div class="top-meta-data d-flex align-items-center justify-content-end">
                        
                            <!-- Top Social Info -->
                        
                            <!-- Top Search Area -->
                            <?php
                        include 'admin/dbconfig.php'; 
                        if(!empty($_SESSION["name"])){

                           ?>
                            <div class="top-search-area">
                                <form  action="search.php" method="GET">
                                    <input type="text" name="q" placeholder="search">
                                    <button type="submit"  class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                                <?php }
                    else{         
        
                                    
                                    } ?>
                            </div>
                            
                            <!-- Login -->
                            <?php
                        include 'admin/dbconfig.php'; 
                        if(!empty($_SESSION["name"])){

                           ?>
                           
                            <a href="/view/logout.php" class="login-btn"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        
                        <?php }
                    else{         
                      echo'  <a href="/view/login.php" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
                        </div>';      
                        
                                    } ?>
                                        <?php 
                        if(!empty($_SESSION["name"])) { //if user is logged in display a welcome username else leave blank
                            echo 'welcome '. $_SESSION['name'] . ' ';
                        } else {
                            //require_once 'index.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="vizew-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">

                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="vizewNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="/view/img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    
                                   
                                   </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

