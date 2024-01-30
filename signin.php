<?php
session_start();
error_reporting(0);

include "backend/dbconnection.php";


if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $useremail=$_POST['useremail'];
  $password=md5($_POST['password']);
  $sql ="SELECT * FROM tblusers WHERE username=:username and Password=:password and Email=:useremail";
$query=$dbh->prepare($sql);
  $query-> bindParam(':username', $username, PDO::PARAM_STR);
  $query-> bindParam(':password', $password, PDO::PARAM_STR);
  $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);

       
    
  if($query->rowCount() > 0)
  {
    foreach ($results as $result) {
      $_SESSION['sid']=$result->id;
      $_SESSION['name']=$result->name;
      $_SESSION['lastname']=$result->lastname;
      $_SESSION['permission']=$result->permission;
      $_SESSION['email']=$result->email;
      $_SESSION['userimage']=$result->userimage;

    }

    if(!empty($_POST["remember"])) {
      //COOKIES for username
      setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
      //COOKIES for password
      setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
    } else {
      if(isset($_COOKIE["user_login"])) {
        setcookie ("user_login","");
        if(isset($_COOKIE["userpassword"])) {
          setcookie ("userpassword","");
        }
      }
    }
    $aa= $_SESSION['sid'];
    $sql="SELECT * from tblusers  where id=:aa";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':aa',$aa,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      {

        if($row->status=="1" and $row->permission=="Super Admin"){
          $extra="dashboard.php";
          $username=$_POST['username'];
          $email=$_SESSION['email'];
          $name=$_SESSION['name'];
          $lastname=$_SESSION['lastname'];
          $_SESSION['login']=$_POST['username'];
          $_SESSION['id']=$num['id'];
          $_SESSION['username']=$num['name'];
          $uip=$_SERVER['REMOTE_ADDR'];
          $status=1;


        // ----------------------------------------------------------------------------------------

        

        // ------------------------------------------------------------------------------------------


          $date= date('Y-m-d H:i:s');
          $loginTime = date('d-m-Y H:i:s', strtotime($date. ' + 2 hours'));

          $sql="insert ignore into userlog(userEmail,userip,status,username,name,lastname,loginTime)values(:email,:uip,:status,:username,:name,:lastname,:loginTime)";
          $query=$dbh->prepare($sql);
          $query->bindParam(':username',$username,PDO::PARAM_STR);
          $query->bindParam(':name',$name,PDO::PARAM_STR);
          $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
          $query->bindParam(':email',$email,PDO::PARAM_STR);
          $query->bindParam(':uip',$uip,PDO::PARAM_STR);
          $query->bindParam(':status',$status,PDO::PARAM_STR);
          $query->bindParam(':loginTime',$loginTime,PDO::PARAM_STR);
          $query->execute();
          $host=$_SERVER['HTTP_HOST'];
          $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
          header("location:dashboard.php");
          exit();
        }
      

         else {
           $extra="connected_index.php";
          $username=$_POST['username'];
          $email=$_SESSION['email'];
          $name=$_SESSION['name'];
          $lastname=$_SESSION['lastname'];
          $_SESSION['login']=$_POST['username'];
          $_SESSION['id']=$num['id'];
          $_SESSION['username']=$num['name'];
          $uip=$_SERVER['REMOTE_ADDR'];
          $status=1;


        // ----------------------------------------------------------------------------------------

        

        // ------------------------------------------------------------------------------------------


          $date= date('Y-m-d H:i:s');
          $loginTime = date('d-m-Y H:i:s', strtotime($date. ' + 2 hours'));

          $sql="insert ignore into userlog(userEmail,userip,status,username,name,lastname,loginTime)values(:email,:uip,:status,:username,:name,:lastname,:loginTime)";
          $query=$dbh->prepare($sql);
          $query->bindParam(':username',$username,PDO::PARAM_STR);
          $query->bindParam(':name',$name,PDO::PARAM_STR);
          $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
          $query->bindParam(':email',$email,PDO::PARAM_STR);
          $query->bindParam(':uip',$uip,PDO::PARAM_STR);
          $query->bindParam(':status',$status,PDO::PARAM_STR);
          $query->bindParam(':loginTime',$loginTime,PDO::PARAM_STR);
          $query->execute();
          $host=$_SERVER['HTTP_HOST'];
          $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
          header("location:connected_index.php");
          exit();
        }

      } }
    } else{
      $extra="signin.php";
      $username=$_POST['username'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=0;
      $email='No registered user';
      $name='Intruision';
      $date= date('Y-m-d H:i:s');
      $loginTime = date('d-m-Y H:i:s', strtotime($date. ' + 2 hours'));
      $sql="insert into userlog(userEmail,userip,status,username,name,loginTime)values(:email,:uip,:status,:username,:name,:loginTime)";
      $query=$dbh->prepare($sql);
      $query->bindParam(':username',$username,PDO::PARAM_STR);
      $query->bindParam(':name',$name,PDO::PARAM_STR);
      $query->bindParam(':email',$email,PDO::PARAM_STR);
      $query->bindParam(':uip',$uip,PDO::PARAM_STR);
      $query->bindParam(':status',$status,PDO::PARAM_STR);
      $query->bindParam(':loginTime',$loginTime,PDO::PARAM_STR);
      $query->execute();
      $host  = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      echo "<script>alert('Your credentials are wrong, please, create account');document.location ='signin.php';</script>";
    }
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

    <main class="main bg-dark" id="top">
      <!-- Nav menu -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <?php require_once("headers/nav_menu.php"); ?>
      </nav>



    </main>
   






   <!-- ---------------------------------------------------------------------------------------------------------- -->
    <section>
      
<div class="container bg-dark overflow-hidden rounded-1">
        <div class="bg-holder" style="">
        </div>

<form method="post" enctype="multipart/form-data">
        <div class="px-5 py-7 position-relative">
          <h1 class="text-center w-lg-75 mx-auto fs-lg-6 fs-md-4 fs-3 text-white">Sign In to continue</h1>
          <div class="row justify-content-center mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">

              <input class="form-control mb-3 border-light fs-1" type="text" placeholder="Your username" name="username" />

              <input class="form-control mb-3 border-light fs-1" type="email" placeholder="Your email" name="useremail" />

              <input class="form-control mb-3 border-light fs-1" type="password" placeholder="Your password" name="password" />
            </div>

            <div class="col-md-3"></div>
          </div>


          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-2 mt-lg-0">
              <button type="submit" name="login" class="btn btn-success text-white form-control fs-1">Sign In</button>
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


    </section>


  
    <?php include("footers/scripts.php"); ?>

  </body>

</html>