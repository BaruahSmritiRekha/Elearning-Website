
     <table class="table table-bordered table">
                            <thead>
                            <tr>

                                <th>Id</th>
                                <th>Title</th>

                                <th>Pdfs</th>
                                <th>Tags</th>
                                <th>DateTime</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>

                               <tbody>


                               <?php

                               $owner = $_SESSION["adminfn"].$_SESSION["adminemail"];

                               $query="SELECT * FROM pdf WHERE owner ='$owner'";

                               $select_pdfs=mysqli_query($con,$query);

                               while($row=mysqli_fetch_assoc( $select_pdfs)) {
                                   $pdf_id = $row['pdf_id'];
                                   $pdf_title = $row['pdf_title'];
                                   $pdf_tags = $row['pdf_tags'];
                                   $pdf_name =$row['pdf_name'];
                                   $pdf_datetime=$row['pdf_datetime'];

                                   echo "<tr>";
                                   echo "<td>$pdf_id</td>";
                                   echo " <td>$pdf_title </td>";
                                   echo " <td>$pdf_name</td>";
                                   echo " <td>$pdf_tags</td>";
                                   echo " <td>$pdf_datetime</td>";
                                   echo " <td><a href='pdf.php?delete={$pdf_id}'>DELETE</a></td>";
                                   echo " <td><a href='pdf.php?source=edit_pdf&pdf_id={$pdf_id}'>EDIT</a></td>";
                                   echo "</tr>";
                               }
                               ?>





                               </tbody>


                        </table>


           <?php
            if(isset($_GET['delete'])) {
            $the_pdf_id = $_GET['delete'];
            $query ="DELETE FROM pdf WHERE pdf_id= {$the_pdf_id} ";
            $delete_query = mysqli_query($con, $query);
                header("location:pdf.php");
            }
            ?>