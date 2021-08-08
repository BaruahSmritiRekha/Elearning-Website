
     <table class="table table-bordered table">
                            <thead>
                            <tr>

                                <th>Id</th>
                                <th>Title</th>

                                <th>content</th>
                                <th>Tags</th>
                                <th>Vides</th>
                                <th>DateTime</th>

                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>

                               <tbody>


                               <?php

                               $owner = $_SESSION["adminfn"].$_SESSION["adminemail"];

                               $query="SELECT * FROM video WHERE owner ='$owner'";

                               $select_posts=mysqli_query($con,$query);

                               while($row=mysqli_fetch_assoc( $select_posts)) {
                                   $video_id = $row['video_id'];
                                   $video_title = $row['video_title'];
                                   $video_content=$row['video_content'];
                                   $video_tags = $row['video_tags'];
                                   $video_name =$row['video_name'];
                                   $video_datetime =$row['video_datetime'];

                                   echo "<tr>";
                                   echo "<td>$video_id</td>";
                                   echo " <td>$video_title </td>";
                                   echo"<td>  $video_content </td>";
                                   echo " <td>$video_tags</td>";
                                   echo " <td>$video_name</td>";
                                   echo " <td>$video_datetime</td>";
                                   echo " <td><a href='video.php?delete={$video_id}'>DELETE</a></td>";
                                   echo " <td><a href='video.php?source=edit_video&v_id={$video_id}'>EDIT</a></td>";
                                   echo "</tr>";
                               }
                               ?>





                               </tbody>


                        </table>


           <?php
            if(isset($_GET['delete'])) {
            $the_video_id = $_GET['delete'];
            $query ="DELETE FROM video WHERE video_id= {$the_video_id} ";
            $delete_query = mysqli_query($con, $query);
                header("location:video.php");
            }
            ?>