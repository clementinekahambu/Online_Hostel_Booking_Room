

<div class="container">


          <p class="text-center fs-1">Services</p>

          <div class="row">

            <?php 
                      $query=mysqli_query($con,"select * from services order by id desc");
                      $n=1;
                      while($row=mysqli_fetch_array($query))
                      {
                        ?>
            <div class="col-md-4 mb-5 text-center text-md-start"><img class="" style="width:100%; height: 250px;" src="images/<?php echo htmlentities($row['service_image']); ?>" alt="" />
              <h4 class="mt-3 my-1 fw-bold"><?php echo htmlentities($row['service_name']); ?></h4>
              <p class="fs-1 mb-0"><?php echo htmlentities($row['service_details']); ?></p>

              <a class="btn btn-dark mt-2" href="#" style="border-radius:50px;">Explore more...<i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>

            <?php
            $n++; 
          }
          ?>


          </div>
        </div>