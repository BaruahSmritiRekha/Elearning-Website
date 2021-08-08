
<!--================ header=================-->

<?php
session_start();
include 'includes/header.php';
?>
<!--================ navbar=================-->
<?php
include 'includes/navbar.php';
?>

<!--================ search =================-->


    <section class="course_details_area section_gap">

        <div class="col-lg-3,justify-content-between" id="d_bar">
            <div class="col-lg-7 course_details">
                <form action="image_posts_search.php" method="POST">

                <input type="text" class="form-control" placeholder="Search" name="search">

                    <button name="submit"  class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>


        </div>


    </section>

    <!--================image=================-->




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
                $query="SELECT * FROM image where  image_tags LIKE '%$search%'";
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
                $query="SELECT * FROM image where image_tags LIKE '%$search%' LIMIT ".$page_starting_limit_number.','.$results_per_page;
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
                                  <img src="images/<?php echo $image_name ?>" alt="Image" class="img-fluid tm-catalog-item-img">
                              </div>
                              <div class="p-4 tm-bg-gray tm-catalog-item-description">
                                  <h3 class="tm-text mb-3 tm-catalog-item-title"><a href="image-page.php"> <?php echo $image_title ?> </a></h3>
                                  <p class="tm-catalog-item-text"><?php echo $image_content ?></p>
                                  <a href="image-page.php?p_id=<?php echo $image_id ?>" class="blog_btn">OPEN</a><br/><br/>
                                  <l class="fa fa-clock"> <?php echo $image_datetime ?> </l>
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
                        <li class="page-item" ><a href="image_posts_search2.php?page=<?php echo $previous_page?>" class="page-link"> Previous </a></li>


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

                            <li class="page-item <?php echo "$isClicked" ?>"><a href="image_posts_search2.php?page=<?php echo $page?>" class="page-link"><?php echo $page ?> </a></li>

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
                        <li class="page-item"><a href="image_posts_search2.php?page=<?php echo $next_page?>" class="page-link"> Next </a></li>

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
<br/>

<!--================footer =================-->
<?php
include 'includes/footer.php';
?>
