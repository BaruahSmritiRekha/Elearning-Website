<!--Checking if t0 show Admin Panel or not-->
<?php

  

  if(isset($_SESSION["usertype"]))
  {
    include 'admin_panel/Login_Admin_design.php';
    if($_SESSION["usertype"] == "Teacher")
     {
       echo '<div class="div1">
          <a href="admin"> <h5 class="ha1">Admin</h5></a>
       </div>';
     }else if($_SESSION["usertype"] == "Student")
     {
       echo '<div class="div1">
          <a href="admin"> <h5 class="ha1">Admin</h5></a>
       </div>';
     }
  }

?>
<!--================ header =================-->
<?php
include 'includes/header.php';
?>
    <!--================ navbar =================-->
<?php
include 'includes/navbar.php';


?>
    <!--================ Home =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                   online education service
                </p>

                <div>
                  <br/>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Feature =================-->
    <section class="feature_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Awesome Feature</h2>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-student"></span></div>
                <img height='30px' padding-left="30px" src="images/play.svg" alt="">
              <div class="desc">
                <h4 class="mt-3 mb-2"> Online Learning </h4>

              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-book"></span></div>
                <img height='30px' padding-left="30px" src="images/book.svg" alt="">
              <div class="desc">
                <h4 class="mt-3 mb-2">E-Book </h4>

              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-earth"></span></div>
                <img height='30px'src="images/instructor.svg" alt="">
              <div class="desc">
                <h4 class="mt-3 mb-2">Online Instructor</h4>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================Registration =================-->
    <div class="section_gap registration_area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="row clock_sec clockdiv" id="clockdiv">
              <div class="col-lg-12">
                  <div> </div>
                  <h1 class="mb-3"><a href="register.php"> Click Here To Register Now  <img height='60px' src="images/log-in.svg" alt=""></a></h1>


              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
<br/>
<br/>
    <!--================footer =================-->
    <?php
     include 'includes/footer.php';
     ?>
