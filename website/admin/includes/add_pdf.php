
<h2 style="text-decoration:underline">Add Pdf Post Details:</h2><br/>

<?php

 $owner = $_SESSION["adminfn"].$_SESSION["adminemail"];

if (isset($_POST['create_pdf'])) {
    $pdf_title = $_POST['pdf_title'];

    $pdf_tags = $_POST['pdf_tags'];

    $pdf_name = $_FILES['pdf']['name'];
    $pdf_name_temp=$_FILES['pdf']['tmp_name'];
    $pdf_datetime = $row['pdf_datetime'];


    move_uploaded_file( $pdf_name_temp,"../pdfs/$pdf_name");

    $query= "INSERT INTO pdf(pdf_title,
                               pdf_tags,pdf_name,pdf_datetime,owner)";

    $query .="VALUES ('{$pdf_title}','{$pdf_tags}','{$pdf_name}',now(),'$owner') ";

    $create_pdf_query= mysqli_query($con,$query);

    createPdf($create_pdf_query);

    header("location:pdf.php");

}
?>


    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="pdf_title"> TITLE</label>
            <input type="text" class="form-control" name="pdf_title">
        </div>


<div class="form-group">
    <label for="pdf_tags"> TAGS</label>
    <input type="text" class="form-control" name="pdf_tags">
</div>

<div class="form-group">
    <label for="pdf_name"> PDF </label>
    <input type="file" accept="application/pdf, .doc, .docx, .odf" name="pdf">
</div>

<div class="form-group">
        <input  type="submit" class="btn btn-primary" name="create_pdf" value="Create">
</div>
    </form>
