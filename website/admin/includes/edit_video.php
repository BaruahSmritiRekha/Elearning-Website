<h2 style="text-decoration:underline">Edit Video Post Details:</h2><br/>
<?php

if (isset($_GET['v_id'])) {
    $the_video_id = $_GET['v_id'];

}

$query = "SELECT * FROM video WHERE video_id= $the_video_id ";

$select_vdvideos_by_id = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($select_vdvideos_by_id)) {
    $video_id = $row['video_id'];
    $video_title = $row['video_title'];
    $video_content = $row['video_content'];
    $video_tags = $row['video_tags'];
    $video_name = $row['video_name'];
    $video_datetime = $row['video_datetime'];

}

if (isset($_POST['update_video'])) {

    $video_title = $_POST['video_title'];
    $video_content = $_POST['video_content'];
    $video_tags = $_POST['video_tags'];
    $video_name = $_FILES['vid']['name'];
    $video_name_temp=$_FILES['vid']['tmp_name'] ;

    move_uploaded_file( $video_name_temp,"../video/$video_name");



    if (empty($video_name)) {
        $query = "SELECT * FROM video WHERE video_id=$the_video_id";
        $select_vdvideo = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($select_vdvideo)) {
            $video_name = $row['video_name'];
        }

    }

    $query = "UPDATE video SET  ";
    $query .= "video_title= '{$video_title}', ";
    $query .= "video_content= '{$video_content}', ";
    $query .= "video_tags= '{$video_tags}', ";
    $query .= "video_name= '{$video_name}', ";
    $query .= "video_datetime= now() ";
    $query .= " WHERE video_id= {$the_video_id} ";



    $update_vdpost_query = mysqli_query($con, $query);

    createVideo($update_vdpost_query);

    header("location:video.php");


}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="video_title"> TITLE</label>
        <input value="<?php echo $video_title; ?>" type="text" class="form-control" name="video_title">
    </div>

    <div class="form-group">
        <label for="video_content"> CONTENT</label>
        <textarea class="form-control" name="video_content" cols="30" rows="10"><?php echo $video_content; ?></textarea>
    </div>

    <div class="form-group">
        <label for="video_tags"> TAGS</label>
        <input value="<?php echo $video_tags; ?>" type="text" class="form-control" name="video_tags">
    </div>

    <div class="form-group">
        <label for="video_name">VIDEO</label> <br/>
        <input type="file" accept="video/mp4" name="vid">
        <video width="100px" src="../video/<?php echo $video_name; ?>" alt="">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_video" value="update">
    </div>
</form>