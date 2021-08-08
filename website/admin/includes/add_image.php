
<h2 style="text-decoration:underline">Add Image Post Details:</h2><br/>

<?php

$owner = $_SESSION["adminfn"].$_SESSION["adminemail"];

if (isset($_POST['create_post'])) {
    $image_title = $_POST['image_title'];
    $image_content = $_POST['image_content'];
    $image_tags = $_POST['image_tags'];
    $image_name = $_FILES['image']['name'];
    $image_name_temp=$_FILES['image']['tmp_name'];
    $image_datetime = date('d-M-y h:i:s');


    move_uploaded_file( $image_name_temp,"../images/$image_name");

    $query= "INSERT INTO image(image_title,image_content,
                               image_tags,image_name,image_datetime,owner) ";

    $query .="VALUES ('{$image_title}','{$image_content}','{$image_tags}',
                      '{$image_name}',now(),'{$owner}') ";

    $create_image_query= mysqli_query($con,$query);

    createImage($create_image_query);

    header("location:image.php");

}
?>


    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="image_title"> TITLE</label>
            <input type="text" class="form-control" name="image_title">
        </div>

<div class="form-group">
    <label for="image_content"> CONTENT</label>
    <textarea class="form-control" name="image_content" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
    <label for="image_tags"> TAGS</label>
    <input type="text" class="form-control" name="image_tags">
</div>

<div class="form-group">
    <label for="image_name"> IMAGE</label>
    <input type="file" accept="image/jpeg, .jpg" name="image">
</div>

        <div class="form-group">
        <select name="image_status">
            <option value="Publish">Publish </option>
            <option value="Unpublish">Unpublish </option>
        </select>
        </div>

<div class="form-group">
        <input  type="submit" class="btn btn-primary" name="create_post" value="Create">
</div>
    </form>
