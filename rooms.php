<?php
session_start();
error_reporting(0);
include('backend/dbconnection.php');

if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} else{

if (isset($_POST['save'])) {
  // code...
  $room_number = $_POST['room_number'];
  $room_details = $_POST['room_details'];
  $room_price = $_POST['room_price'];
  $room_image=$_FILES["room_image"]["name"];
  move_uploaded_file($_FILES["room_image"]["tmp_name"],"images/".$_FILES["room_image"]["name"]);


  $sql="insert ignore into `rooms`(`room_number`, `room_image`, `room_details`, `room_price`) values ('$room_number','$room_image','$room_details', '$room_price')";

    $query=$dbh->prepare($sql);
    if ($query->execute()) {
      echo '<script>alert("A room has been created")</script>';
      echo "<script>window.location.href ='rooms.php'</script>";
    }else{
      echo '<script>alert("Error! Check your input data.")</script>';
    }
}


// delete service
if(isset($_GET['delete']))
  {
    mysqli_query($con,"delete from `rooms` where id = '".$_GET['delete']."'");
    echo "<script>alert('Room has been deleted.');</script>"; 
    echo "<script>window.location.href = 'rooms.php'</script>"; 
  }

// check out
if(isset($_GET['check_out']))
  {
    mysqli_query($con,"update `rooms` set room_status=0 where id = '".$_GET['check_out']."'");
    echo "<script>alert('Room has been Checked out.');</script>"; 
    echo "<script>window.location.href = 'rooms.php'</script>"; 
  }

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


  <body class="bg-dark">

    <main class="main" id="top">
      <!-- Nav menu -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <?php require_once("headers/nav_menu_admin.php"); ?>
      </nav>


      <div class="bg-dark">

        <section>
          <div class="container bg-dark" >
            <div class="row align-items-center py-lg-8 py-4 px-3">
              <div class="col-md-12 text-center text-lg-start">
                <h1 class="text-white fs-5 fs-xl-6 fw-bolder">Rooms</h1>
              </div>


                

                  <div class="row">
                    

                    <div class="col-md-12 mb-3">
                      <div class="row">
                        

                        <div class="col-md-2 mb-2" style="height:auto;">
                          <a href="bookings.php"><button class="btn btn-outline-success form-control text-white" > Bookings</button></a>
                          
                        </div>
                      </div>
                    </div>
                    <hr>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Add room</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="text" name="room_number" placeholder="Room number" class="form-control mb-2">
          <input type="number" name="room_price" placeholder="Room price (USD)" class="form-control mb-2">
          <textarea name="room_details" class="form-control mb-2" id="exampleFormControlTextarea1" rows="3" style="border-radius:10px;" placeholder="Type room's details..."></textarea>
          <input type="file" name="room_image" placeholder="Room image" title="choose an image for the room" class="form-control mb-2">
      </div>
      <div class="modal-footer">
        <button type="submit" name="save" class="btn btn-dark text-white">Save</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6" style="height:auto;">
                          <input type="search" name="" class="form-control" placeholder="Search..." id="myInput">
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="row" style="padding: 10px;">
                        <div class="card col-md-12 table-scroll" style="height:auto;">
                          
                          <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Room Image</th>
      <th scope="col">Room Number</th>
      <th scope="col">Room Details</th>
      <th scope="col">Room Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php 
                      $query=mysqli_query($con,"select * from rooms order by id desc");
                      $n=1;
                      while($row=mysqli_fetch_array($query))
                      {
                        if ($row['room_status']==1) {
                          // code...
                          ?>

                          <tr style="background-color:pink;">
      <th scope="row"><?php echo htmlentities($n); ?></th>
      <td><img src="images/<?php echo htmlentities($row['room_image']); ?>" style="max-width: 150px;border-radius: 5px;"></td>
      <td style="text-decoration: line-through;color: orangered;" class="text-uppercase"><?php echo htmlentities($row['room_number']); ?></td>
      <td><?php echo htmlentities($row['room_details']); ?></td>
      <td><?php echo htmlentities($row['room_price']); ?></td>
      <td>
        <a href="rooms.php?check_out=<?php echo htmlentities($row['id']); ?>" style="">
          <button class="btn btn-outline-primary btn-sm text-white mb-2"><i class="fas fa-external-link"></i> Check out</button>
        </a>


        <a href="" style="display:none;">
          <button class="btn btn-outline-success btn-sm text-white mb-2"><i class="fas fa-edit"></i></button>
        </a>

        <a href="rooms.php?delete=<?php echo htmlentities($row['id']); ?>" style="display:none;">
          <button class="btn btn-outline-danger btn-sm text-white mb-2"><i class="fas fa-trash"></i></button>
        </a>
      </td>

    </tr>
                          <?php
                        }
                        else{
                          ?>
                          <tr>
      <th scope="row"><?php echo htmlentities($n); ?></th>
      <td><img src="images/<?php echo htmlentities($row['room_image']); ?>" style="max-width: 150px;border-radius: 5px;"></td>
      <td class="text-uppercase"><?php echo htmlentities($row['room_number']); ?></td>
      <td><?php echo htmlentities($row['room_details']); ?></td>
      <td><?php echo htmlentities($row['room_price']); ?></td>
      <td>
        <a href="">
          <button class="btn btn-outline-success btn-sm text-white mb-2"><i class="fas fa-edit"></i></button>
        </a>

        <a href="rooms.php?delete=<?php echo htmlentities($row['id']); ?>">
          <button class="btn btn-outline-danger btn-sm text-white mb-2"><i class="fas fa-trash"></i></button>
        </a>
      </td>

    </tr>
                          <?php
                        }
                        ?>
    
    <?php 
    $n++;
  }
  ?>
    
  </tbody>
</table>
                        </div>
                      </div>
                    </div>




                  </div>


</div>

              </div>
            </div>


            
          </div>
        </section>


      </div>
      


    </main>
   

  
    <?php include("footers/scripts.php"); ?>

  </body>

</html>

<?php 
}
?>