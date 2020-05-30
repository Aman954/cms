<?php

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

$ms="SELECT * FROM  messages";
$mscon=mysqli_query($conn,$ms);
if(mysqli_num_rows($mscon)>0)
{
  $m=mysqli_num_rows($mscon);
}
else
{
  $m=0;
}




?>





<ul class="list-group ">
<li class="list-group-item d-flex justify-content-between align-items-center list-group-item active">
<a href="index.php" style="color:white;text-decoration:none;"> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
<span class="badge badge-primary badge-pill"></span>
</li>
<li class="list-group-item  list-group-items  d-flex justify-content-between align-items-center">
<a href="allpost.php" style="color:#495057;text-decoration:none;"><i class="fa fa-address-book-o" aria-hidden="true">&nbsp;All Posts</i>  </a>
<span class="badge badge-primary badge-pill"><?php  echo $p;   ?></span>
</li>
<li class="list-group-item list-group-items d-flex justify-content-between align-items-center">
<a href="media.php" style="color:#495057;text-decoration:none;"><i class="fa fa-database" aria-hidden="true">&nbsp;Media</i>  </a>
<span class="badge badge-primary badge-pill"><?php echo $m; ?></span>
</li>

<?php
if($_SESSION['role']==='Admin')
{ ?>
<li class="list-group-item list-group-items d-flex justify-content-between align-items-center">
<a href="comments.php" style="color:#495057;text-decoration:none;"><i class="fa fa-comments" aria-hidden="true" >&nbsp;<span style="margin-right:2px;">Comments</span></i></a>
<?php
if(mysqli_num_rows($selallcomment)>0)
{
echo "<span class='badge badge-primary badge-pill'>$c</span>";
}
?>
</li>
<li class="list-group-item list-group-items d-flex justify-content-between align-items-center">
<a href="category.php" style="color:#495057;text-decoration:none;"><i class="fa fa-folder-open" aria-hidden="true">&nbsp;Categories</i>  </a>
<span class="badge badge-primary badge-pill"><?php  echo $cat;  ?></span>
</li>
<li class="list-group-item list-group-items d-flex justify-content-between align-items-center">
<a href="messages.php" style="color:#495057;text-decoration:none;"><i class="fa fa-envelope" aria-hidden="true">&nbsp;Messages</i>  </a>
<span class="badge badge-primary badge-pill"><?php  echo $m;  ?></span>
</li>
<li class="list-group-item list-group-items d-flex justify-content-between align-items-center">
<a href="users.php" style="color:#495057;text-decoration:none;"><i class="fa fa-users" aria-hidden="true">&nbsp;All Users</i>  </a>
<span class="badge badge-primary badge-pill"><?php  echo $user;    ?></span>
</li>
<?php  }   ?>

<br>

</ul>
