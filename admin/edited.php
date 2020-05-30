<?php
session_start();
ob_start();

 require_once('inc/top.php');


 if(!isset($_SESSION['username']))
 {
 
   header("Location:signin.php");
 
   
 }  
 else if(isset($_SESSION['username']) && $_SESSION['role']==='Author')
 {
 
   header("Location:index.php");
 
   
 }  

 if(isset($_GET['edit'])){
   $edit_id=$_GET['edit'];
   $give_query="SELECT * FROM users WHERE id=$edit_id";
   $rt=mysqli_query($conn,$give_query);
   if(mysqli_num_rows($rt)>0)
   {

     $getv=mysqli_fetch_array($rt);
     $fname=$getv['first_name'];
     $lname=$getv['last_name'];
     $fname=$getv['first_name'];
     $uimage=$getv['image'];
     $urole=$getv['role'];
     $uid=$getv['id'];
     $udetails=$getv['details'];
   }

   else {
     header('location:index.php');
   }

 }
 else {
   header('location:index.php');
 }







  ?>



  </head>
  <body >

    <?php require_once('inc/nav.php'); ?>



    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">

    <?php require_once('inc/sidebar.php'); ?>

</div>
<div class="col-lg-9 col-md-12 col-sm-12" style="width:auto;">
  <i class="fa fa-2x fa-pencil-square-o" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Update User <small style="color:#495057;opacity:0.9;">Update All Users</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;Update User</i></li>

</ol>



<div class='user' style='margin-bottom:40px;'>
<div class='row'>
<div class='col-md-8'>

    <?php


if(isset($_POST['submit-btn']))
{

 $add_first_name=mysqli_real_escape_string($conn,$_POST['fname']);
 $add_last_name=mysqli_real_escape_string($conn,$_POST['lname']);
 $details=mysqli_real_escape_string($conn,$_POST['details']);
 $add_pass=mysqli_real_escape_string($conn,$_POST['pass']);
 $add_role=$_POST['role'];
 $add_image=$_FILES['profile_img']['name'];
 $add_tmp_image=$_FILES['profile_img']['tmp_name'];
 if(empty($add_image))
 {
 $add_image= $uimage;
 }

 $pass_query="SELECT * FROM users ORDER BY id DESC LIMIT 1";
 $pass_con=mysqli_query($conn,$pass_query);
 $pass_fetch=mysqli_fetch_array($pass_con);
 $pass_crypt=$pass_fetch['salt'];
 $password_new=crypt($add_pass,$pass_crypt);

  if(empty($add_first_name) or empty($add_last_name) )
  {
    $error_msg="All (*) fields are required";
  }

  else{
      $update_query="UPDATE `users` SET `first_name` = '$add_first_name', `last_name` = '$add_last_name', `role` = '$add_role', `details` = '$details'
";
       if(!empty($add_pass))
      {
        $update_query.=",`password` = '$password_new'";
      }
      if(isset($add_image))
      {
        $update_query.=",`image` = '$add_image'";
      }
      $update_query.="WHERE `users`.`id` = $uid";




     if(mysqli_query($conn,$update_query))
     {
       move_uploaded_file($add_tmp_image,"images/$add_image");
       $sucess_msg="User is updated successfully";
       header("refresh:0;url=edited.php?edit=$uid");
     }

    else{
        $error_msg="Something went wrong";

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
  <input type='text' name='fname' id='fname' class='form-control' placeholder='First Name' value="<?php  echo $fname; ?>" >
  </div>
  <div class='form-group'>
  <label for='lname' >Last Name:*</label>
  <input type='text' name='lname' id='lname' class='form-control'  placeholder='Last Name' value="<?php  echo $lname; ?>"  >
  </div>

  <div class='form-group'>
  <label for='pass' >Password:</label>
  <input type='password' name='pass' id='pass' class='form-control'      placeholder='Password'  >
  </div>
  <div class='form-group'>
  <label for='role' >Role:</label>
  <select name='role' id='role' class='form-control'>
  <option <?php if($urole==='Author') {echo "selected";} ?>>Author</option>
  <option <?php if($urole==='Admin') {echo "selected";} ?>   >Admin</option>
  </select>
  </div>
  <div class='form-group'>
  <label for='profile-img' >Profile Picture:</label><br>
  <input type='file' name='profile_img' id='profile_img'  >
  </div>
  <div class='form-group'>
  <label for='details' >Details:</label><br>
  <textarea name='details' id='details' class='form-control' rows='10' cols='80'><?php echo $udetails; ?></textarea>
  </div>
  <input type='submit' value='Update user' class='btn btn-primary' name='submit-btn'>

</form>
</div>
<div class='col-md-4' style='padding-left:50px;padding-right:50px;padding-top:20px;'>
  <?php

echo "<img src='images/$uimage' alt='user' style='width:100%;border:4px groove grey;'></img>";

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
