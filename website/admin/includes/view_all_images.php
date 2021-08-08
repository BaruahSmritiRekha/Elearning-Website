
     <table class="table table-bordered table">
                            <thead>
                            <tr>

                                <th>Id</th>
                                <th>Title</th>
                                <th>content</th>
                                <th>Tags</th>
                                <th>Images</th>
                                <th>DateTime</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>

                               <tbody>


                               <?php

                               $owner = $_SESSION["adminfn"].$_SESSION["adminemail"];

                               $query="SELECT * FROM image WHERE owner ='$owner'";

                               $select_posts=mysqli_query($con,$query);

                               while($row=mysqli_fetch_assoc( $select_posts)) {
                                   $image_id = $row['image_id'];
                                   $image_title = $row['image_title'];
                                   $image_content=$row['image_content'];
                                   $image_tags = $row['image_tags'];
                                   $image_name =$row['image_name'];
                                   $image_datetime =$row['image_datetime'];




                                   echo "<tr>";
                                   echo "<td>$image_id</td>";
                                   echo " <td>$image_title </td>";
                                   echo"<td>  $image_content </td>";
                                   echo " <td>$image_tags</td>";
                                   echo " <td><img width='80px' class='img-responsive' src='../images/$image_name'></td>";
                                   echo " <td>$image_datetime</td>";
                                   echo " <td><a href='image.php?delete={$image_id}'>DELETE</a></td>";
                                   echo " <td><a href='image.php?source=edit_image&p_id={$image_id}'>EDIT</a></td>";
                                   echo "</tr>";
                               }
                               ?>





                               </tbody>


                        </table>


           <?php
            if(isset($_GET['delete'])) {
            $the_image_id = $_GET['delete'];
            $query ="DELETE FROM image WHERE image_id= {$the_image_id} ";
            $delete_query = mysqli_query($con, $query);
                header("location:image.php");
            }
            ?>