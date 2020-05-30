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

    if(isset($_POST['submit']))
     {
       $inscat=mysqli_real_escape_string($conn,$_POST['category']);
       $checkq="SELECT * FROM category WHERE category='$inscat'";
       $checkr=mysqli_query($conn,$checkq);
       if(mysqli_num_rows($checkr)>0)
       {
        $error_msg="category already exist";
       }
       else if(empty($inscat))
       {
         $error_msg="please fill all field";

       }
       else
       {

        $ins_query="INSERT INTO category(category) VALUES('$inscat')";
        mysqli_query($conn,$ins_query);
        $success_msg="New category has been added";

       }

     }










    if(isset($_SESSION['username']) and $_SESSION['role']==='Admin')
    {
    if(isset($_GET['del']))
    {

      $did=$_GET['del'];
      $delq="DELETE FROM category WHERE id=$did";
      if(mysqli_query($conn,$delq))
      {
        $success_msg='user has been deleted';
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
  <i class="fa fa-2x fa-folder-open" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Categories <small style="color:#495057;opacity:0.9;">Diffrent Categories</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-folder-open-o active" aria-hidden="true">&nbsp;Categories</i></li>

</ol>

<div class="row">
  <div class="col-lg-6 col-sm-12" style="margin-bottom:20px;">
    <form method='post' action=''>
  <div class="form-group">
    <label for="category">New Category</label>

      <?php
      if(isset($error_msg))
      {

      echo "<span class='pull-right' style='color:red;'>$error_msg </span>";
      }

      else if(isset($success_msg))

      {

      echo "<span class='pull-right'style='color:green;' >$success_msg </span>";
      }


        ?>
    <input type="text" class="form-control" id="category" placeholder="Category Name" Name="category" style="width:100%;">
  </div>
  <input type='submit' name='submit' value='Add Category' class="btn btn-primary">


</form>


<br>

<?php

if(isset($_GET['cat']))
{
    $dio=$_GET['cat'];
    $sepq="SELECT * FROM category WHERE id=$dio";
    $r=mysqli_query($conn,$sepq);
    $fet=mysqli_fetch_array($r);
    $catname=$fet['category'];




    if(isset($_POST['submit2']))
     {
       $inscat2=mysqli_real_escape_string($conn,$_POST['category2']);
       $checkq2="SELECT * FROM category WHERE category='$inscat2'";
       $checkr2=mysqli_query($conn,$checkq2);
       if(mysqli_num_rows($checkr2)>0)
       {
        $error_msg2="category already exist";
       }
       else if(empty($inscat2))
       {
         $error_msg2="please fill all field";

       }
       else
       {

        $ins_query2="UPDATE category SET category='$inscat2' WHERE id=$dio ";
        mysqli_query($conn,$ins_query2);
        $success_msg2="category has been updated";
        $put_query="SELECT * FROM category WHERE id=$dio ";
        $att=mysqli_query($conn,$put_query);
        $find=mysqli_fetch_array($att);
        $ca=$find['category'];
        $catname="$ca";
       }

     }

















?>
<form method="post" action="">
<div class="form-group">
<label for="category">Update Category</label>
  <?php
  if(isset($error_msg2))
  {

  echo "<span class='pull-right' style='color:red;'>$error_msg2 </span>";
  }
  else if(isset($success_msg2))

  {

  echo "<span class='pull-right'style='color:green;' >$success_msg2 </span>";
  }



    ?>
<input type="text" value="<?php echo $catname;  ?>" class="form-control" id="category" placeholder="Category Name" Name="category2" style="width:100%;">
</div>
<input type='submit' name='submit2' value='Update Category' class="btn btn-primary">


</form>

<?php      }      ?>

    </div>

    <div class="col-lg-6 col-sm-12">

<?php

$disq="SELECT * FROM category ORDER BY id ";
$discc=mysqli_query($conn,$disq);

if(mysqli_num_rows($discc)>0)
{

?>


      <table class="table table-hover table-bordered table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Del</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while($disrow=mysqli_fetch_array($discc))
          {
            $discategory=$disrow['category'];
            $disid=$disrow['id'];

          ?>
          <tr>
            <th scope="row"><?php echo $disid;  ?></th>
            <td><?php    echo $discategory;      ?></td>
            <td><a href='category.php?cat="<?php echo $disid;    ?>"'><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td><a style='text-decoration:none;' href='category.php?del="<?php echo $disid;    ?>"'<i class="fa fa-times" aria-hidden="true"></i></a></td>
          </tr>
        <?php }  ?>

        </tbody>
      </table>

<?php   }


else
{

echo "<center><h2>No Category available</h2></center>";

}



 ?>

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
  </body>
</html>
