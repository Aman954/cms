
<?php

session_start();

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");

  
}  

 require_once('inc/top.php'); ?>


  </head>
  <body>
    <?php require_once('inc/nav.php');
    
    
    
    $selallpostq="SELECT * FROM  post";
    $selallpost=mysqli_query($conn,$selallpostq);
    if(mysqli_num_rows($selallpost)>0)
    {
      $p=mysqli_num_rows($selallpost);
    }
    else
    {
      $p=0;
    }
    
    $selallmediaq="SELECT * FROM  media";
    $selallmedia=mysqli_query($conn,$selallmediaq);
    if(mysqli_num_rows($selallmedia)>0)
    {
      $m=mysqli_num_rows($selallmedia);
    }
    else
    {
      $m=0;
    }
    
    
    $selallcommentq="SELECT * FROM  comments WHERE status='pending'";
    $selallcomment=mysqli_query($conn,$selallcommentq);
    if(mysqli_num_rows($selallcomment)>0)
    {
      $c=mysqli_num_rows($selallcomment);
    }
    else
    {
      $c=0;
    }
    
    
    $selallcatq="SELECT * FROM  category";
    $selallcat=mysqli_query($conn,$selallcatq);
    if(mysqli_num_rows($selallcat)>0)
    {
      $cat=mysqli_num_rows($selallcat);
    }
    else
    {
      $cat=0;
    }
    
    
    $selalluserq="SELECT * FROM  users";
    $selalluser=mysqli_query($conn,$selalluserq);
    if(mysqli_num_rows($selalluser)>0)
    {
      $user=mysqli_num_rows($selalluser);
    }
    else
    {
      $user=0;
    }
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     ?>

  
  
    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">
    
    <?php require_once('inc/sidebar.php'); ?>

    
  
</div>
<div class="col-lg-9 col-md-12 col-sm-12">
  <i class="fa fa-2x fa-tachometer" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Dashboard <small style="color:#495057;opacity:0.9;">Statistics Overview</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item active"><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
</ol>

<div class="row">
<div class="col-lg-3  col-md-6  col-sm-12" >


<!--<div class="card text-white bg-dark mb-3" style="max-width: 20rem;">

  <div class="card-body">
    <h4 class="card-title">Dark card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
    <div class="card-footer">Header</div>
</div>-->
<div class="card text-white koop mb-3" style="min-width:100%;background:#d6646c;height:180px;">

  <div class="card-body" style="background:#d6646c;padding-right:5px;">
    <!--<h4 class="card-title" style="color:black;">Danger card title</h4>-->
    <div class="row" style="padding:0px;">
    <div class="col-4" style="float:left;margin:0px;">
    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<i class="fa fa-5x fa-address-book-o" aria-hidden="true" style="margin-right:10px;"></i>

<!--<i class="fa fa-5x fa-comments" aria-hidden="true"></i>-->

</div>

<div class="col-lg-8 col-sm-8 col-xs-8 see" style="height:100%;margin:0px;" >
<!--<div class="col-12" style="background:red;">-->
  <span style="float:right;font-size:46px;margin-left:10px;"><?php echo $p; ?></span>
<!--</div>-->
<br>
<br>
<br>
  <div><span style="float:right;font-size:15px;">All Posts</span></div>

<!--<div class="col-12" style="background:green;">-->

<!--</div>-->
</div>
</div>

  </div>
<!--  <div><span style="float:right;position:relative;top:20px;font-size:13px;">New Comments</span></div>-->
<a href="allpost.php" style='text-decoration:none;'>   <div class="card-footer" style="background:white;color:#d6646c;">All Posts<i class="fa fa-arrow-circle-right" aria-hidden="true" style="float:right;margin-top:6.2px;"></i></div>
</div></a>





</div>
<div class="col-lg-3 col-md-6 col-sm-12">
  <!--<div class="card text-white  mb-3" style="max-width: 20rem;background:#2fa4e7;height:180px;">

    <div class="card-body" style="background:#2fa4e7;">
      <h4 class="card-title" style="color:black;">Danger card title</h4>
     <div class="row">
      <div class="col-4">-->
      <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--<i class="fa fa-5x fa-comments" aria-hidden="true"></i>

