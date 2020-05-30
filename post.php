

<?php require_once('inc/top2.php'); ?>
  </head>
  <body>


<div class='container-fluid resize'>

<?php  require_once('inc/nav.php');


if(isset($_GET['post']))
{

$pid= $_GET['post'];

$views_no="UPDATE post SET views=views+1 WHERE id=$pid";
mysqli_query($conn,$views_no);
$pquery="SELECT * FROM post WHERE status='publish' and id=$pid";
$p_con=mysqli_query($conn,$pquery);
if(mysqli_num_rows($p_con))
{
$catch_row=mysqli_fetch_array($p_con);
$pt_id= $catch_row['id'];
$pt_date= getdate($catch_row['date']);
$pday=$pt_date['mday'];
$pmonth=$pt_date['month'];
$pyear=$pt_date['year'];
$pt_title= $catch_row['title'];
$pt_author= $catch_row['author'];
$pt_author_image= $catch_row['author_image'];
$pt_image= $catch_row['image'];
$pt_cat= $catch_row['category'];
$pt_tags= $catch_row['tags'];
$pt_data= $catch_row['post_data'];
$pt_views= $catch_row['views'];
$pt_status= $catch_row['status'];

}

else
{
header('Location:index.php');
}


}

 ?>

 <div class='container-fluid'>

<div class="row" style='margin-top:40px;'>
  <div class="col-sm-12 col-lg-6">
<div class="animated fadeInLeft til" style=''>

<h1 class='show' style="color:white;font-family: 'Luckiest Guy', cursive;font-family: 'Rubik Mono One', sans-serif;font-family: 'Faster One', cursive;

font-size:60px;height:50px;font-family: 'Oswald', sans-serif;padding-left:0px;margin-left:0px;

">top<span style='color:blue;'>Explore!</span></h1>
<h1 style="color:white;font-size:20px;font-family:sans-serif;margin-top:20px;padding-left:0px;margin-left:0px;"  class='show'  >Fun with Blogs </h1>


  </div>

<br>

<div class='container-fluid kol'>


<h1 class="display-3 yu show" style='color:white;'>Code<br> <span style="color:blue;" class='yu' ">Together</span></h1>
<h5 class='new  show'>Connecting with us and improve your <br>Knowledge or gain some Knowledge.</h5>

</div>
<br>












      </div>









<div class="col-sm-12 col-lg-6  select"   >






  <h1 class='show' style="color:white;font-family: 'Luckiest Guy', cursive;font-family: 'Rubik Mono One', sans-serif;font-family: 'Faster One', cursive;

  font-size:60px;height:50px;font-family: 'Oswald', sans-serif;

  ">#New<span style='color:blue;'>&nbsp;Posts</span></h1>








<br><br>





<div id="accordion">
  <div class="card ok tr" >
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link pi" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus-square" aria-hidden="true">&nbsp;</i>
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body tr">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card ok tr">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed pi" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fa fa-plus-square" aria-hidden="true">&nbsp;</i>Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body tr">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card ok  tr">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed pi" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <i class="fa fa-plus-square" aria-hidden="true">&nbsp;</i>Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body tr">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>




















</div>





</diV>


<br><br>

<div class='container-fluid arrow-bounce' style='text-align:center;margin-left:auto;margin-right:auto;'>
<i class="fa fa-angle-double-down fa-2x bounce" aria-hidden="true" style='color:white;' ></i>
</div>






</div>
</div>
<br><br><br>
<section>
<div class='container-fluid her'  >
<div class='row'>
  <div class='col-lg-8'>




    <div class='post'>

     <div class='row'>
     <div class='col-sm-2 fix-3'>
       <div class='date'>
         <?php echo $pday;   ?>
       </div>
       <div class='month'>
         <?php echo $pmonth;   ?>
       </div>
       <div class='year'>
         <?php echo $pyear;   ?>
       </div>
     </div>

     <div class='col-sm-8 fix-2' >
    <a href='post.php?post=<?php echo $pid;    ?>' style='text-decoration:none;text-decoration-color:pink;'><h2 class='heading'><?php  echo $pt_title;    ?></h2></a>
    <p class='merging'>Written by:<span class='up'><a href='#' style='color:green;'><?php  echo $pt_author;    ?></span></a></p>
     </div>

     <div class='col-sm-2 voot'>
       <img src='images/<?php  echo $pt_author_image;    ?>' alt='writer' class='rounded-circle fix fixed'>

     </div>



     </div>

<div class='container-fluid' style='padding-left:1px;padding-right:0px'>


    <a href='images/<?php  echo $pt_image;    ?>'><img src='images/<?php  echo $pt_image;    ?>' alt='post' class='' style='width:100%;' ></a>
  </div>
    
    <div class='join' style='padding:20px;'>


    <?php  echo $pt_data;    ?>



  </div>



    <div class='pad'>
    <span class='change-1'><i class='fa fa-folder' style='color:grey;' area-hidden='true'>&nbsp;</i><a href='#' style='color:grey;'><?php  echo $pt_cat;    ?></a>&nbsp;&nbsp;&nbsp;|</span><span class='change-2'><i class='fa fa-comment' area-hidden='true' style='color:grey;'>&nbsp;</i><a href="#comments" id='down' style='color:grey;'>Comments</a></span>
    </div>
    </div>



<?php

