<?php
ob_start();
session_start();
require_once('inc/signtop.php');
if(isset($_POST['submit']))
{
$username=mysqli_real_escape_string($conn,strtolower($_POST['usern']));
$password=mysqli_real_escape_string($conn,$_POST['passing']);
$db_query="SELECT * FROM users WHERE username='$username'";
$query_con=mysqli_query($conn,$db_query);
if(mysqli_num_rows($query_con)>0)
{
  $val=mysqli_fetch_array($query_con);
  $user=strtolower($val['username']);
  $pas=$val['password'];
  $role=$val['role'];
  $userimage=$val['image'];
  $passwordnew=crypt($password,$pas);



if($user==$username and $pas==$passwordnew)
{
  header("location:index.php");
  $_SESSION['username']=$user;
  $_SESSION['role']=$role;


}
else
{
  $error="Wrong Username or password";

}
}
else
{
$error="Wrong Username or password";
}

}
?>




  </head>
  <body >


<section class="login-block" style="max-height:400px;padding-left:30px;padding-right:30px;background:linear-gradient(to right,#ef5343,#e83668);">


      <div style="margin-left:auto;margin-right:auto;background:rgba(128,128,128,0.0);padding:10px;max-width:339px;" class='container'>
      <center><h1 style='color:white;font-family:cursive;'>top<span style='color:blue;'>Explore!</span>
</h1>

      </center>
  </div>






    <div class="container  animated shake" style="margin-top:70px;margin-bottom:40px;max-width:420px;">
		<div class="col-12 login-sec" id="first" style="padding-top:30px;margin:0px;">
		    <h2 class="text-center">LOGIN</h2>
		    <form class="login-form" action="" method="POST">
  <div class="form-group" style='margin-top:10px;'>
    <input type="text" placeholder='Username'  name="usern" required class="form-control" placeholder=""
value="


"
       style="

    -webkit-box-shadow: inset 0px 0px 24px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: inset 0px 0px 24px 0px rgba(0,0,0,0.75);
    box-shadow: inset 0px 0px 24px 0px rgba(0,0,0,0.75);width:100%;
    ;color:black;text-decoration:none;

    " >

  </div>
  <div class="form-group">
    <input type="password" required name="passing" class="form-control" placeholder="Password"

style="-webkit-box-shadow: inset 0px 0px 24px 0px rgba(0,0,0,0.75);
-moz-box-shadow: inset 0px 0px 24px 0px rgba(0,0,0,0.75);
box-shadow: inset 0px 0px 24px 0px rgba(0,0,0,0.75);width:100%;
;"

value="
"  >
<?php
if(isset($error))
{
echo "<small style='color:red;'>$error</small>";
}

?>
  </div>


    <div class="form-group" style="margin-top:12px;">

    <input type="submit" value='Submit' name="submit" class="btn btn-login btn-lg " style="width:100%;margin-top:17px;


    -webkit-box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.3);
    -moz-box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.3);
    box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.3);
    ;



    ">
  </div>

</form>







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>






  </body>
</html>
