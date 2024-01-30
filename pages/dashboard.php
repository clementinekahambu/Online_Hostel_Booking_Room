<?php include "backend/dbconnection.php"; ?>

<div class="container bg-dark" >
            <div class="row align-items-center py-lg-8 py-4 px-3">
              <div class="col-md-12 text-center text-lg-start">
                <h1 class="text-white fs-5 fs-xl-6 fw-bolder">Dashboard</h1>
              </div>


                

                  <div class="row">
                    <div class="col-md-3">
                      <div class="row" style="padding: 10px;">
                        <div class="card col-md-12" style="height:auto;background-image: linear-gradient(to right, dodgerblue , red);border: 0;">
                          <?php 
                          $query1=mysqli_query($con,"Select * from booking where 1");
                          $total_1=mysqli_num_rows($query1);
                        ?>
                          <h2 class="text-white text-center fw-bolder">Bookings</h2>
                          <hr>
                          <h2 class="text-white text-center fw-bolder"><?php echo $total_1; ?></h2>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="row" style="padding: 10px;">
                        <div class="card col-md-12 bg-danger" style="height:auto;background-image: linear-gradient(to right, dodgerblue , red);border: 0;">
                          <?php 
                          $query2=mysqli_query($con,"Select * from services where 1");
                          $total_2=mysqli_num_rows($query2);
                        ?>
                          <h2 class="text-white text-center fw-bolder">Services</h2>
                          <hr>
                          <h2 class="text-white text-center fw-bolder"><?php echo $total_2; ?></h2>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="row" style="padding: 10px;">
                        <div class="card col-md-12 bg-danger" style="height:auto;background-image: linear-gradient(to right, dodgerblue , red);border: 0;">
                          <?php 
                          $query3=mysqli_query($con,"Select * from rooms where 1");
                          $total_3=mysqli_num_rows($query3);
                        ?>
                          <h2 class="text-white text-center fw-bolder">Rooms</h2>
                          <hr>
                          <h2 class="text-white text-center fw-bolder"><?php echo $total_3; ?></h2>
                        </div>
                      </div>
                    </div>

                   

                    <div class="col-md-3">
                      <div class="row" style="padding: 10px;">
                        <div class="card col-md-12 bg-danger" style="height:auto;background-image: linear-gradient(to right, dodgerblue , red);border: 0;">
                          <?php 
                          $query4=mysqli_query($con,"Select * from tblusers where permission LIKE '%Client%'");
                          $total_4=mysqli_num_rows($query1);
                        ?>
                          <h2 class="text-white text-center fw-bolder">Clients</h2>
                          <hr>
                          <h2 class="text-white text-center fw-bolder"><?php echo $total_4; ?></h2>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="row">
                        <div class="card col-md-12" style="height:auto;">
                          <h1 class="text-white fs-5 fs-xl-4 fw-bolder">Recent Bookings</h1>
                          <hr>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="row">
                        <div class="card col-md-6" style="height:auto;">
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
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Room</th>
      <th scope="col">Nb. days</th>
      <th scope="col">Starting date</th>
      <th scope="col">Booking date</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php 
                      $query=mysqli_query($con,"select booking.*, tblusers.*, rooms.* from booking, tblusers, rooms where tblusers.id=booking.user and rooms.id=booking.room order by booking.saved_at desc LIMIT 50");
                      $n=1;
                      while($row=mysqli_fetch_array($query))
                      {
                        
                          ?>

                          <?php 

      if ($row['room_status']==0) {
        // code...
        ?>
        <tr style="border:solid red 2px;">

      <th scope="row"><?php echo htmlentities($n); ?></th>
      <td><?php echo htmlentities($row['name']); ?></td>
      <td><?php echo htmlentities($row['lastname']); ?></td>
      <td><?php echo htmlentities($row['email']); ?></td>
      <td><?php echo htmlentities($row['room_number']); ?></td>
      <td><?php echo htmlentities($row['nb_days']); ?></td>
      <td><?php echo htmlentities($row['starting_date']); ?></td>
      <td><?php echo htmlentities($row['saved_at']); ?></td>
    </tr>
        <?php
      }
      else{
        ?>
        <tr>

      <th scope="row"><?php echo htmlentities($n); ?></th>
      <td><?php echo htmlentities($row['name']); ?></td>
      <td><?php echo htmlentities($row['lastname']); ?></td>
      <td><?php echo htmlentities($row['email']); ?></td>
      <td><?php echo htmlentities($row['room_number']); ?></td>
      <td><?php echo htmlentities($row['nb_days']); ?></td>
      <td><?php echo htmlentities($row['starting_date']); ?></td>
      <td><?php echo htmlentities($row['saved_at']); ?></td>
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