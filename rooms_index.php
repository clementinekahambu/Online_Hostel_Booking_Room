<?php
session_start();
error_reporting(0);
include_once "backend/dbconnection.php";
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
    background: url("public/assets/img/hero/pexels-quang-nguyen-vinh-14024947.jpg") no-repeat center center;
    background-size: cover;
}
    </style>
  </head>


  <body class="bg-dark">

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

        

      </div>
      <section>

        <?php 



if (isset($_POST['book'])) {
  // code...
  

  $client=$_POST['client'];
  $room=$_POST['room'];
  $nb_days=$_POST['delay'];
  $starting_date=$_POST['starting'];

    $sql="insert ignore into `booking`(`user`, `room`, `starting_date`,`nb_days`) values ('$client','$room','$starting_date', '$nb_days')";

    $query=$dbh->prepare($sql);
    if ($query->execute()) {
      echo '<script>alert("A room has been booked")</script>';
      mysqli_query($con,"update `rooms` set room_status=1 where id = '".$_POST['room']."'");
      echo "<script>window.location.href ='rooms_index.php'</script>";
    }else{
      echo '<script>alert("Error! Check your input data.")</script>';
    }


}

?>

<div class="container" id="">
 
  <div class="row">

    <?php 
                      $query=mysqli_query($con,"select * from rooms where room_status=0 order by id desc");
                      $n=1;


                      while($row=mysqli_fetch_array($query))
                      {
                        
                        
                          ?>
    <div class="col-md-6">
      <div class="row" style="padding:5px;">
        <div class="col-md-12 mb-2">
          <img src="images/<?php echo $row['room_image']; ?>" class="d-block w-100" alt="..." style="border-radius:5px;height: 300px;">
<form method="post" enctype="multipart/form-data">
          <table class="table">
            <tr>
              <th style="">
                <span class="text-white text-uppercase"><?php echo $row['room_number']; ?></span>
              </th>
              <th >
                <span class="text-white">Delay</span>
              </th>
              <th>
                <span class="text-white">Starting date</span>
              </th>
            </tr>
            <tr>
              <td>
                <span class="text-white"><?php echo ucfirst($row['room_details']); ?></span>
              </td>
              <td>
                <input type="number" class="form-control" name="delay" placeholder="Delay" style="height:40px;border-radius: 5px;" required>
              </td>
              <td>
                <input type="date" class="form-control" name="starting" placeholder="Starting" title="starting date" style="height:40px;border-radius: 5px;" required>
              </td>
              <?php 
                if(strlen($_SESSION['sid']!=0)) {
                  // code...
                  ?>
              <td style="display:none;">
                <input type="text" class="form-control" placeholder="Starting" title="starting date" style="height:40px;border-radius: 5px;" name="room" value="<?php echo $row['id']; ?>"> 

                <input type="text" class="form-control" placeholder="Starting" title="starting date" style="height:40px;border-radius: 5px;" name="client" value="<?php echo $_SESSION['sid']; ?>"> 
              </td>
            <?php } ?>
            </tr>
            <tr>
              <th colspan="4">
                <center>
                  <span class="text-center text-danger" style="font-size:30px;text-align: center;"><?php echo htmlentities($row['room_price'])." $"; ?></span>
                </center>
              </th>
            </tr>
            <tr>

              <td colspan="4">
                <?php 
                if(strlen($_SESSION['sid']==0)) {
                  // code...
                  ?>
                  <a href="signin.php">
                  <button type="button" class="btn btn-outline-success form-control text-white">
                    <i class="fas fa-tag"></i> Book room
                  </button>
                </a>
                  <?php
                }
                else{
                  ?>
                  <button type="submit" name="book" class="btn btn-outline-success form-control text-white">
                    <i class="fas fa-tag"></i> Book room
                  </button>
                  <?php
                }
                ?>
                
              </td>
              
            </tr>
          </table>
        </form>
          
        </div>
      </div>
    </div>
    
                           

   

    <?php $n++; } ?>
    
    
 
          
        </div>
        <!-- end of .container-->

      </section>




    </main>
   
  
    <?php include("footers/scripts.php"); ?>

  </body>

</html>