$rquery="SELECT * FROM post WHERE status='publish' AND category LIKE '%$pt_cat%' LIMIT 3 ";
$rcon=mysqli_query($conn,$rquery);
if(mysqli_num_rows($rcon)>0)
{
?>

<div class='related-post'>

<h3>Related Posts</h3><hr>
<div class='row'>
<?php
while($rrow=mysqli_fetch_array($rcon))
{
$rimage=$rrow['image'];
$rtitle=$rrow['title'];
$rid=$rrow['id'];
?>
<div class='col-sm-4 chem'>
<a href='post.php?post=<?php echo $rid; ?>'> <img src="images/<?php echo $rimage;   ?>" alt="1">
<h5><?php echo $rtitle;     ?></h5></a>
  </div>
<?php    }         ?>


  </div>


  </div>

<?php    }   ?>


<?php

$fq="SELECT * FROM users WHERE username='$pt_author'";
$fqcon=mysqli_query($conn,$fq);
if(mysqli_num_rows($fqcon)>0)
{
  $cc=mysqli_fetch_array($fqcon);
  $adetails=$cc['details'];
?>
<div class='author'>
  <h3>About Author</h3><hr>
  <div class='row'>
    <div class='col-lg-3 rem'>
      <img src='images/<?php echo $pt_author_image;    ?>' alt='profile' class='rounded-circle'>

      </div>
      <div class='col-lg-9'>
        <h4><?php  echo ucfirst($pt_author);  ?></h4>
        <p>

         <?php   echo $adetails;            ?>

        </p>
        </div>
    </div>
  </div>
<?php  }  ?>

<?php

$comment="SELECT * FROM comments where status='approved' and post_id=$pid ORDER BY id DESC";
$comment_con=mysqli_query($conn,$comment);

if(mysqli_num_rows($comment_con)>0)
{

?>

  <div class='comments' id='comments'>
    <h3 >Comments</h3>

<?php


while($comm_row=mysqli_fetch_array($comment_con))
         {

          $comm_id=$comm_row['id'];
          $comm_username=$comm_row['username'];
          $comm_name=$comm_row['name'];
          $comm_date=$comm_row['date'];
          $comm_post_id=$comm_row['post_id'];
          $comm_mail=$comm_row['email'];
          $comm_website=$comm_row['website'];
          $comm_image=$comm_row['image'];
          $comm_comment=$comm_row['comment'];




  ?>

  <hr>

    <div class='row'>

      <div class='col-lg-2 rem'>
        <img src='images/<?php   echo $comm_image;   ?>' alt='profile' class='rounded-circle'>

        </div>
        <div class='col-lg-10'>
          <h4><?php  echo $comm_name;     ?></h4>
          <p>

<?php    echo $comm_comment;                        ?>
          </p>
          </div>
      </div>
    <?php         }            ?>

    </div>

<?php                }       ?>








<div class='commentarea back'>

  <?php

if(isset($_POST['submit']))
{

$full_name=$_POST['full_name'];
$mail=$_POST['email'];
$website=$_POST['website'];
$text_area=$_POST['textarea'];
$date=time();
$id_no=$pt_id;
if(empty($full_name)||empty($mail)||empty($text_area))
{

$error_msg="All (*) fields are required.";

}

else {

$ins_query="INSERT INTO comments(date,name,username,post_id,email,website,image,comment,status) VALUES ('$date','$full_name','$mail','$id_no','$mail','$website','guru.png','$text_area','pending')";
$ins_conn=mysqli_query($conn,$ins_query);
if($ins_conn)
{
  $full_name="";
  $mail="";
  $website="";
  $text_area="";

$success_msg="your comment is submitted waiting for approval";
}
else {
  $error_msg="comment is not submitted.";

}


}


}


  ?>


  <form class='recheck' action='' method='POST'>

  <div class='form-group' style=''>
    <label for='fullName' class='size' >*Full Name:</label>
    <input value='<?php if(isset($full_name)){echo $full_name; } ?>'    type="text" id='fullName' name='full_name' class='form-control'>
    </div>
    <div class='form-group' >
      <label for='mail' class='size' >*E-Mail:</label>
      <input type="text" value='<?php if(isset($mail)){echo $mail; } ?>'     id='mail' class='form-control' name='email'>
      </div>
      <div class='form-group'>
        <label for='website' class='size' >Website:</label>
        <input type="text" id='website'   value='<?php if(isset($website)){echo $website; } ?>'         name='website' class='form-control'>
        </div>
        <div class='form-group'>
          <label for='message' class='size'>*Message:</label>
          <textarea type="text" value='<?php if(isset($text_area)){echo $text_area; } ?>' name='textarea' rows='7' cols='7'  id='message' class='form-control hoop' placeholder='Your Message is here..' style='resize:none;'></textarea>
          </div>

<input type="submit" name="submit" value="Post Comment" class='btn btn-primary'>
<?php
if(isset($error_msg))
{
?>
<span class='pull-right'><?php echo $error_msg;   ?></span>
<?php   }
else if(isset($success_msg))
{

  ?>
  <span class='pull-right'><?php echo $success_msg;   ?></span>

<?php }       ?>

</form>









  </div>


















  </div>





  <div class='col-lg-4'>

<?php  require_once('inc/sidebar.php'); ?>













</div>














</section>
























<br><br>





<?php require_once('inc/footer.php');  ?>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  
  <script>
    location.href = "#comments"; 

  </script>







  </body>
</html>
