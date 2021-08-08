

<!--================ header =================-->
<?php

session_start();

$_SESSION["category_id"] = $_GET['pdf_id'];

include 'includes/header.php';
include 'redirectButtons_panel/redirectButtons_design.php';
?>
<!--================view pdf =================-->
<div id="tm-fixed-header-bg">

    <!-- Page content -->
    <div class="container-fluid">
        <div class="mx-auto tm-content-container">

        <!--================ Home Button ==-->
        <form  action="redirect_pages/home.php" method="post">
         <button  class="rBtn" type="submit">Home</button>
        </form>
        <br>

            <main>

                <?php

                if(isset($_GET['pdf_id'])) {

                    $the_pdf_id = $_GET['pdf_id'];
                }

                $query="SELECT * FROM pdf WHERE pdf_id= $the_pdf_id ";

                $select_all_pdf_query=mysqli_query($con,$query);

                while($row=mysqli_fetch_assoc( $select_all_pdf_query)) {
                $pdf_title = $row['pdf_title'];
                $pdf_name = $row['pdf_name'];
                    $pdf_datetime = $row['pdf_datetime'];

                ?>


                <div class="row mb-5 pb-4">
                    <div class="col-12">
                        <l class="fa fa-clock"> <?php echo $pdf_datetime ?> </l>
                        <div class='embed-responsive' style='padding-bottom:150%'>
                            <object data="pdfs/<?php echo $pdf_name;?>"  width='100%' height='100%'></object>

                        </div>
                    </div>
                </div>

<?php }?>

            </main>



            <!--================comment  =================-->



            <div class="comments-area">
                <h1>Comments</h1>
               <!--= <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="desc">
                                <h5><a href="#">Em</a></h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                <p class="comment">
                                    Never say goodbye
                                </p>
                            </div>
                        </div>
                        <div class="reply-btn">
                            <a href="" class="btn-reply text-uppercase">reply</a>
                        </div>
                    </div>
                </div>
                <div class="comment-list left-padding">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="desc">
                                <h5><a href="#">El</a></h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                <p class="comment">
                                    Never say goodbye
                                </p>
                            </div>
                        </div>
                        <div class="reply-btn">
                            <a href="" class="btn-reply text-uppercase">reply</a>
                        </div>
                    </div>
                </div>=-->


                <!--================comment form  =================-->

                <div class="comment-form">
                    <h4>Comment here</h4>
                    <form action="_comment.php" method="post">

                        <div class="comment-form" >

                            <div class="form-group">

                                <textarea class="form-control" rows="5" cols="10" required name="comment" placeholder=""></textarea>
                                <button class="rBtn" type="submit">Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                 <?php 
                    include '_comment_display.php';
                 ?>
            </div>
            </main>
        </div>
    </div>
</div>










