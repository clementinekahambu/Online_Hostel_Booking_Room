<div class="container"><a class="navbar-brand" href="dashboard.php"><img src="assets/img/Logo.png" alt="" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars text-white fs-3"></i></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="services.php">Services</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="catalogue.php">Catalogue</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="bookings.php">Booking</a></li>

              <li class="nav-item"><a class="nav-link" aria-current="page" href="#"><?php echo $_SESSION['email']; ?> <img src="avatars/<?php echo $_SESSION['userimage']; ?>" style="width: 30px;height:30px;border-radius: 50%;"></a></li>
              <li class="nav-item mt-2 mt-lg-0"><a class="nav-link btn btn-outline-success w-md-25 w-50 w-lg-100" aria-current="page" href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>