
<!--================ header =================-->
<?php

if(!isset($_SESSION))
{
session_start();
}

$_SESSION["comment_category"] = "pdf";

include 'includes/header.php';
?>
<!--================ navbar =================-->

<?php
include 'includes/navbar.php';
?>

<!--================ search =================-->


<form action="pdf_posts_search.php" method="POST">

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
    <!---=========================--pdf============---->

    <div class="container">
        <div class="row">
            <div class="col-lg-12 course_details_left">

                    <h4 class="title d-flex pb-5" style="text-decoration: underline">PDFs</h4>
                    <div class="content">
                        <ul class="course_list">
                            <?php


                            // for image
                            $query=" SELECT * FROM pdf ";



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
                            $query="SELECT * FROM pdf LIMIT ".$page_starting_limit_number.','.$results_per_page;
                            $result = mysqli_query($con,$query);

                            //displaying items
                            while($row = mysqli_fetch_array($result)) {
                                $pdf_id = $row['pdf_id'];
                            $pdf_title = $row['pdf_title'];
                              $pdf_name = $row['pdf_name'];

                              ?>


                            <li class="justify-content-between d-flex">
                                <p style="color: #000000; font-size:1.2rem"><b><?php echo $pdf_title?></b></p>
                              
                                <a class="primary-btn text-uppercase" href="pdf-page.php?pdf_id=<?php echo $pdf_id ?>">OPEN</a>

                            </li>
                            <?php } ?>


                        </ul>

                    </div>
            </div>



            <!--================pagination=================-->


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
                        <li class="page-item" ><a href="pdf_posts.php?page=<?php echo $previous_page?>" class="page-link"> Previous </a></li>


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

                            <li class="page-item <?php echo "$isClicked" ?>"><a href="pdf_posts.php?page=<?php echo $page?>" class="page-link"><?php echo $page ?> </a></li>

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
                        <li class="page-item"><a href="pdf_posts.php?page=<?php echo $next_page?>" class="page-link"> Next </a></li>




                        </li>
                    </ul>
                </nav>
            </div>

            <?php ///pagination2?>


            </div>


<br/>

</div>
<!--================ footer  =================-->


<?php
include 'includes/footer.php';
?>
