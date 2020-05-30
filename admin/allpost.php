<?php
session_start();
ob_start();

require_once('inc/top.php');

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");


}


?>


  </head>
  <body >

    <?php require_once('inc/nav.php');

    if(isset($_GET['del']))
    {
       $del_id=$_GET['del'];
       if(isset($_SESSION['username']) && $_SESSION['role']==='Admin')
       {
       $checkq="SELECT * FROM post WHERE id=$del_id";
       }
       else if(isset($_SESSION['username']) && $_SESSION['role']==='Author')
       {
        $rs=$_SESSION['username'];
        $checkq="SELECT * FROM post WHERE id=$del_id and author='$rs'";
       }
       $checkcon=mysqli_query($conn,$checkq);
       if(mysqli_num_rows($checkcon)>0)
       {
       $del_query="DELETE from post WHERE id=$del_id";
       if(mysqli_query($conn,$del_query))
       {
         $suc_msg='Postt has been deleted';
       }
       else
       {
         $err_msg='Post has not been deleted';
       }
       }
       else
       {
         header('location:index.php');
       }
       }





   if(isset($_POST['apply']))
   {
     $cap=$_POST['choice'];

     if(isset($_POST['getcheck']))
     {
     foreach($_POST['getcheck'] as $value)
     {
       if($cap=="Delete")
       {
        $del_query="DELETE FROM post where id=$value";
        if(mysqli_query($conn,$del_query))
        {
        $suc_msg="Post deleted successfully";
        }
        else
       {
        $err_msg="Post has not deleted ";
       }
       }
       else if($cap=="Publish")
       {
         $up_query="UPDATE post SET status='publish' WHERE id=$value";
         if(mysqli_query($conn,$up_query))
         {
          $suc_msg="status changed to Publish";
         }
         else
         {
           $err_msg='stutus has not publish';
         }
       }
       else if($cap=="Draft")
       {
         $chn_query="UPDATE post SET status='draft' WHERE id=$value";
         if(mysqli_query($conn,$chn_query))
         {
          $suc_msg="status changed to Draft";
         }
         else
         {
           $err_msg="status has not been changed";
         }
       }


     }

    }

   }





    ?>



    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">

    <?php require_once('inc/sidebar.php'); ?>

</div>
<div class="col-lg-9 col-md-12 col-sm-12" style="width:auto;">
  <i class="fa fa-2x fa-file" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Posts <small style="color:#495057;opacity:0.9;">View All Posts</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-file active" aria-hidden="true" >&nbsp;Posts</i></li>

</ol>
<form action="" method='POST'>
<select class="form-control" name='choice' style="width:auto;background:#3ba9e8;color:white;float:left;">
  <option value='Delete'>Delete</option>
  <option value='Publish'>Publish</option>
  <option value='Draft'>Draft</option>

</select>

<input type="submit" name="apply" value='Apply' class="btn btn-success" style="margin-left:20px;padding-top:-6px;">
<a style='color:white' href='addmainpost.php'>
<button type="button" name="add_new" class="btn btn-primary" style="margin-left:5px;padding-top:-6px;">
 Add New
</button>
</a>


<?php


if(isset($_SESSION['username']) && $_SESSION['role']==='Admin')
{
  $user_query=" SELECT * from post  ";

}
else if(isset($_SESSION['username']) && $_SESSION['role']==='Author')
{
  $sess_name= $_SESSION['username'];
  $user_query=" SELECT * from post WHERE author='$sess_name' ";

}
$user_conn=mysqli_query($conn,$user_query);
if(mysqli_num_rows($user_conn)>0)
{
?>
<table class="table table-striped" style="clear:both;margin-top:30px;margin-bottom:50px; width:100%;">
<?php  if(isset($suc_msg)){
  echo "<span class='pull-right' style='color:green;font-weight:bold;'>$suc_msg</span>"; }
  else if(isset($err_msg)){
    echo "<span class='pull-right' style='color:red;font-weight:bold;'>$err_msg</span>"; }?>
  <thead>
    <tr>
      <th><input type='checkbox' name="check" id="selectedall" value=""></th>
      <th class="jio">Sr #</th>
      <th>Date</th>
      <th>Title</th>
      <th class='jio'>Image</th>
      <th class='jio'>Author</th>
      <th class='jio'>Category</th>
      <th class='jio'>Status</th>
      <th>Views</th>
      <th class="jio">Edit</th>
      <th class="jio">Delete</th>



    </tr>
  </thead>
  <tbody>


<?php

 while($user_row=mysqli_fetch_array($user_conn))
 {

   $user_id=$user_row['id'];
   $user_date=getdate($user_row['date']);
   $user_day=$user_date['mday'];
   $user_month=$user_date['month'];
   $user_year=$user_date['year'];
   $user_title=$user_row['title'];
   $user_status=$user_row['status'];
   $user_author=$user_row['author'];
   $user_views=$user_row['views'];
   $post_image=$user_row['image'];
   $post_category=$user_row['category'];



?>

    <tr>

      <th scope="row"><input type="checkbox" name="getcheck[]" class='checkmate' value="<?php  echo $user_id; ?>"></th>
      <td class="jio"><?php echo $user_id;?></td>
      <td><?php echo $user_day."&nbsp;"; echo substr($user_month,0,3)."&nbsp;"; echo $user_year;?></td>
      <td> <?php echo $user_title; ?></td>
      <td class='jio'><img src="images/<?php echo $post_image; ?>" alt="user" style="width:30px;height:26px;"></td>
      <td class='jio'><?php echo $user_author;       ?></td>
            <td class='jio'><?php echo $post_category;   ?></td>
      <td class="jio"

        style="color:<?php if($user_status==='publish'){ echo 'blue';}else if($user_status==='draft'){ echo 'red';  }?>"><?php  echo $user_status;  ?></td>

      <td ><?php echo $user_views;   ?></td>
      <td class="jio"><a href="editmainpost.php?post=<?php echo $user_id;  ?>"'><i class="fa fa-edit" aria-hidden="true"></i></a></td>
      <td class="jio"><a href="allpost.php?del=<?php echo $user_id;  ?>"'><i class="fa fa-times" aria-hidden="true"></i></a></td>




    </tr>



<?php       }     ?>

  </tbody>
</table>
<?php }
else{
echo '<center><h1>No Posts available</h1></center>';
}?>
</form>
</div>

</div>
</div>


</div>


<?php  require_once('inc/footer.php');  ?>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="change.js"></script>
  </body>
</html>
