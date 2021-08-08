<h2 style="text-decoration:underline">Edit Pdf Post Details:</h2><br/>
<?php

if (isset($_GET['pdf_id'])) {
    $the_pdf_id = $_GET['pdf_id'];

}

$query = "SELECT * FROM pdf WHERE pdf_id= $the_pdf_id ";

$select_pdfs_by_id = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($select_pdfs_by_id)) {
    $pdf_id = $row['pdf_id'];
    $pdf_title = $row['pdf_title'];
    $pdf_tags = $row['pdf_tags'];
    $pdf_name = $row['pdf_name'];
    $pdf_datetime = $row['pdf_datetime'];


}

if (isset($_POST['update_pdf'])) {

    $pdf_title = $_POST['pdf_title'];
    $pdf_tags = $_POST['pdf_tags'];
    $pdf_name = $_FILES['pdf']['name'];
    $pdf_name_temp = $_FILES['pdf']['tmp_name'];


    move_uploaded_file($pdf_name_temp, "../pdfs/$pdf_name");


    if (empty($pdf_name)) {
        $query = "SELECT * FROM pdf WHERE pdf_id=$the_pdf_id";
        $select_pdf = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($select_pdf)) {
            $pdf_name = $row['pdf_name'];
        }

    }

    $query = "UPDATE pdf SET  ";
    $query .= "pdf_title= '{$pdf_title}', ";
    $query .= "pdf_tags= '{$pdf_tags}', ";
    $query .= "pdf_name= '{$pdf_name}', ";
    $query .= "pdf_datetime= now() ";
    $query .= " WHERE pdf_id= {$the_pdf_id} ";


    $update_pdf_query = mysqli_query($con, $query);

    createPdf($update_pdf_query);

    header("location:pdf.php");


}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="pdf_title"> TITLE</label>
        <input value="<?php echo $pdf_title; ?>" type="text" class="form-control" name="pdf_title">
    </div>


    <div class="form-group">
        <label for="pdf_tags"> TAGS</label>
        <input value="<?php echo $pdf_tags; ?>" type="text" class="form-control" name="pdf_tags">
    </div>

    <div class="form-group">
        <label for="pdf_name"> PDF </label> <br/>
       <input type="file" accept="application/pdf, .doc, .docx, .odf" name="pdf" >
         "<?php echo $pdf_name; ?>"

    </div>



    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_pdf" value="update">
    </div>
</form>