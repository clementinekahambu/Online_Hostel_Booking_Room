<?php 
include_once "backend/dbconnection.php";


if(isset($_POST['save']))
  {
    $name=$_POST['name'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $sex=$_POST['sex'];
    $permission="Client";
    $password=md5($_POST['password']);


    $Address=$_POST['Address'];


    function getRandomStr($n) { 
    $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomStr = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($str) - 1); 
        $randomStr .= $str[$index]; 
    } 
  
    return $randomStr; 
} 

$n=4; 
$a = getRandomStr($n); 



    $id_number=substr($name, 0,3).$a.rand(100,100000);

    $userimage=$_FILES["userimage"]["name"];
    move_uploaded_file($_FILES["userimage"]["tmp_name"],"avatars/".$_FILES["userimage"]["name"]);

    $sql="insert ignore into `tblusers`(`name`, `lastname`, `username`, `email`, `sex`, `permission`, `password`, `mobile`, `userimage`, `id_number`, `Address`,`status`) values('$name','$lastname','$username','$email','$sex','$permission','$password','$mobile','$userimage','$id_number','$Address',1)";

    $query=$dbh->prepare($sql);
    if ($query->execute()) {
      echo '<script>alert("Your account has been created, please, login to continue.")</script>';
      echo "<script>window.location.href ='signin.php'</script>";
    }else{
      echo '<script>alert("Error! Check your input data.")</script>';
    }
    
  }
 ?>

<div class="container bg-dark overflow-hidden rounded-1">
        <div class="bg-holder" style="">
        </div>

<form method="post" enctype="multipart/form-data">
        <div class="px-5 py-7 position-relative">
          <h1 class="text-center w-lg-75 mx-auto fs-lg-6 fs-md-4 fs-3 text-white">Create account to continue</h1>
          <div class="row justify-content-center mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <input class="form-control mb-3 border-light fs-1" type="file" placeholder="Your image" name="userimage" required />

              <input class="form-control mb-3 border-light fs-1" type="text" placeholder="Your name" name="name" required/>

              <input class="form-control mb-3 border-light fs-1" type="text" placeholder="Your lastname" name="lastname" required />

              <input class="form-control mb-3 border-light fs-1" type="text" placeholder="Your username" name="username" required />

              <select class="form-control mb-3 border-light fs-1" name="sex" required>
                <option>Choose your gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>

              <input class="form-control mb-3 border-light fs-1" type="email" placeholder="Your email" name="email" required />

              <input class="form-control mb-3 border-light fs-1" type="number" placeholder="Your contact" name="mobile" required />

              <input class="form-control mb-3 border-light fs-1" type="text" placeholder="Your Adress" name="Address"  required/>

              <input class="form-control mb-3 border-light fs-1" type="password" placeholder="Your password" name="password" required />
            </div>

            <div class="col-md-3"></div>
          </div>


          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-2 mt-lg-0">
              <button type="submit" name="save" class="btn btn-success text-white form-control fs-1">Create account</button>
            </div>
          </div>
          <div class="col-md-3"></div>

        </div>
        <div class="row">
          
          <div class="col-md-3"></div>
          <div class="col-md-6 text-center mt-0"><a href="signup.php" class="text-success" id="link" style="text-decoration:underline;">Don't have account? Sign Up.</a></div>

          </div>
</form>
            
        </div>
      </div>

      