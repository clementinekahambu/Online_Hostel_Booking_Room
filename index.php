<?php
session_start();
error_reporting(0);
include("backend/dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php require_once("headers/head.php"); ?>
    <style>
      .bg-opacity{
    position: relative;
    background-color: #000;
}

.bg-opacity::before{
    content: ' ';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    opacity: 0.5;
    background:       url("public/assets/img/hero/pexels-quang-nguyen-vinh-14024947.jpg") no-repeat center center;
    background-size: cover;
}
    </style>
  </head>


  <body>

    <main class="main" id="top">
      <!-- Nav menu -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <?php 
                if(strlen($_SESSION['sid']==0)) {
                  // code...
                  require_once("headers/nav_menu.php");
                  }
                  else{
                    require_once("headers/nav_menu_connected.php");
                  } ?>

      </nav>


      <div class="bg-opacity">

        <section>
          <?php include("pages/intro.php"); ?>
        </section>


      </div>
      <section>

        <?php include("pages/catalog.php"); ?>
        <!-- end of .container-->

      </section>

      <section>

        <?php include("pages/catalog_rooms.php"); ?>
        <!-- end of .container-->

      </section>


      <section>
        <?php include("pages/services.php"); ?>
      </section>


      <section>
        <?php include("pages/service_1.php"); ?>
      </section>
      


      <section class="pt-8 pt-lg-0">
        <?php include("pages/service_2.php"); ?>
      </section>
     


      <section class="bg-dark pt-6">
        <?php include("pages/testimonies.php"); ?>
      </section>
     


      
      <section class="pb-0">

        
        <!-- end of .container-->

      </section>


    </main>
   






   <!-- ---------------------------------------------------------------------------------------------------------- -->
    <section>
      <?php include("pages/newsletter.php"); ?>
    </section>

 
    <section class="pt-0">

      <?php include("footers/footer.php"); ?>

    </section>
  
    <?php include("footers/scripts.php"); ?>

  </body>

</html>