</div>
<div class="col-lg-8 col-sm-12" >
  <div class="col-12" style="background:red;">
    <span style="float:right;font-size:46px;">11</span>-->
  <!--</div>-->
  <!--<br>

    <div><span style="float:right;font-size:15px;">New Comments</span></div>-->

  <!--<div class="col-12" style="background:green;">-->

  <!--</div>-->
<!--</div>
</div>

</div>-->
  <!--  <div><span style="float:right;position:relative;top:20px;font-size:13px;">New Comments</span></div>-->
  <!--  <div class="card-footer" style="background:white;color:#2fa4e7;">View All Comments<i class="fa fa-arrow-circle-right" aria-hidden="true" style="float:right;margin-top:6.2px;"></i></div>
  </div>-->

  <div class="card text-white  mb-3" style="min-width:100%;background:#2fa4e7;height:180px;">

    <div class="card-body" style="background:#2fa4e7;padding-right:2px;">
      <!--<h4 class="card-title" style="color:black;">Danger card title</h4>-->
      <div class="row">
      <div class="col-4">
      <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<i class="fa fa-5x fa-comments" aria-hidden="true"></i>

</div>
<div class="col-lg-8 col-sm-8 col-xs-8 see" >
  <!--<div class="col-12" style="background:red;">-->
    <span style="float:right;font-size:46px;"><?php  echo $c;  ?></span>
  <!--</div>-->
  <br>
  <br>
  <br>

    <div><span style="float:right;font-size:15px;">Comments</span></div>

  <!--<div class="col-12" style="background:green;">-->

  <!--</div>-->
</div>
</div>

    </div>
  <!--  <div><span style="float:right;position:relative;top:20px;font-size:13px;">New Comments</span></div>-->
    <a href="comments.php" style='text-decoration:none;'> <div class="card-footer" style="background:white;color:#2fa4e7;">Comments<i class="fa fa-arrow-circle-right" aria-hidden="true" style="float:right;margin-top:6.2px;"></i></div>
  </div></a>



</div>


<div class="col-lg-3 col-md-6 col-sm-12">

<!--  <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">

    <div class="card-body">
      <h4 class="card-title">Danger card title</h4>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer">Header</div>
  </div>-->

  <div class="card text-white  mb-3" style="min-width:100%;background:#37ce50;height:180px;">

    <div class="card-body" style="background:#37ce50;padding-right:2px;">
      <!--<h4 class="card-title" style="color:black;">Danger card title</h4>-->
      <div class="row">
      <div class="col-4">
      <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--<i class="fa fa-5x fa-comments" aria-hidden="true"></i>-->
<i class="fa fa-5x fa-users" aria-hidden="true"></i>
</div>
<div class="col-lg-8 col-sm-8 see" >
  <!--<div class="col-12" style="background:red;">-->
    <span style="float:right;font-size:46px;"><?php echo $user;  ?></span>
  <!--</div>-->
  <br>
<br>
<br>
    <div><span style="float:right;font-size:15px;"> All Users</span></div>

  <!--<div class="col-12" style="background:green;">-->

  <!--</div>-->
</div>
</div>

    </div>
  <!--  <div><span style="float:right;position:relative;top:20px;font-size:13px;">New Comments</span></div>-->
    <a href="users.php" style='text-decoration:none;'> <div class="card-footer" style="background:white;color:#44e03c;">All Users<i class="fa fa-arrow-circle-right" aria-hidden="true" style="float:right;margin-top:6.2px;"></i></div>
  </div></a>




</div>
<div class="col-lg-3 col-md-6 col-sm-12">

<!--  <div class="card text-white bg-info mb-3" style="max-width: 20rem;">

    <div class="card-body">
      <h4 class="card-title">Info card title</h4>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer">Header</div>
  </div>-->
  <div class="card text-white  mb-3" style="min-width:100%;background:#8ded68;height:180px;">

    <div class="card-body" style="background:#8ded68;padding-right:2px;">
      <!--<h4 class="card-title" style="color:black;">Danger card title</h4>-->
      <div class="row">
      <div class="col-4">
<i class="fa fa-5x fa-folder-open" aria-hidden="true"></i>

      <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--<i class="fa fa-5x fa-comments" aria-hidden="true"></i>-->

</div>
<div class="col-lg-8 col-sm-8 see" >
  <!--<div class="col-12" style="background:red;">-->
    <span style="float:right;font-size:46px;"><?php  echo $cat;    ?></span>
  <!--</div>-->
  <br>
