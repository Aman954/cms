<?php
session_start();


require_once('inc/top.php');

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");


}

if(isset($_SESSION['username']))
{
$susername=$_SESSION['username'];
$get_query="SELECT * FROM users WHERE username='$susername' ";
$get_run=mysqli_query($conn,$get_query);
if(mysqli_num_rows($get_run)>0)
{
$getd=mysqli_fetch_array($get_run);
$getusername=$getd['username'];
$getfname=$getd['first_name'];
$getlname=$getd['last_name'];
$getrole=$getd['role'];
$getimage=$getd['image'];
$getmail=$getd['mail'];
$getdate=getdate($getd['date']);
$getday=$getdate['mday'];
$getmonth=$getdate['month'];
$getyear=$getdate['year'];
$getid=$getd['id'];
$getdetails=$getd['details'];

}

}



?>


  </head>
  <body >

    <?php require_once('inc/nav.php');    ?>



    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">

    <?php require_once('inc/sidebar.php'); ?>

</div>
<div class="col-lg-9 col-md-12 col-12 " style="width:auto;">
  <i class="fa fa-2x fa-user" aria-hidden="true" style="color:#2fa4e7;">&nbsp;User Profile <small style="color:#495057;opacity:0.9;">User Details</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-user" aria-hidden="true">&nbsp;User Profile</i></li>

</ol>

<br><br><center>
<img src='images/<?php echo $getimage;    ?>' class='rounded-circle img-thumbnail profile' style='width:180px;height:180px;'></img></center>
<br>
<center><h3 style='color:violet;'><?php echo $_SESSION['username'];  ?></h2></center>

<a  href='edituser.php?edit="<?php echo $getid; ?>"'  class='btn btn-primary pull-right'>Edit Details</a>
<br><br><br>
<div class='row' style='margin-bottom:40px;'>
  <div class='col-12'>
<table class='table table-bordered ' style='width:100%;'>
  <tbody>
  <tr>
    <td style='font-weight:bold;width:20%;'>Username:</td>
    <td style='width:30%;'><?php echo $getusername;   ?></td>
    <td style='font-weight:bold;width:20%;' class='dim'>Register Date:</td>
    <td style='width:30%;' class='dim'><?php  echo $getday."&nbsp;".$getmonth."&nbsp;".$getyear;     ?></td>

  </tr>
  <tr>
    <td style='font-weight:bold;'>First Name:</td>
    <td><?php echo $getfname; ?></td>
    <td  class='dim' style='font-weight:bold;'>Last Name:</td>
    <td class='dim' ><?php   echo $getlname;      ?></td>

  </tr>
  <tr>
    <td style='font-weight:bold;'>password:</td>
    <td>******</td>
    <td class='dim' style='font-weight:bold;'>Role:</td>
    <td class='dim' ><?php echo $getrole;        ?></td>

  </tr>
  <tr>
    <td style='font-weight:bold;'>Mail:</td>
    <td><?php  echo $getmail;        ?></td>
    <td class='dim' style='font-weight:bold;'>Regestration No:</td>
    <td class='dim' ><?php   echo $getid;        ?></td>



  </tr>
</tr>
</tbody>
</table><br>
<div class='show'>
  <h5 style='color:grey;' class='pull-left'>Other Details:</h5>

<table class='table table-bordered'>
  <tbody>
  <tr class='show'>

    <tr >
      <td style='font-weight:bold;width:10%;' >Register No:</td>
      <td  style='width:30%;'><?php echo $getid;      ?></td>

    </tr>



  </tr>

  <tr >
    <td style='font-weight:bold;width:10%;' >Register Date:</td>
    <td  style='width:30%;'><?php echo $getday."&nbsp;".$getmonth."&nbsp;".$getyear;      ?></td>


  </tr>

  <tr >
    <td style='font-weight:bold;width:10%;' >Last Name:</td>
    <td  style='width:30%;'><?php echo $getlname;      ?></td>


  </tr>

  <tr >
    <td style='font-weight:bold;width:10%;' >User Role:</td>
    <td  style='width:30%;'><?php echo $getrole;      ?></td>


  </tr>


</tbody>
</table>







</div>

<br>


<div class='row'>
  <div class='col-lg-8 col-sm-12'>
<h5 style='color:violet;font-weight:bold;'>Description:</h5>
<div>
<?php echo $getdetails;      ?>

</div>
</div>
</div>


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
    <script src="change.js"></script>
  </body>
</html>
