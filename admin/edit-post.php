<?php 

session_start();
if(!isset($_SESSION['username']))
{

  header("Location:signin.php");

  
}  
else if(isset($_SESSION['username']) && $_SESSION['role']==='Author')
{

  header("Location:index.php");

  
}  



require_once('inc/top.php'); ?>



  </head>
  <body >

    <?php require_once('inc/nav.php'); ?>



    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">

    <?php require_once('inc/sidebar.php'); ?>

</div>
<div class="col-lg-9 col-md-12 col-sm-12" style="width:auto;">
  <i class="fa fa-2x fa-user-plus" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Add User <small style="color:#495057;opacity:0.9;">Add All Users</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-user-plus" aria-hidden="true">&nbsp;Add User</i></li>

</ol>



<div class='user' style='margin-bottom:40px;'>
<div class='row'>
<div class='col-md-8'>
  
<?php             
if(isset($_POST['submit-btn']))
{  
 
 $add_first_name=mysqli_real_escape_string($conn,$_POST['fname']);
 $add_last_name=mysqli_real_escape_string($conn,$_POST['lname']);
 $add_bio=mysqli_real_escape_string($conn,$_POST['bio']);
 $add_email=mysqli_real_escape_string($conn,strtolower($_POST['email']));
 $add_user_name=mysqli_real_escape_string($conn,strtolower($_POST['uname']));
 $trim_user=preg_replace('/\s+/','',$add_user_name);
 $add_pass=mysqli_real_escape_string($conn,$_POST['pass']);
 $pass_query="SELECT * FROM users ORDER BY id DESC LIMIT 1";
 $pass_con=mysqli_query($conn,$pass_query);
 $pass_fetch=mysqli_fetch_array($pass_con);
 $pass_crypt=$pass_fetch['salt'];
 $password=crypt($add_pass,$pass_crypt);
 $add_role=$_POST['role'];
 $add_date=time();
 $add_image=$_FILES['profile_img']['name'];
 $add_tmp_image=$_FILES['profile_img']['tmp_name'];
 $check_query="SELECT * FROM users WHERE username='$add_user_name' OR mail='$add_email'";
 $check_con=mysqli_query($conn,$check_query);
 
  if(empty( $add_first_name) or empty( $add_last_name) or empty( $add_email) or  empty( $add_user_name) or empty( $add_pass) or empty( $add_role) or
  empty( $add_image) or empty($add_bio))
  {
    $error_msg="All (*) fields are required";
  }  
  else if($add_user_name!=$trim_user)
  {
    $error_msg="Spaces are not allowed in Username";  
  }  
  else if(mysqli_num_rows($check_con)>0)
  {
    $error_msg="Username or email already exists";
  }
  else{
    $add_query="INSERT INTO USERS(date,first_name,last_name,username,mail,image,password,role,details) VALUES('$add_date','$add_first_name','$add_last_name','$add_user_name','$add_email','$add_image','$password','$add_role','$add_bio')";
     $add_conn=mysqli_query($conn,$add_query);
    if($add_conn)
    {
      
      $add_first_name="";
      $add_last_name="";
      $add_email="";
      $add_user_name="";



       $path="images/$add_image";
       move_uploaded_file($add_tmp_image,"$path");
       copy($path,"../$path");
       $image_query="SELECT * from users ORDER BY id DESC LIMIT 1";
       $image_query_con=mysqli_query($conn,$image_query);
       $image_sel=mysqli_fetch_array($image_query_con);
       $fetch_image=$image_sel['image'];  
    $sucess_msg="User is added successfully";
  }
  else{
    $error_msg="something went wrong";

  }
  }
}
?>  
<form action='' method='POST' style='margin-bottom:40px;font-weight:bold;' enctype='multipart/form-data'>
  <div class='form-group'>
  <label for='fname' >Full Name:*</label>
  <?php
  if(isset($error_msg))
  {
  echo "<span class='pull-right' style='color:red'>".$error_msg."</span>";  
  }  
  else if(isset($sucess_msg))
  {
    echo "<span class='pull-right' style='color:green'>".$sucess_msg."</span>";  
  }  
  ?>
  <input type='text' name='fname' id='fname' class='form-control' placeholder='First Name' value="<?php if(isset($add_first_name)){echo $add_first_name;} ?>" >
  </div>
  <div class='form-group'>
  <label for='lname' >Last Name:*</label>
  <input type='text' name='lname' id='lname' class='form-control'  placeholder='Last Name' value="<?php if(isset($add_last_name)){echo $add_last_name;} ?>"  >
  </div>
  <div class='form-group'>
  <label for='uname' >Username:*</label>
  <input type='text' name='uname' id='uname' class='form-control'  placeholder='Username' value="<?php if(isset($add_user_name)){echo $add_user_name;} ?>" >
  </div>
  <div class='form-group'>
  <label for='email' >E-mail:*</label>
  <input type='text' name='email' id='email' class='form-control'    placeholder='Email' value="<?php if(isset($add_email)){echo $add_email;} ?>" >
  </div>
  <div class='form-group'>
  <label for='pass' >Password:*</label>
  <input type='password' name='pass' id='pass' class='form-control'      placeholder='Password'  >
  </div>
  <div class='form-group'>
  <label for='role' >Role:*</label>
  <select name='role' id='role' class='form-control'>
  <option>Author</option>
  <option>Admin</option>
  </select>
  </div>
  <div class='form-group'>
  <label for='profile-img' >Profile Picture:*</label><br>
  <input type='file' name='profile_img' id='profile_img'>
</div>
<div class='form-group'>
<label for='bio' >Bio:*</label><br>
<textarea name='bio' class='form-control' rows='8' placeholder='Enter your bio...'></textarea>
</div>
  <input type='submit' value='add user' class='btn btn-primary' name='submit-btn'>

</form>
</div>
<div class='col-md-4' style='padding-left:50px;padding-right:50px;'>
  <?php

if(isset($fetch_image))
{
  echo "<img src='images/$fetch_image' alt='user' style='width:100%;border:4px groove grey;'></img>";
}
  ?>
</div>
</div>
</div>

</div>

</div>
</div>


</div>



<?php  require_once('inc/footer.php');  ?>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
