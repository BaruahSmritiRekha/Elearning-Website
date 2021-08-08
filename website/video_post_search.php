
<!--================ header =================-->
<?php
session_start();
include 'includes/header.php';
?>

<!--================ navbar =================-->
<?php
include 'includes/navbar.php';
?>

<!--================ search =================-->
<form action="video_post_search.php" method="POST">

    <section class="course_details_area section_gap">

        <div class="col-lg-3,justify-content-between" id="d_bar">
            <div class="col-lg-4 course_details">

                <input type="text" class="form-control" placeholder="Search" name="search">

                <button name="submit"  class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>

            </div>


        </div>


    </section>
</form>

<!--================ video =================-->

    <div class="tm-page-wrap mx-auto">
        <div class="container-fluid">


            <div id="content" class="mx-auto tm-content-container">

                <main>
                    <div class="row tm-catalog-item-list">





    <!--php-->
                        <?php



                        if(isset($_POST['submit'])){
                        $search=$_POST['search'];
                        $_SESSION['search']=$search;
                        $query="SELECT * FROM video where  video_tags LIKE '%$search%'";
                        $search_query=mysqli_query($con,$query);
                        if(!$search_query){
                            die("Query failed".mysqli_error($con));
                        }
                        $count=mysqli_num_rows($search_query);
                        if ($count==0){
                            echo "<h1>no result</h1>";
                        }else{

                        $results_per_page = 6;

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
        $query="SELECT * FROM video where video_tags LIKE '%$search%' LIMIT ".$page_starting_limit_number.','.$results_per_page;
        $result = mysqli_query($con,$query);
        //displaying items
        while($row = mysqli_fetch_array($result))  {
            $video_id = $row['video_id'];
    $video_title = $row['video_title'];
    $video_name = $row['video_name'];
    $video_content = $row['video_content'];
    $video_tags = $row['video_tags'];
            $video_datetime = $row['video_datetime'];





            ?>

            <div class="col-lg-4 col-md-6 col-sm-12  tm-catalog-item">

                <div class="position-relative tm-thumbnail-container">

                    <div class="embed-responsive embed-responsive-16by9">
                        <video src="video/<?php echo $video_name; ?>" ></video>
                    </div>
                    <a href="video-page.php?v_id=<?php echo $video_id ?>" class="position-absolute tm-img-overlay">
                        <i class="fas fa-play tm-overlay-icon"></i>
                    </a>
                </div>
                <div class="p-4 tm-bg-gray tm-catalog-item-description">
                    <h3 class="tm-text-primary mb-3 tm-catalog-item-title"><?php echo $video_title;  ?></h3>
                    <p class="tm-catalog-item-text"><?php echo $video_content;  ?></p>
                    <l class="fa fa-clock"> <?php echo $video_datetime ?> </l>
                </div>

            </div>


                    <?php } ?>

                </div>


            </main>


        <!--================pagination =================-->


    <div class="container">
        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <li class="page-item">

                    <?php
                    //finding the previous page
                    if(!isset($_GET['page']) || $_GET['page'] == 1 )
                    {
                        $previous_page = 1;
                    }
                    else
                    {
                        $previous_page = $_GET['page'] - 1;
                    }
                    ?>
                <li class="page-item" ><a href="video_post_search2.php?page=<?php echo $previous_page?>" class="page-link"> Previous </a></li>


                <?php

                //find and display number of pages required
                for($page = 1; $page<=$number_of_pages; $page++)
                {    //for loop start

                    //button is coloured if number is same as current page
                    if($page == 1 && !isset($_GET['page']))
                    {
                        $isClicked = "active";
                    }
                    else
                    {
                        if(isset($_GET['page']) && $page == $_GET['page'])
                        {
                            $isClicked = "active";
                        }
                        else
                        {
                            $isClicked = "";
                        }
                    }
                    ?>

                    <li class="page-item <?php echo "$isClicked" ?>"><a href="video_post_search2.php?page=<?php echo $page?>" class="page-link"><?php echo $page ?> </a></li>

                    <?php
                }     //for loop end
                ?>

                <?php
                //finding the next page
                if(!isset($_GET['page']))
                {
                    $next_page = 1;
                }
                else if($_GET['page'] == $number_of_pages)
                {
                    $next_page = $_GET['page'];
                }
                else
                {
                    $next_page = $_GET['page'] + 1;
                }
                ?>
                <li class="page-item"><a href="video_post_search2.php?page=<?php echo $next_page?>" class="page-link"> Next </a></li>


                </li>
            </ul>
        </nav>
</div>
                <?php }///pagination2?>
        </div>
    </div>



    </div>

<?php
}
?>
    <!--================footer  =================-->
    <?php
    include 'includes/footer.php';
    ?>
