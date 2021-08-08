<?php
session_start();

include 'includes/header.php';

include '..\admin_panel\Login_Admin_design2.php';
?>

<div id="wrapper">


    <?php
    include 'includes/navigation.php';
    ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                     <h5 class="hA"> 
                      <p class="name"> <?php echo $_SESSION["adminfn"]; echo ' '; echo $_SESSION["adminln"];?> </p>
                     </h5>

                    <?php
                    if(isset($_GET['source'])){
                        $source=$_GET['source'];
                    }else{
                        $source='';
                    }
                    switch($source){
                        case 'add_pdf';
                            include "includes/add_pdf.php";
                            break;

                        case 'edit_pdf';

                            include "includes/edit_pdf.php";
                            break;

                        default:
                            include 'includes/view_all_pdfs.php';
                            break;
                    }?>

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