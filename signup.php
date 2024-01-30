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


  <body class="bg-dark">

    <main class="main bg-dark" id="top">
      <!-- Nav menu -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <?php require_once("headers/nav_menu.php"); ?>
      </nav>



    </main>
   






   <!-- ---------------------------------------------------------------------------------------------------------- -->
    <section>
      <?php include("pages/signup.php"); ?>
    </section>

 
  
    <?php include("footers/scripts.php"); ?>

  </body>

</html>