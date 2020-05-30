
<?php
ob_start();
session_start();

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");


}

 require_once('inc/top.php'); 
 
 
 
 
 if(isset($_GET['post']))
 {
   
  $editid= $_GET['post'];
  if($_SESSION['role']=='Admin')
  {
  $selforupdate="SELECT * FROM post WHERE id='$editid'";
  }
  else if($_SESSION['role']=='Author')
  {    
    $ausername=$_SESSION['username'];
    $selforupdate="SELECT * FROM post WHERE id='$editid' and author='$ausername'";
  }
  $upcon=mysqli_query($conn,$selforupdate); 
  if(mysqli_num_rows($upcon)>0)
  {
    $updaterow=mysqli_fetch_array($upcon);
    $updateusername=$updaterow['author'];
    $uptitle=$updaterow['title'];
    $upcontent=$updaterow['post_data'];
    $upcontent=$updaterow['post_data'];
    $upimage=$updaterow['image'];
    $upcat=$updaterow['category'];
    $uptags=$updaterow['tags'];
    $upstatus=$updaterow['status'];

  
  }
  else
  {
    header('location:index.php');
  } 
   
 } 
 
 
 
 
 
 
 
 
 
 ?>


  </head>
  <body>
    <?php require_once('inc/nav.php'); ?>



    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">

    <?php require_once('inc/sidebar.php'); ?>



</div>
<div class="col-lg-9 col-md-12 col-sm-12">
  <i class="fa fa-2x fa-pencil" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Edit Post <small style="color:#495057;opacity:0.9;">&nbsp;Edit Your Post</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item "><i class="fa fa-tachometer" aria-hidden="true" >&nbsp;Dashboard</i></li>
  <li class="breadcrumb-item active"><i class="fa fa-pencil" aria-hidden="true";>&nbsp;Edit Post</i></li>

</ol>
<br>
<div class='row' style='margin-bottom:40px;'>

  <div class='col-12'>
<?php
if(isset($_SESSION['username']))
{

if(isset($_POST['submitpost']))
{

$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$postimagename=$_FILES['image']['name'];
$postimagetmp=$_FILES['image']['tmp_name'];
$postcategory=$_POST['category'];
$tags=mysqli_real_escape_string($conn,$_POST['tags']);
$poststatus=$_POST['status'];
$postdate=time();
if(empty($postimagename))
{
  $postimagename=$upimage;
}
if(empty($title) or empty($content) or empty($tags))
{

$error_msg="Please fill (*) required fields";

}


else{
  $authorname=$_SESSION['username'];

   $fetchaimage="SELECT * from users WHERE username='$authorname'";
   $imgcon=mysqli_query($conn,$fetchaimage);
   if(mysqli_num_rows($imgcon)>0)
   {
     $aimage=mysqli_fetch_array($imgcon);
     $arimage=$aimage['image'];
   }
$inspostq="UPDATE post SET title='$title',image='$postimagename',category='$postcategory',tags='$tags',post_data='$content'  WHERE id='$editid'";

$inscon=mysqli_query($conn,$inspostq);

if($inspostq)
{
  if(!empty($postimagename))
  {
    $path="images/$postimagename";
  if(move_uploaded_file($postimagetmp,$path))
  {
  copy($path,"../$path");
 }
}
  $success_msg="Your Post has been Updated!";
  header("refresh:0;url=editmainpost.php?post=$editid");

}
else{

  $error_msg="Something went wrong!";


}

}


}
}
?>


   <form method='POST' action='' enctype='multipart/form-data' >
     <div class='form-group'>
       <label for='title'>Post Title*</label>
       <?php
         if(isset($success_msg))
         {

          echo "<span class='pull-right' style='color:green'>$success_msg</span>";

         }
         else if(isset($error_msg))
         {

          echo "<span class='pull-right' style='color:green'>$error_msg</span>";

         }




        ?>
       <input type='text' name='title' placeholder='Post Title' class='form-control' value="<?php  if(isset($uptitle)){echo $uptitle;} ?>">
     </div>
     <div class='form-group'>
      <a class='btn btn-primary'  href='media.php'>Add Media</a>
     </div>
     <div class='form-group'>
       <label for='content'>Content*</label>
       <textarea name='content' class='form-control' rows='10' id='content' ><?php  if(isset($upcontent)){echo $upcontent;}?></textarea>
     </div>
     <div class='form-group'>

       <div class='row'>
       <div class='col-6' style='background:white;'>
         <label for='image'>Image*</label><br>
         <input type='file' name="image" class="image" >
       </div>
       <div class='col-6' style='background:white;padding-left:30px;padding-right:30px;' >
       <label for='category'>Category:</label>
       <select name='category' class='form-control'>
<?php

$catq="SELECT * FROM category ORDER BY id DESC";
$catcon=mysqli_query($conn,$catq);
if(mysqli_num_rows($catcon)>0)
{
  while($caterow=mysqli_fetch_array($catcon))
  {
    $catall=$caterow['category'];
 ?>
         <option value="<?php echo $catall;  ?>" <?php  if($catall===$upcat){  echo "selected";  }?>     ><?php  echo ucfirst($catall);     ?></option>

<?php     }   }

else{
  echo "<option>None</option>";
}

?>

       </select>
       </div>
       </div>
     </div>
     <div class='form-group'>
       <div class='row'>
       <div class='col-6' style='background:white;'>
       <label for='tags'>Tags*</label>
       <input type='text' name='tags' placeholder='eg:coding,travelling' class='form-control' value="<?php  if(isset($uptags)){echo $uptags;}  ?>">
       </div>
       <div class='col-6' style='background:white;padding-left:30px;padding-right:30px;' >
       <label for='status'>Status:</label>
       <select name='status' class='form-control'>
         <option value='draft' <?php  if(isset($upstatus) and $upstatus==='draft'){echo "selected";}    ?> >Draft</option>
         <option value='publish' <?php  if(isset($upstatus) and $upstatus==='publish'){echo "selected";}    ?>>Publish</option>
       </select>
       </div>
       </div>
     </div>
     <input type='submit' class='btn btn-primary' value='Edit Post' name='submitpost'>

   </form>


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
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>


<script>


tinymce.init({
  selector: 'textarea#content',
  height: 300,
  branding: false,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ],
  <?php
  $disquery="SELECT * FROM media ORDER BY id DESC";
  $displaycon=mysqli_query($conn,$disquery);
  if(mysqli_num_rows($displaycon)>0)
  {
  ?>
  image_list: [
      <?php
      while($imrow=mysqli_fetch_array($displaycon))
      {
        $imgs=$imrow['image'];
      ?>
    {title: '<?php echo $imgs;    ?>', value: 'media/<?php echo $imgs; ?>'},
    <?php  }   ?>
  ]
  <?php  }   ?>
 });





</script>








  </body>
</html>