<br>
<br>
    <div><span style="float:right;font-size:15px;">Categories</span></div>

  <!--<div class="col-12" style="background:green;">-->

  <!--</div>-->
</div>
</div>

    </div>
  <!--  <div><span style="float:right;position:relative;top:20px;font-size:13px;">New Comments</span></div>-->
<a href="category.php" style='text-decoration:none;'> <div class="card-footer" style="background:white;color:#8ded68;">Categories<i class="fa fa-arrow-circle-right" aria-hidden="true" style="float:right;margin-top:6.2px;"></i></div>
</div></a>

</div>

</div>



<div class="row" style="width:100%;margin-left:0px;padding-left:0px;padding-right:0px;">
  <div class="col-lg-3">
  </div>
  <div class="col-lg-12  col-md-12 col-sm-12" style="padding-left:0px;padding-right:0px;">
<h2 style="margin-top:20px;margin-bottom:-5px;">New Users</h2>
<br>
<div >

<?php

$fetchq="SELECT * FROM users ORDER BY id DESC LIMIT 6";
$fetchcon=mysqli_query($conn,$fetchq);

if(mysqli_num_rows($fetchcon)>0)
{
?>

  <table class="table table-hover table-striped" style='max-width:100%;'>
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Date</th>
        <th scope="col" class='jio'>Name</th>
        <th scope="col">Username</th>
        <th scope="col" class="next">Role</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($userrow=mysqli_fetch_array($fetchcon))
       {
         $userid=$userrow['id'];
         $userdate=getdate($userrow['date']);
         $userday=$userdate['mday'];
         $usermonth=$userdate['month'];
         $useryear=$userdate['year'];
         $userfirst=$userrow['first_name'];
         $userlast=$userrow['last_name'];
         $username=$userrow['username'];
         $userrole=$userrow['role'];







         ?>
      <tr >
        <th scope="row"><?php echo $userid; ?></th>
        <td><?php echo $userday."&nbsp;".$usermonth."&nbsp;".$useryear; ?></td>
        <td class='jio'><?php echo $userfirst."&nbsp;".$userlast; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $userrole; ?></td>

      </tr>
        <?php  }   ?>
    </tbody>
  </table>
<a href='users.php'><button class="btn btn-primary" style="margin-top:15px;">
View All Users

</button></a>
<?php   } 

else
{
  
echo "<center><h2 style='color:violet'>No new user</h2></center>";  
  
}







?>
</div>
<br>
<h2 style="margin-top:20px;margin-bottom:-45px;">New Posts</h2>
<div style='padding:5px;margin-bottom:40px;'>
  
  
<?php  

$nq="SELECT * FROM post ORDER BY id DESC LIMIT 6";  
$nc=mysqli_query($conn,$nq);
if(mysqli_num_rows($nc)>0)
{    
?>
<table class="table table-hover table-striped" style="width:100%;margin-top:80px;">
  <thead>
    <tr>
      <th scope="col">Key</th>
      <th scope="col">Date</th>
      <th scope="col">Post Title</th>
      <th scope="col" class='jio'>Category</th>
      <th scope="col" class="next">Views</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($postrow=mysqli_fetch_array($nc))
    {
      $postid=$postrow['id'];
      $postdate=getdate($postrow['date']);
      $postday=$postdate['mday'];
      $postmonth=$postdate['month'];
      $postyear=$postdate['year'];
      $posttitle=$postrow['title'];
      $postcategory=$postrow['category'];
      $postviews=$postrow['views'];
    ?>
    <tr>
      <th scope="row"><?php  echo $postid;   ?></th>
      <td><?php  echo $postday."&nbsp;".$postmonth."&nbsp;".$postyear;   ?></td>
      <td><?php  echo $posttitle;   ?></td>
      <td class='jio'><?php  echo $postcategory;   ?></td>
      <td><i class="fa fa-eye fa-1x" aria-hidden="true" style="margin-right:3px;"></i><?php  echo $postviews;   ?></td>

    </tr>
  <?php  }   ?>

  </tbody>
</table>
<?php
}
else
{

echo "<center><h2>No new Post</h2><center/>";  

}  



?><a href='allpost.php'>
<button class="btn btn-primary" style="margin-top:15px;">
View All Posts

</button></a>
</div>
</div>
</div>


</div>

</div>
</div>

</div>

<?php  require_once('inc/footer.php');   ?>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
