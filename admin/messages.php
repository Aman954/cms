<?php

session_start();

require_once('inc/top.php');

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");


}

if(isset($_SESSION['username']) and $_SESSION['role']==='Author')
{

  header("location:index.php");

}
 ?>

  </head>
  <body>
    <?php require_once('inc/nav.php');
    
    
    
    if(isset($_GET['del']))
    {
       $del_id=$_GET['del'];
       if(isset($_SESSION['username']) && $_SESSION['role']==='Admin')
       {
       $del_query="DELETE from messages WHERE id=$del_id";
       mysqli_query($conn,$del_query);
       }
     }


   if(isset($_POST['apply']))
   {
     $cap=$_POST['choice'];

     if(isset($_POST['getcheck']))
     {
     foreach($_POST['getcheck'] as $value)
     {
       if($cap==="Delete")
       {
        $del_query="DELETE FROM messages where id=$value";
        mysqli_query($conn,$del_query);
        $suc_msg="User deleted successfully";
       }
      

     }

    }

   }

    ?>

  
    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">
    <?php require_once('inc/sidebar.php');  ?>

</div>
<div class="col-lg-9 col-md-12 col-sm-12">
  <i class="fa fa-2x fa-envelope" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Inbox&nbsp;<small style="color:#495057;opacity:0.9;">View All Messages</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-envelope active" aria-hidden="true">&nbsp;Inbox</i></li>

</ol>


<form action="" method='POST'>
<select class="form-control" name='choice' style="width:auto;background:#3ba9e8;color:white;float:left;">
  <option >Delete</option>
  

</select>

<input type="submit" name="apply" value='Apply' class="btn btn-success" style="margin-left:20px;padding-top:-6px;">


<?php

$user_query=" SELECT * from messages  ";
$user_conn=mysqli_query($conn,$user_query);
if(mysqli_num_rows($user_conn)>0)
{
?>
<table class="table table-hover table-striped" style="clear:both;margin-top:30px; width:100%;">
<?php  if(isset($suc_msg)){
  echo "<span class='pull-right' style='color:green;font-weight:bold;'>$suc_msg</span>"; }?>
  <thead>
    <tr>
      <th><input type='checkbox' name="check" id="selectedall" value=""></th>
      <th >Sr #</th>
      <th>Date</th>
      <th>Name</th>
      <th class="jio">Website</th>
      <th >Message</th>
      <th class="jio">Mail</th>
      <th class="jio">Reply</th>
      <th class="jio">Del</th>



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
   $user_name=$user_row['name'];
   $user_mail=$user_row['mail'];
   $user_website=$user_row['website'];
   $user_message=$user_row['message'];
   

?>

    <tr>

      <th scope="row"><input type="checkbox" name="getcheck[]" class='checkmate' value="<?php  echo $user_id; ?>"></th>
      <td ><?php echo $user_id;?></td>
      <td><?php echo $user_day."&nbsp;"; echo substr($user_month,0,3)."&nbsp;"; echo $user_year;?></td>
      <td> <?php echo $user_name; ?></td>
      <td class="jio"><?php echo $user_website; ?></td>
      <td ><?php echo $user_message; ?></td>
      <td class="jio"><?php echo $user_mail; ?></td>
      <td class="jio"><a href="mailto:<?php $user_mail ?>"><i class="fa fa-reply" aria-hidden="true"></i></a></td>
      <td class="jio"><a href='messages.php?del="<?php echo $user_id;  ?>"'><i class="fa fa-times" aria-hidden="true"></i></a></td>




    </tr>



<?php       }     ?>

  </tbody>
</table>
<?php }
else{
echo '<center><h1>No User available</h1></center>';
}?>
</form>





      </div>
    </div>


</div>

</div>
</div>




</div>

<?php require_once('inc/footer.php');  ?>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="change.js"></script>
  </body>
</html>
