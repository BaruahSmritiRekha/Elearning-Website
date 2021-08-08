<h2 style="text-decoration:underline">Edit Image Post Details:</h2><br/>
<?php

if (isset($_GET['p_id'])) {
    $the_image_id = $_GET['p_id'];

}

$query = "SELECT * FROM image WHERE image_id= $the_image_id ";

$select_image_by_id = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($select_image_by_id)) {
    $image_id = $row['image_id'];
    $image_title = $row['image_title'];
    $image_content = $row['image_content'];
    $image_tags = $row['image_tags'];
    $image_name = $row['image_name'];
    $image_datetime = $row['image_datetime'];

}

if (isset($_POST['update_image'])) {

    $image_title = $_POST['image_title'];
    $image_content = $_POST['image_content'];
    $image_tags = $_POST['image_tags'];
    $image_name = $_FILES['image']['name'];
    $image_name_temp = $_FILES['image']['tmp_name'];



    move_uploaded_file($image_name_temp, "../images/$image_name");


    if (empty($image_name)) {
        $query = "SELECT * FROM image WHERE image_id=$the_image_id";
        $select_post = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($select_post)) {
            $image_name = $row['image_name'];
        }

    }

    $query = "UPDATE image SET  ";
    $query .= "image_title= '{$image_title}', ";
    $query .= "image_content= '{$image_content}', ";
    $query .= "image_tags= '{$image_tags}', ";
    $query .= "image_name= '{$image_name}', ";
    $query .= "image_datetime= now() ";
    $query .= " WHERE image_id= {$the_image_id} ";


    $update_image_query = mysqli_query($con, $query);

    createImage($update_image_query);

    header("location:image.php");


}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="image_title"> TITLE</label>
        <input value="<?php echo $image_title; ?>" type="text" class="form-control" name="image_title">
    </div>

    <div class="form-group">
        <label for="image_content"> CONTENT</label>
        <textarea class="form-control" name="image_content" cols="30" rows="10"><?php echo $image_content; ?></textarea>
    </div>

    <div class="form-group">
        <label for="image_tags"> TAGS</label>
        <input value="<?php echo $image_tags; ?>" type="text" class="form-control" name="image_tags">
    </div>

    <div class="form-group">
        <label for="image_name"> IMAGE</label> <br/>
       <input type="file" accept="image/jpeg, .jpg" name="image">
        <img width="100px" src="../images/<?php echo $image_name; ?>" alt="">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_image" value="update">
    </div>
</form>