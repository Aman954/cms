<?php
session_start();
ob_start();

require_once('inc/top.php');

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");


}

if(isset($_SESSION['username']) && $_SESSION['role']==='Author')
{

  header("Location:index.php");


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
       $checkq="SELECT * FROM comments WHERE id=$del_id";
       $checkcon=mysqli_query($conn,$checkq);
       if(mysqli_num_rows($checkcon)>0)
       {
       $del_query="DELETE from comments WHERE id=$del_id";
       if(mysqli_query($conn,$del_query))
       {
         $suc_msg='comment has been deleted';
       }
       else
       {
         $err_msg='comment has not been deleted';
       }
       }
       else
       {
         header('location:index.php');
       }
       }
     }


     if(isset($_GET['approve']))
     {

        $approve_id=$_GET['approve'];
        if(isset($_SESSION['username']) && $_SESSION['role']==='Admin')
        {
        $checkq2="SELECT * FROM comments WHERE id=$approve_id";
        $checkcon2=mysqli_query($conn,$checkq2);
        if(mysqli_num_rows($checkcon2)>0)
        {
        $approve_query="UPDATE comments  SET status='approved' WHERE id=$approve_id";

        if(mysqli_query($conn,$approve_query))
        {
          $suc_msg="status has been changed";
        }
      }
      else{
        header('location:index.php');
      }
        }
      }


           if(isset($_GET['unapprove']))
           {
              $unapprove_id=$_GET['unapprove'];
              if(isset($_SESSION['username']) && $_SESSION['role']==='Admin')
              {
                $checkq3="SELECT * FROM comments WHERE id=$unapprove_id";
                $checkcon3=mysqli_query($conn,$checkq3);
                if(mysqli_num_rows($checkcon3)>0)
                {
              $unapprove_query="UPDATE comments  SET status='pending' WHERE id=$unapprove_id";

              if(mysqli_query($conn,$unapprove_query))
              {
                $suc_msg="status has been changed";
              }
            }
            else{
              header('location:index.php');
            }
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
        $del_query="DELETE FROM comments where id=$value";
        if(mysqli_query($conn,$del_query))
        {
        $suc_msg="comment deleted successfully";
        }
        else
       {
        $err_msg="comment has not deleted ";
       }
       }
       else if($cap=="Approve")
       {
         $up_query="UPDATE comments SET status='approved' WHERE id=$value";
         if(mysqli_query($conn,$up_query))
         {
          $suc_msg="status changed to approved";
         }
         else
         {
           $err_msg='stutus has not changed';
         }
       }
       else if($cap=="Unapprove")
       {
         $chn_query="UPDATE comments SET status='pending' WHERE id=$value";
         if(mysqli_query($conn,$chn_query))
         {
          $suc_msg="status changed to pending";
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
  <i class="fa fa-2x fa-comments" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Comments <small style="color:#495057;opacity:0.9;">View All Comments</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-comments active" aria-hidden="true" >&nbsp;Comments</i></li>
</ol>
<form action="" method='POST'>
<select class="form-control" name='choice' style="width:auto;background:#3ba9e8;color:white;float:left;">
  <option value='Delete'>Delete</option>
  <option value='Approve'>Approve</option>
  <option value='Unapprove'>Unapprove</option>

</select>

<input type="submit" name="apply" value='Apply' class="btn btn-success" style="margin-left:20px;padding-top:-6px;">

<br>
<br>
<?php

if(isset($_GET['rep']))
{
   $rep_id=$_GET['rep'];
   if(isset($_SESSION['username']) && $_SESSION['role']==='Admin')
   {
    $sessionread=$_SESSION['username'];
    $sesquery="SELECT * FROM users WHERE username='$sessionread'";
    $sc=mysqli_query($conn,$sesquery);
    if(mysqli_num_rows($sc)>0)
    {
      $catch=mysqli_fetch_array($sc);
      $sdate=time();
      $sfname=$catch['first_name'];
      $slname=$catch['last_name'];
      $sname="$sfname $slname";
      $smail=$catch['mail'];
      $simage=$catch['image'];

      if(isset($_POST['msg']))
      {
        $getco=mysqli_real_escape_string($conn,$_POST['comment']);
        $insmsgq="INSERT INTO comments(date,name,username,post_id,email,website,image,comment,status)
        VALUES('$sdate','$sname','$sessionread','$rep_id','$smail','not required','$simage','$getco','approved')";
        if(mysqli_query($conn,$insmsgq))
         {
           $suc_msg="reply successfully";
           header("location:comments.php");
         }
         else{
              $err_msg="something went wrong";
         }
         if(empty($getco))
         {
           $error="All fields are required";
         }
      }



    }
    else
    {
      header('location:index.php');
    }




}

?>
<div class='row'>
  <div class='col-lg-6'>
    <form method='POST' action=''>
      <div class='form-group'>
        <label for='comment' value='comment' >Comment:</label>
        <?php
        if(isset($error))
        {
        echo "<span class='pull-right' style='color:red;'> $error </span>";
         }
        ?>
        <textarea class='form-control' name='comment' rows='10' required placeholder='your comment is here...'></textarea>
      </div>
      <input type='submit' name='msg' class='btn btn-primary' value='submit'>
    </form>
  </div>
</div>

<hr>

<?php   }  ?>





<?php


$user_query=" SELECT * from comments  ";
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
      <th>Name</th>
      <th>Comment</th>
      <th class='jio'>Post_id</th>
      <th class='jio'>Status</th>
      <th class='jio'>Approve</th>
      <th class='jio'>Unapprove</th>
      <th class="jio">Reply</th>
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
   $user_first_name=$user_row['name'];
   $user_status=$user_row['status'];
   $user_website=$user_row['website'];
   $user_comment=$user_row['comment'];
   $post_id=$user_row['post_id'];



?>

    <tr>

      <th scope="row"><input type="checkbox" name="getcheck[]" class='checkmate' value="<?php  echo $user_id; ?>"></th>
      <td class="jio"><?php echo $user_id;?></td>
      <td><?php echo $user_day."&nbsp;"; echo substr($user_month,0,3)."&nbsp;"; echo $user_year;?></td>
      <td> <?php echo $user_first_name; ?></td>
      <td ><?php echo $user_comment; ?></td>
      <td class='jio'><?php echo $post_id;       ?></td>
      <td class="jio"

        style="color:<?php if($user_status==='approved'){ echo 'blue';}else if($user_status==='pending'){ echo 'red';  }?>"><?php  echo $user_status  ?></td>
      <td class='jio'><a href='comments.php?approve="<?php echo $user_id   ?>"'>approve</a></td>
      <td class="jio"><a href='comments.php?unapprove="<?php echo $user_id   ?>"'>Unapprove</a></td>
      <td class="jio"><a href="comments.php?rep=<?php echo $post_id;  ?>"'><i class="fa fa-reply" aria-hidden="true"></i></a></td>
      <td class="jio"><a href="comments.php?del=<?php echo $user_id;  ?>"'><i class="fa fa-times" aria-hidden="true"></i></a></td>




    </tr>



<?php       }     ?>

  </tbody>
</table>
<?php }
else{
echo '<center><h1>No Comments available</h1></center>';
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
