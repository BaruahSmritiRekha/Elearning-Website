<?php
  session_start();

  include 'includes/header.php';

  include '..\admin_panel\Login_Admin_design2.php';
?>


    <div id="wrapper">


        <?php

        if($_SESSION["usertype"] == "Teacher")
        {
         include 'includes/navigation.php';
        }
        else if($_SESSION["usertype"] == "Student")
        {
         include 'includes/navigation2.php';
        }
        
        ?>
        <div id="page-wrapper" >

            <div class="container-fluid" id="divMain">

                <!-- Page Heading -->
                <div class="row" >
                    <div class="col-lg-12" >
                    <!-- -LoggedIn Admin Info-->
      
                     <h5 class="hA"> 
                     Name   <p class="pA">---</p>  <p class="name"> <?php echo $_SESSION["adminfn"]; echo ' '; echo $_SESSION["adminln"];?> </p> <br><br>
                     Email  <p class="pA">---</p>  <p class="name">  <?php echo $_SESSION["adminemail"]; echo '</br>'?> </p> <br><br>
                     Branch <p class="pA">---</p>  <p class="name">  <?php echo $_SESSION["adminbr"];?> </p> 
                     </h5>                     

                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php
include 'includes/footer.php';
?>