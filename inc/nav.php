<div class="d-flex flex-row-reverse bd-highlight" >
  <div class="p-2 bd-highlight ">

 <a href="https://www.facebook.com/CodeTogether-105082267879690/"><img src='images/fbs.png' alt='img' style='width:30px;height:30px;'></a>

  </div>

  <div class="p-2 bd-highlight ">

<a href=" https://www.instagram.com/codetogether7/ ">    <img src='images/insta.png' alt='img' style='width:30px;height:30px;'></a>


  </div>

  <div class="p-2 bd-highlight ">

  <a href="mailto:amanaggarwal925@gmail.com">  <img src='images/mail.png' alt='img' style='width:27px;height:27px;'></a>

  </div>


  <div class="p-2 bd-highlight ">

  <a href="https://twitter.com/TogetherCode">  <img src='images/twitter.png' alt='img' style='width:30px;height:30px;'></a>


  </div>

</div>


      <div class="d-flex flex-row-reverse bd-highlight" style='' >
        <div class="p-2 bd-highlight item show2 active "   ><a href='contactUs.php' style='text-decoration:none;color:aqua;'>CONTACT US</a></div>
        <div class="p-2 bd-highlight  item  show2 "       >CATEGORY


            <i class="fa fa-caret-down "  id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            </i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='text-shadow:0px 0px 0px black;background:rgba(211,209,214,0.5);color:white;'>
              <?php
              $q="SELECT * FROM category ORDER BY id DESC";
              $con=mysqli_query($conn,$q);
              if(mysqli_num_rows($con)>0)
              {
                while($row=mysqli_fetch_array($con))
                {
                  echo '<a class="dropdown-item" href="index.php?cat='.$row['id'].'">'.$row['category'].'</a>';
                }
              }
              else
              {
                echo '<a class="dropdown-item" href="#">No Category</a>';

              }
              ?>
            
            
            </div>










        </div>
      
        <div class="p-2 bd-highlight  item  show2 "    ><a href='index.php' style='text-decoration:none;color:aqua;'>HOME</a></div>
      </div>
