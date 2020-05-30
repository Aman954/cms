<?php 
session_start();

if(!isset($_SESSION['username']))
{

  header("Location:signin.php");

  
}  

require_once('inc/top.php');  ?>
  </head>
  <body>
    
    <?php require_once('inc/nav.php');  ?>

    
  
    <div class="container-fluid">
<div class="row" style="margin-top:20px;">
  <div class="col-lg-3 col-md-12 col-sm-12">
    
    <?php require_once('inc/sidebar.php');  ?>

  
</div>
<div class="col-lg-9 col-md-12 col-sm-12">
  <i class="fa fa-2x fa-comments" aria-hidden="true" style="color:#2fa4e7;">&nbsp;Messages <small style="color:#495057;opacity:0.9;">All Messages</small></i>
<hr>
<ol class="breadcrumb">
  <li class="breadcrumb-item active"><i class="fa fa-tachometer" aria-hidden="true";>&nbsp;Dashboard</i>&nbsp;/&nbsp;<i class="fa fa-comments" aria-hidden="true">&nbsp;Messages</i></li>
</ol>

<form>
  <div class="form-group" style="float:left;margin-right:12px;">
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Search" style="width:auto;">
  </div>
</form>
<button type="button" name="button" class="btn btn-primary">
  Delete
</button>

<table class="table  table-hover" style="width:100%;">
  <thead>
    <tr>
      <th><input type="checkbox"></th>
      <th class="rio">S.no</th>
      <th class="rio">Name</th>
      <th class="fir" >Email</th>
      <th>Website</th>
      <th>Message</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="checkbox" name="" value=""></th>
      <th scope="row" class="rio">1</th>
      <td class="rio">Mark</td>
      <td class="fir">Otto@gmail.com</td>
      <td>modo.com</td>
      <td>
     <textarea name="name" style="height:40px;" >
     hello
     </textarea>

      </td>
    </tr>

    <tr>
      <th scope="row"><input type="checkbox" name="" value=""></th>
      <th scope="row" class="rio">1</th>
      <td class="rio">Mark</td>
      <td class="fir">Otto@gmail.com</td>
      <td>modo.com</td>
      <td>
     <textarea name="name" style="height:40px;" >
     hello
     </textarea>

      </td>
    </tr>

    <tr>
      <th scope="row"><input type="checkbox" name="" value=""></th>
      <th scope="row" class="rio">1</th>
      <td class="rio">Mark</td>
      <td class="fir">Otto@gmail.com</td>
      <td>modo.com</td>
      <td>
     <textarea name="name" style="height:40px;" >
     hello
     </textarea>

      </td>
    </tr>


    <tr>
      <th scope="row"><input type="checkbox" name="" value=""></th>
      <th scope="row" class="rio">1</th>
      <td class="rio">Mark</td>
      <td class="fir">Otto@gmail.com</td>
      <td>modo.com</td>
      <td>
     <textarea name="name" style="height:40px;" >
     hello
     </textarea>

      </td>
    </tr>


    <tr>
      <th scope="row"><input type="checkbox" name="" value=""></th>
      <th scope="row" class="rio">1</th>
      <td class="rio">Mark</td>
      <td class="fir">Otto@gmail.com</td>
      <td>modo.com</td>
      <td>
     <textarea name="name" style="height:40px;" >
     hello
     </textarea>

      </td>
    </tr>

    <tr>
      <th scope="row"><input type="checkbox" name="" value=""></th>
      <th scope="row" class="rio">1</th>
      <td class="rio">Mark</td>
      <td class="fir">Otto@gmail.com</td>
      <td>modo.com</td>
      <td>
     <textarea name="name" style="height:40px;" >
     hello
     </textarea>

      </td>
    </tr>

    <tr>
      <th scope="row"><input type="checkbox" name="" value=""></th>
      <th scope="row" class="rio">1</th>
      <td class="rio">Mark</td>
      <td class="fir">Otto@gmail.com</td>
      <td>modo.com</td>
      <td>
     <textarea name="name" style="height:40px;" >
     hello
     </textarea>

      </td>
    </tr>




  </tbody>
</table>


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
