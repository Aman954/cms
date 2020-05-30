<div id='wrapper' style='position:relative;min-height:100%'>

<nav class="navbar navbar-expand-sm navbar-dark bg-primary " style='text-align:center;' >
  
 <ul class="navbar-nav mx-auto" >
   <li class="nav-item active">
     <a class='navbar-brand ' href="index.php" style='display:block;'>
      <span class='press' >topexplore!</span>
    </a>
</li>
</ul>
  <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarColor01" aria-label="Toggle navigation" type="button" data-target="#navbarColor01" data-toggle="collapse">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">

    

      <li class="nav-item active hov">
        <a class="nav-link" href="profile.php" ><i class="fa fa-user" aria-hidden="true" style="margin-right:2px;"></i><?php echo $_SESSION['username'];  ?><span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item active hov">
        <a class="nav-link" href="addmainpost.php"><i class="fa fa-plus-square" aria-hidden="true" style="margin-right:2px;"></i>Add Post</a>
      </li>
      <?php
    if($_SESSION['role']==="Admin")
    {
      ?>
      <li class="nav-item active hov">
        <a class="nav-link" href="edit-post.php"><i class="fa fa-users" aria-hidden="true" style="margin-right:2px;"></i>Add User</a>
      </li>
    <?php }  ?>

      <li class="nav-item active hov">
        <a class="nav-link" href="signout.php"><i class="fa fa-power-off" aria-hidden="true" style="margin-right:2px;"></i>Sign-out</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <!--  <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>-->



    </form>
  </div>
</nav>
















