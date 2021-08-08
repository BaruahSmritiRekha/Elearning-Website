<?php

  include 'comment_panel/comment_design.php';

  session_start();

  if(isset($_SESSION["usertype"])  && $_SESSION["usertype"] != "logout")//Add comment to the Database since the User is loggedIn
  {
  $comment =  $_POST["comment"];
  $date = date('y-m-d h:i:s');
  $commentCategory = $_SESSION["comment_category"];
  $category_id = $_SESSION["category_id"];
  $user = "".$_SESSION["adminfn"]." ".$_SESSION["adminln"];
  //Database connection details
  $servername ="localhost";
  $username ="root";
  $passw ="";
  $dbname="e-learning";

  //Connnecting to Server Database
  $conn = mysqli_connect($servername,$username,$passw,$dbname);

  //Checking if the User details are correct
  $query = "select * from comment";
  $result =  mysqli_query($conn,$query);
  $id = mysqli_affected_rows($conn);
  $id++;

  $query  = "insert into comment values('$id','$user','$date','$comment','$commentCategory','$category_id');";
  $result =  mysqli_query($conn,$query);

   echo '<div class="comA">COMMENT POSTED !</div>';
  }
  else//Failed to add comment to the Database since the User is loggedOut
  {
     echo '<div class="comB">Failed to Comment !!!...You are LOGGED OUT pls LOG IN to COMMENT</div>';
  }


  ///////////////////////////////////////////////////////////////Redirecting Page
 if($_SESSION["comment_category"] == "image")
 {
  include 'image_posts.php';
 }
 elseif($_SESSION["comment_category"] == "video")
 {
  include 'video_post.php';
 }
 elseif($_SESSION["comment_category"] == "pdf")
 {
  include 'pdf_posts.php';
 }

?>
