
<h2 style="text-decoration:underline">Add video Post Details:</h2><br/>

<?php

$owner = $_SESSION["adminfn"].$_SESSION["adminemail"];

if (isset($_POST['create_vdpost'])) {
    $video_title = $_POST['video_title'];
    $video_content = $_POST['video_content'];
    $video_tags = $_POST['video_tags'];

    $video_name = $_FILES['vid']['name'];
    $video_name_temp=$_FILES['vid']['tmp_name'] ;
    $video_datetime = date('d-m-y h:i:s');


    move_uploaded_file( $video_name_temp,"../video/$video_name");

    $query= "INSERT INTO video(video_title,video_content,
                               video_tags,video_name,video_datetime,owner)";

    $query .="VALUES ('{$video_title}','{$video_content}',
                      '{$video_tags}','{$video_name}',now(),'$owner') ";

    $create_vdpost_query= mysqli_query($con,$query);

    createVideo($create_vdpost_query);

    header("location:video.php");

}
?>


    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="video_title"> TITLE</label>
            <input type="text" class="form-control" name="video_title">
        </div>

<div class="form-group">
    <label for="video_content"> CONTENT</label>
    <textarea class="form-control" name="video_content" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
    <label for="video_tags"> TAGS</label>
    <input type="text" class="form-control" name="video_tags">
</div>

<div class="form-group">
    <label for="video_name"> VIDEO</label>
    <input type="file" accept="video/mp4" name="vid">
</div>

<div class="form-group">
        <input  type="submit" class="btn btn-primary" name="create_vdpost" value="Create">
</div>
    </form>
