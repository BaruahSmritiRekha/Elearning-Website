<?php
  ///////
  $commentCategory = $_SESSION["comment_category"];
  $category_id = $_SESSION["category_id"];
  //Database connection details
  $servername ="localhost";
  $username ="root";
  $passw ="";
  $dbname="e-learning";

  //Connnecting to Server Database
  $conn = mysqli_connect($servername,$username,$passw,$dbname);

  //Checking if the User details are correct
  $query = "select * from comment where comment_category = '$commentCategory' and category_id = '$category_id'";
  $result =  mysqli_query($conn,$query);

   while($obj = mysqli_fetch_assoc($result))
   {
      echo $obj["comment_user"].'<br>';

      echo $obj["comment_date"].'<br><br>';

      echo $obj["comment_contant"].'<br><br><br>';
   }

 ?>
