
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><i class="fa fa-user-check"></i>Admin</a>
    </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="../index.php"><i class="fa fa-home"></i> Home</a>



        <li class="dropdown">
            <a href="..\logout\logout.php\index.php" class="dropdown-toggle" ><i class="fa fa-user"></i> Log Out <b class="caret"></b></a>
        </li>
    </ul>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-clock"></i> Profile</a>
            </li>


            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#pdf"><i class="fa fa-fw fa-file-pdf"></i> PDF <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="pdf" class="collapse">
                    <li>
                        <a href="pdf.php">View All pdf</a>
                    </li>
                    <li>
                        <a href="pdf.php?source=add_pdf">Add pdf</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#image"><i class="fa fa-fw fa-file-image"></i> Images <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="image" class="collapse">
                    <li>
                        <a href="image.php">View All images</a>
                    </li>
                    <li>
                        <a href="image.php?source=add_image">Add image</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;"  data-toggle="collapse" data-target="#video"><i class="fa fa-fw fa-play"></i> Video Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="video" class="collapse">
                    <li>
                        <a href="video.php">View All video posts</a>
                    </li>
                    <li>
                        <a href="video.php?source=add_video">Add video post</a>
                    </li>

                </ul>
            </li>



        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
