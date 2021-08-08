<!--================ header =================-->
<?php

session_start();

$_SESSION["category_id"] = $_GET['p_id'];

include 'includes/header.php';
include 'redirectButtons_panel/redirectButtons_design.php';

?>
<!--================view image  =================-->
<div id="tm-fixed-header-bg">
    <div class="container-fluid">
        <div class="mx-auto tm-content-container">

        <!--================ Home Button ==-->
        <form  action="redirect_pages/home.php" method="post">
         <button  class="rBtn" type="submit">Home</button>
        </form>
        <br>


            <main>

                <?php

                if(isset($_GET['p_id'])) {

                    $the_image_id = $_GET['p_id'];
                }


                $query="SELECT * FROM image WHERE image_id= $the_image_id";

                $select_all_image_query=mysqli_query($con,$query);


                while($row=mysqli_fetch_assoc($select_all_image_query)) {
                $image_title = $row['image_title'];
                $image_content=$row['image_content'];
                $image_name =$row['image_name'];
                $image_datetime =$row['image_datetime'];


                ?>



                <div class="row mb-5 pb-4">
                    <div class="col-12">
                        <img src="images/<?php echo $image_name ?>" alt="" class="img-fluid tm-catalog-item-img">
                    </div>
                </div>

                <div class="col-xl-12 col-2">
                    <div class="tm-video-description-box">
                        <h2 class="tm-video-title"><?php echo $image_title ?></h2>
                        <?php echo $image_content ?><br/><br/>
                        <l class="fa fa-clock"> <?php echo $image_datetime ?> </l>
                    </div>

                </div>

            </main>
            <?php }?>



                <!--================  comment  =================-->



                <div class="comments-area">
                    <h1>Comments</h1>
                    <!--== <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="" alt="">
                                </div>
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
                                <div class="thumb">
                                    <img src="" alt="">
                                </div>
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
                    </div> =-->
                    

                    <!--================ comment form  =================-->

                    <div class="comment-form">
                        <h4>Comment Here</h4>
                        <form action="_comment.php" method="post">

                            <div class="comment-form">

                                <div class="form-group">

                                     <textarea  class="form-control" rows="5" cols="10" required name="comment" placeholder=""></textarea>
                                        
                                     <button class="rBtn" type="submit">Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--================ Displaying comments  =================-->
                   <?php 
                     include '_comment_display.php';
                    ?>
                </div>
        </div>
    </div>
</div>

<!--================ Related posts  =================-->
<div class="row pt-4 pb-5">
    <div class="col-12">
        <h2 class="mb-5 tm-text-primary">Related posts for You</h2>
        <div class="row tm-catalog-item-list">
<div class="row tm-catalog-item-list">
<?php
    $query="SELECT * FROM image ";



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
$query="SELECT * FROM image LIMIT ".$page_starting_limit_number.','.$results_per_page;
$result = mysqli_query($con,$query);

//displaying items
while($row = mysqli_fetch_array($result)) {
    $image_id = $row['image_id'];
    $image_title = $row['image_title'];
    $image_name = $row['image_name'];
    $image_content = $row['image_content'];
    $image_datetime = $row['image_datetime'];

    ?>


    <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
        <div class="position-relative ">
            <img src="images/<?php echo $image_name ?>"" alt="Image" class="img-fluid tm-catalog-item-img">
        </div>
        <div class="p-4 tm-bg-gray tm-catalog-item-description">
            <h3 class="tm-text mb-3 tm-catalog-item-title"><a href="image-page.php?p_id=<?php echo $image_id ?>"> <?php echo $image_title ?></a></h3>
            <p class="tm-catalog-item-text"><?php echo $image_content ?></p>
            <a href="image-page.php?p_id=<?php echo $image_id ?>" class="blog_btn">OPEN</a><br/> <br/>
            <l class="fa fa-clock"> <?php echo $image_datetime ?> </l>
        </div>
    </div>
<?php } ?>
</div>

    <div class="col d-inline-flex justify-content-lg-end" id="s_more" style="text-decoration: underline">
        <a href="image_posts.php"> See more </a>
    </div>










