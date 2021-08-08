
<!--================ header =================-->
<?php

session_start();

$_SESSION["category_id"] = $_GET['v_id'];


include 'includes/header.php';
include 'redirectButtons_panel/redirectButtons_design.php';
?>
<!--================ view video  =================-->

<?php

if(isset($_GET['v_id'])) {

    $the_video_id = $_GET['v_id'];
}

$query="SELECT * FROM video WHERE video_id= $the_video_id";

$select_all_video_query=mysqli_query($con,$query);

while($row=mysqli_fetch_assoc( $select_all_video_query)) {
$video_title = $row['video_title'];
$video_name = $row['video_name'];
$video_content = $row['video_content'];
$video_datetime = $row['video_datetime'];




?>

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
            <div class="row mb-5 pb-4">
                <div class="col-12">
                    <!-- Video player 1422x800 -->
                    <video width="1422" height="800" controls autoplay>
                        <source src="video/<?php echo $video_name;  ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

                <div class="col-xl-12 col-2">
                    <div class="tm-video-description-box">
                        <h2 class="tm-video-title"><?php echo $video_title;  ?></h2>
                        <?php echo $video_content;  ?><br/> <br/>
                        <l class="fa fa-clock"> <?php echo $video_datetime ?> </l>
                    </div>
                </div>



            <?php  }  ?>

            <!--================comment  =================-->



            <div class="comments-area">
                <h1>Comments</h1>
               <!--= <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="desc">
                                <h5><a href="#">E</a></h5>
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
                </div>
                ====-->


                <!--================comment form  =================-->

                <div class="comment-form">
                    <h4>Comment here</h4>
                <form action="_comment.php" method="post">

                   <div class="comment-form">

                <div class="form-group">

                    <textarea  class="form-control" rows="5" cols="10" required name="comment" placeholder=""></textarea>

                    <button class="rBtn" type="submit">Comment</button>

                 </div>
                 <!--================ Displaying comments  =================-->
                   <?php 
                     include '_comment_display.php';
                    ?>
             </div>
        </form>
    </div>
</div>
        </main>
    </div>
</div>
</div>


    <!--================ Related video  =================-->
            <div class="row pt-4 pb-5">
                <div class="col-12">
                    <h2 class="mb-5 tm-text-primary">Related Videos for You</h2>
                    <div class="row tm-catalog-item-list">

                        <?php



                        $query="SELECT * FROM video";

                        $results_per_page = 3;
                        $result = mysqli_query($con,$query);
                        $number_of_results = mysqli_num_rows($result);

                        //to calculate number of pages required
                        $number_of_pages = ceil($number_of_results/$results_per_page);

                        //to find current page number
                        if(!isset($_GET['page']))
                        {
                            $page = 1;
                        }
                        else
                        {
                            $page = $_GET['page'];
                        }

                        //obtaining items required on the current page
                        //page_starting_limit_number is the position of the item in database from which each page will start displaying
                        //results_per_page is the number of items displayed per page
                        $page_starting_limit_number = ( $page - 1 ) * $results_per_page;
                        $query="SELECT * FROM video LIMIT ".$page_starting_limit_number.','.$results_per_page;
                        $result = mysqli_query($con,$query);

                        //displaying items
                        while($row = mysqli_fetch_array($result)) {
                        $video_id = $row['video_id'];
                        $video_title = $row['video_title'];
                        $video_name = $row['video_name'];
                        $video_content = $row['video_content'];
                        $video_tags = $row['video_tags'];
                            $video_datetime = $row['video_datetime'];
                        ?>



                        <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
                            <div class="position-relative tm-thumbnail-container">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <video src="video/<?php echo $video_name; ?>" ></video>
                                </div>
                                <a href="video-page.php?v_id=<?php echo $video_id ?>" class="position-absolute tm-img-overlay">
                                    <i class="fas fa-play tm-overlay-icon"></i>
                                </a>
                            </div>
                            <div class="p-4 tm-bg-gray tm-catalog-item-description">
                                <h3 class="tm-text-primary mb-3 tm-catalog-item-title"> <?php echo $video_title;  ?></h3>
                                <p class="tm-catalog-item-text"><?php echo $video_content;  ?></p><br/> <br/>
                                <l class="fa fa-clock"> <?php echo $video_datetime ?> </l>
                            </div>
                        </div>
                        <?php } ?>


                    </div>

                </div>


                           <div class="col d-inline-flex justify-content-lg-end" id="s_more" style="text-decoration: underline">
                            <a href="video_post.php"> See more </a>
                           </div>

            </div>



