<?php require_once('inc/top2.php'); ?>

  </head>
  <body>


<div class='container-fluid resize'>

        <div class='container' style='padding:0px;'>
  <?php require_once('inc/nav.php');

if(isset($_GET['page']))
{
 $page_no=$_GET['page'];
}
else {
  $page_no=1;

}

if(isset($_GET['cat']))
{
  $cat_id=$_GET['cat'];
  $catsel="SELECT * FROM category WHERE id=$cat_id";
 $cat_query=mysqli_query($conn,$catsel);
$cat_row=mysqli_fetch_array($cat_query);
  $cat_name=$cat_row['category'];
}




 $no_of_post=3;
if(isset($_POST['search-btn']))
{
    $collect=$_POST['search'];
  $pg="SELECT * FROM POST WHERE status='publish'";
    $pg.="and tags LIKE '%$collect%'";
  $pgcon=mysqli_query($conn,$pg);
  $post_no=mysqli_num_rows($pgcon);
  $total_pages=ceil($post_no/$no_of_post);

  $start_from=($page_no-1)*$no_of_post;

}
 else{
 $pg="SELECT * FROM POST WHERE status='publish'";
 if(isset($cat_name))
 {
   $pg.="and category='$cat_name'";
 }
 $pgcon=mysqli_query($conn,$pg);
 $post_no=mysqli_num_rows($pgcon);
 $total_pages=ceil($post_no/$no_of_post);

$start_from=($page_no-1)*$no_of_post;
}
  ?>
  



      
      

        <h2 class='show' style="color:white;font-family: 'Luckiest Guy', cursive;font-family: 'Rubik Mono One', sans-serif;font-family: 'Faster One', cursive;
        
        font-size:60px;height:50px;font-family: 'Oswald', sans-serif;margin-top:50px;
        
        ">top<span style='color:violet;'>Explore!</span></h1>
        <h1 class='show' style="color:white;font-size:20px;font-family:sans-serif;margin-top:20px;text-shadow:0px;
        
        "    >Fun with Blogs </h2>
      </div>
        
          
        <div class="row again" style='margin-top:40px'>
          <div class="col-sm-12 col-lg-6 il" >


  
  
  
  


  <div class='container-fluid' style='padding:0px;'>

  




<br>

<div class='container-fluid kol'>


<h1 class="display-3 yu show" style='color:white;padding-left:0px;margin-left:0px;'>Code<br> <span style="color:blue;" class='yu' ">Together</span></h1>
<h5 style='padding-left:0px;margin-left:0px;' class='new  show'>Connecting with us and improve your <br>Knowledge or gain some Knowledge.</h5>

</div>
<br>












      </div>









<div class="col-sm-12 col-lg-6  select"   >






  <h1 class='show' style="color:white;font-family: 'Luckiest Guy', cursive;font-family: 'Rubik Mono One', sans-serif;font-family: 'Faster One', cursive;

  font-size:60px;height:50px;font-family: 'Oswald', sans-serif;

  ">#New<span style='color:blue;'>&nbsp;Posts</span></h1>








<br><br>


<?php

$tq="SELECT * FROM post where status='publish' ORDER BY id DESC  LIMIT 3";
$tcon=mysqli_query($conn,$tq);
if(mysqli_num_rows($tcon)>0)
{

  ?>



  <div id="accordion">
    <?php
    while($trow=mysqli_fetch_array($tcon))
    {
      $ttitle=$trow['title'];
      $tdata=$trow['post_data'];
      $tid=$trow['id'];

  ?>

    <div class="card ok tr" >
      <div class="card-header" id="<?php echo $tid;   ?>">
        <h5 class="mb-0">
          <button class="btn btn-link pi" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-caret-square-o-down" aria-hidden="true">&nbsp;</i>

          <a style='color:white' href='index.php?post=" <?php  echo $tid;     ?>"'>  <?php  echo $ttitle;     ?></a>
          </button>
        </h5>
      </div>


    </div>
  <?php    }?>


  </div>



<?php
}
else
{
  echo '<center><h4>No New posts</h4></center>';
}

