
<?php

session_start();

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");

  
}  

 require_once('inc/top.php');
 
if(isset($_SESSION['username']) and $_SESSION['role']==='Admin')
{
 if(isset($_GET['del']))
 {
   $delid=$_GET['del'];
   $checkq="SELECT * FROM media WHERE id='$delid'";
   $checkc=mysqli_query($conn,$checkq);
   if(mysqli_num_rows($checkc)>0)
    {
      $delqn="DELETE FROM media WHERE id='$delid'";
      if(mysqli_query($conn,$delqn))
      {
        $sucmsg='image deleted';
      }
      else{
        $error='delete unsucessful try again!';
      }
    }
    else{
      header("location:index.php");
    }
 }
  
  
  
  
  
if(isset($_POST['delete']))
{
if(isset($_POST['check']))   

    {
      foreach($_POST['check'] as $values)
      {
        $delqall="DELETE FROM media WHERE id=$values";
        if(mysqli_query($conn,$delqall))
        {
          $suc_msg="deleted successfully";
        }
        else
        {
          $error="something wrong try again!";
        }
      }
      
    }   
  
    
    
    
 }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
}   
 

 
 
 
 
 
  ?>


  </head>
  <body>
    <?php require_once('inc/nav.php'); ?>

  
  
    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">
    
    <?php require_once('inc/sidebar.php'); ?>

    
  
</div>
<div class="col-lg-9 col-md-12 col-sm-12">
  <i class="fa fa-2x fa-database" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Media<small style="color:#495057;opacity:0.9;">&nbsp;View Media</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-database" aria-hidden="true";>&nbsp;Media</i></li>

</ol>

<?php

if(isset($_POST['submit']))
{

 
 if(count($_FILES['media']['name'])>0)
 {
  for($i=0;$i<count($_FILES['media']['name']);$i++)
  {
   $image_name=$_FILES['media']['name'][$i];
   $image_tmp=$_FILES['media']['tmp_name'][$i];
   $mq="INSERT INTO media(image) VALUES('$image_name') ";
   if(mysqli_query($conn,$mq))
   {
     $path="media/$image_name";
     move_uploaded_file($image_tmp,$path);
     copy($path,"../$path");
     $suc_msg="selected files has been uploaded";
   }
 }
 }
}


?>





  <form method='POST' enctype='multipart/form-data' action=''>
<div class='form-group'>
  <label >Choose file</label><br>
  <input type='file' name='media[]' multiple  required>
</div> 
  <input type='submit' name='submit' value='select' class='btn btn-primary' >

</form>


<hr>

<?php

$dq="SELECT * FROM media ";
$dc=mysqli_query($conn,$dq);

if(mysqli_num_rows($dc)>0)
{

?>

<?php if(isset($_SESSION) and $_SESSION['role']==='Admin'){?>
<form method='POST' action=''>
  <label for='checkboxall'>All</label>
<input type='checkbox' name='checkboxall' id='selectedall'>&nbsp;
<input type='submit'  name='delete' class='btn btn-danger' value='Delete'>

<?php
if(isset($suc_msg))
{
  
  echo "<span class='pull-right' style='color:green'>$suc_msg </span>";  
  
}
else if(isset($error))
{
  echo "<span class='pull-right' style='color:red'>$error</span>";  

}
?>




<?php  }   ?>


<div class='row'>
  
<?php  
  while($mrow=mysqli_fetch_array($dc))
  {
    
    $image_id=$mrow['id'];
    $self_image=$mrow['image'];

    
    ?>
  <div class='col-lg-2 col-md-3 col-sm-4  col-6 thumb' style='padding:20px;background:white;'>
    <?php 
    if(isset($_SESSION) and $_SESSION['role']==='Admin')
    {
    ?>
    
    <input type="checkbox" name="check[]" class="checkmate" value="<?php echo $image_id; ?>">
    <a href="media.php?del=<?php echo $image_id; ?>"><i class="fa fa-times" area-hidden="true"></i></a>
    </form>  
    <?php
     }
    ?>
    <a class="thumbnail" href='media/<?php  echo $self_image;   ?>' >
      <img src='media/<?php  echo $self_image;   ?>' alt='media' width='100%' class='img-thumbnail'>
    </a>
  </div>
  
<?php  }   ?>  
  
</div>


<?php   }

else{
  
  echo "<br><center><h1 style='color:violet'>No media available</h1></center>";
}


?>









</div>
</div>
</div>


</div>




<?php  require_once('inc/footer.php');   ?>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="change.js"></script>

  </body>
</html>
