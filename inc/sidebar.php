<div class='search gap2'>
  <form method='POST' action='index.php'>
  <div class="input-group">
     <input type="text" class="form-control" name='search' placeholder="Search for...">
     <span class="input-group-btn">
       <input class="btn btn-default" value='GO!' name='search-btn' type="submit" >
     </span>
   </div>
 </form>
</div>



<div class='search gap' style='margin-top:-10px;'>
<div class='popular'>
  <h3>Popular Posts<h3>

  <?php

$torr="SELECT * FROM post WHERE status='publish' ORDER BY views DESC LIMIT 5";
$scon=mysqli_query($conn,$torr);

if(mysqli_num_rows($scon)>0){

  while($srow=mysqli_fetch_array($scon))
  {
    $simage=$srow['image'];
    $stitle=$srow['title'];
    $sdate=getdate($srow['date']);
    $sday=$sdate['mday'];
    $smonth=$sdate['month'];
    $syear=$sdate['year'];
    $sid=$srow['id'];
?>

    <hr>

    <div class='row'>

      <div class='col-4'>
        <a href='post.php?post="<?php echo $sid; ?>" '><img src='images/<?php echo $simage;  ?>' alt='c'></a>
      </div>
      <div class='col-8 ku'>
      <a   style='color:darkcyan;font-family:serif;'  href='post.php?post="<?php echo $sid; ?>" '    >  <h6 class='hook'><?php echo $stitle;  ?></h6></a>
        <p class='mg'><i class='fa fa-clock-o' area-hidden='true'>&nbsp;</i><?php echo $sday." ".$smonth.",".$syear;  ?></p>
      </div>

    </div>


  <?php




  }






}

else
{

echo  '<hr><center><h6>No popular posts.</h6></center>';

}


?>






</div>
</div>








<div class='search gap'>
<div class='popular'>
  <h3>Recents Posts<h3>

  <?php

$torr="SELECT * FROM post WHERE status='publish' ORDER BY id DESC LIMIT 5";
$scon=mysqli_query($conn,$torr);

if(mysqli_num_rows($scon)>0){

  while($srow=mysqli_fetch_array($scon))
  {
    $simage=$srow['image'];
    $stitle=$srow['title'];
    $sdate=getdate($srow['date']);
    $sday=$sdate['mday'];
    $smonth=$sdate['month'];
    $syear=$sdate['year'];
    $sid=$srow['id'];
?>

    <hr>

    <div class='row'>

      <div class='col-4'>
        <a href='post.php?post="<?php echo $sid; ?>" '><img src='images/<?php echo $simage;  ?>' alt='c'></a>
      </div>
      <div class='col-8 ku'>
      <a   style='color:darkcyan;font-family:serif;'  href='post.php?post="<?php echo $sid; ?>" '>  <h6 class='hook'><?php echo $stitle;  ?></h6></a>
        <p class='mg'><i class='fa fa-clock-o' area-hidden='true'>&nbsp;</i><?php echo $sday." ".$smonth.",".$syear;  ?></p>
      </div>

    </div>


  <?php




  }






}

else
{

echo  '<hr><center><h6>No Recents posts.</h6></center>';

}


?>






</div>
</div>














 <div class='search gap'>
 <div class='popular'>
   <h3>Category<h3>
     <hr>
     <div class='row'>

     <?php
$cq="SELECT * FROM  category";
$ccon=mysqli_query($conn,$cq);

if(mysqli_num_rows($ccon)>0){
  $count=2;
  while($ccat=mysqli_fetch_array($ccon))
  {

    $catid=$ccat['id'];
    $cat=$ccat['category'];
    $count++;
    if($count%2!=0)
    {
?>
      <div class='col-6 ham' style='text-align:center;' >
        <a style='color:darkcyan;font-family:sans-serif;font-size: 16px;' href='index.php?cat="<?php echo $catid;  ?>"'><?php  echo $cat; ?></a><br>

      </div>
<?php
    }
    else
    {

  ?>
      <div class='col-6 ham'   style='text-align:center;'     >

        <a style='color:darkcyan;font-family:sans-serif;font-size: 16px;' href='index.php?cat="<?php echo $catid;  ?>"'><?php  echo $cat; ?></a><br>




      </div>

  <?php


    }

  }

}
else
{
echo '<center><h6>No categories<h6></center>';
}


?>



 </div>




 </div>
 </div>














 <div class='search gap'>
 <div class='popular'>
   <h3>Follow Us<h3>
     <hr>
 <div class='row'>

   <div class='col-4 re'>
     <a href="https://www.facebook.com/CodeTogether-105082267879690/"><img style='max-width:70px;max-height:70px;min-width:50px;min-height:50px;' src='images/fbs.png'  alt='c'></a>
   </div>
   <div class='col-4 re'>
    <a href=" https://www.instagram.com/codetogether7/ "> <img    style='max-width:70px;max-height:70px;min-width:50px;min-height:50px;'  src='images/insta.png' alt='c'></a>

   </div>
   <div class='col-4 re'>
     <a href="https://wa.me/8279779072"><img   style='max-width:70px;max-height:70px;min-width:50px;min-height:50px;'    src='images/whatsapp.png' alt='c'></a>

   </div>

 </div>


 <hr>


 <div class='row'>

   <div class='col-4 re'>
     <a href="mailto:amanaggarwal925@gmail.com"><img   style='max-width:70px;max-height:70px;min-width:50px;min-height:50px;'     src='images/mail.png ' alt='c'></a>
   </div>
   <div class='col-4 re'>
     <a href="https://www.tumblr.com/blog/codetogether"><img   style='max-width:70px;max-height:70px;min-width:50px;min-height:50px;'       src='images/tumbr.png' alt='c'></a>


   </div>
   <div class='col-4 re'>
     <a href="https://twitter.com/TogetherCode"><img    style='max-width:70px;max-height:70px;min-width:50px;min-height:50px;'       src='images/twitter.png' alt='c'></a>

   </div>

 </div>






















 </div>
 </div>

</div>





</div>

















 </div>





















</div>