?>




















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
<div class='container-fluid her'>
<div class='row'>
  <div class='col-lg-8'>


    <?php

      $u="SELECT * from post where status='publish' ORDER BY id DESC LIMIT 3";
       $con3=mysqli_query($conn,$u);
        $check=mysqli_num_rows($con3);


        if($check>0)
        {

?>



    <div id="Indicators" style='margin-bottom:40px;' class="carousel slide" data-ride="carousel" style="box-shadow: 0.5px 0.5px 0.2px 0.2px rgba(48, 49, 51,0.2);border:1px solid pink;">
      <ol class="carousel-indicators">





      <?php
for($a=0;$a<$check;$a++)
{
  if($a===0){
        echo "<li data-target='#Indicators'  data-slide-to='".$a."' class='active'></li>";
      }
      else
      {
        echo "<li data-target='#Indicators' data-slide-to='".$a."'></li>";

      }
}


    ?>
      </ol>
      <div class="carousel-inner" >

        <?php
        $check=0;

        while($row_slider=mysqli_fetch_array($con3))
        {

          $slider_img=$row_slider['image'];
          $slider_title=$row_slider['title'];
          $slider_id=$row_slider['id'];
          $check++;
         if($check===1)
         {

           echo '<div class="carousel-item active" >';
         } 
           else
           {
             echo '<div class="carousel-item"  >';

         }
          ?>

        <a href='post.php?post="<?php  echo $slider_id; ?>"'>  <img class="d-block w-100 slideimg"  src="images/<?php echo $slider_img;  ?>" alt="slide"></a>
          <div class="carousel-caption d-none d-md-block" >
            <div>
            <h2 style="color:white;font-family: 'Tangerine', serif;
  font-size: 24px;word-spacing:3px;
  font-family: cursive;text-shadow:4px 4px 4px black;"><?php  echo $slider_title;  ?></h3></div>
  </div>
        </div>

      <?php        }     ?>

      </div>
      <a class="carousel-control-prev" href="#Indicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#Indicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<?php }  ?>

<?php

if(isset($_POST['search-btn']))
{
  $collect=$_POST['search'];
  $r="SELECT * FROM post where status='publish'";

  $r.="and tags LIKE '%$collect%' ";
  $r.="ORDER BY id DESC LIMIT $start_from,$no_of_post ";




}

else{
$r="SELECT * FROM post where status='publish'";
if(isset($cat_name))
{
  $r.="and category='$cat_name' ";
}
$r.="ORDER BY id DESC LIMIT $start_from,$no_of_post ";

}
$con2=mysqli_query($conn,$r);
if(mysqli_num_rows($con2)>0)
{
  while($row_post=mysqli_fetch_array($con2))
  {

    $date=getdate($row_post['date']);
    $day=$date['mday'];
    $month=$date['month'];
    $year=$date['year'];
    $title=$row_post['title'];
    $author=$row_post['author'];
    $author_img=$row_post['author_image'];
    $image=$row_post['image'];
    $post_data=$row_post['post_data'];
    $post_id=$row_post['id'];
    $post_category=$row_post['category'];


    ?>

    <div class='post'>

     <div class='row'>
     <div class='col-sm-2 fix-3'>
       <div class='date'>
         <?php   echo $day;    ?>
       </div>
       <div class='month'>
         <?php   echo $month;    ?>
       </div>
       <div class='year'>
         <?php   echo $year;    ?>
       </div>
     </div>

     <div class='col-sm-8 fix-2'>
    <a href='#' style='text-decoration:none;text-decoration-color:pink;'><h2 class='heading'><?php echo $title;   ?></h2></a>
    <p class='merging'>Written by:<span class='up'><a href='#' style='color:green;'><?php echo $author;   ?></span></a></p>
     </div>

     <div class='col-sm-2 voot'>
       <img src='images/<?php echo $author_img;       ?>' alt='writer' class='rounded-circle fix fixed'>

     </div>



     </div>


<div class='container-fluid' style='padding-left:1px;padding-right:0px;'>
    <a href='index.php?post="<?php echo $post_id;  ?>"'><img src='images/<?php  echo $image;     ?>' alt='post' class='' style='max-height:100%;width:100%;'></a>
  </div>
    <div class='join' style='padding:15px;'>
    <?php  echo substr($post_data,0,400).'....';  ?>


   </div>


    <a href='post.php?post=<?php echo $post_id; ?>' class='btn btn-primary checkpost'>Learn More..</a>

    <div class='pad'>
    <span class='change-1'><i class='fa fa-folder' style='color:grey;' area-hidden='true'>&nbsp;</i><a href='#' style='color:grey;'><?php echo $post_category;   ?></a>&nbsp;&nbsp;&nbsp;|</span><span class='change-2'><i class='fa fa-comment' area-hidden='true' style='color:grey;'>&nbsp;</i><a href='post.php?post="<?php echo $post_id;  ?>"#comments' style='color:grey;'>Comments</a></span>
    </div>
    </div>


  <?php

  }

}
else
{
  echo "<center><h3>No Post Available</h3></center>";
}

?>








<nav aria-label="Page navigation example" style='margin-bottom:50px;' class='diffrent' >
  <ul class="pagination justify-content-center">

    <?php

     for($i=1;$i<=$total_pages;$i++)
     {
        echo '    <li class="'.($page_no==$i? "active":" ").' page-item"  ><a class="page-link" href="index.php?page='.$i."&".(isset($cat_name)?"cat=$cat_id":"").'   ">'.$i.'</a></li>';

     }

    ?>


  </ul>
</nav>



















  </div>





 <div class='col-lg-4'>


   <?php require_once('inc/sidebar.php'); ?>










</div>














</section>
























<br><br>



<?php require_once('inc/footer.php'); ?>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
