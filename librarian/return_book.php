<?php
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                            <form class="form1" action="" method="post">
                                <table class="table table-bordered">
                                  <tr>
                                    <td>
                                      <select class="form-control" name="enr">

                                        <?php
                                        $res = mysqli_query($link, "select student_enrollment from issue_books where book_return_date=''");
                                        while ($row = mysqli_fetch_array($res)) {
                                          echo "<option>";
                                          echo $row['student_enrollment'];
                                          echo "</option>";

                                        }
                                         ?>

                                      </select>
                                    </td>

                                    <td>
                                      <input type="submit" name="submit1" value="Search" class="form-control btn btn-info" style="background-color:#53BB9C; color: white">
                                    </td>

                                  </tr>

                                </table>

                              </form>
                                

                             <?php

                                    if (isset($_POST['submit1'])) {

                                    ?>

                                    <table class="table table-bordered">
                                        <tr>
                                        <th>
                                            Student Enrollment
                                        </th>
                                        <th>
                                            Student Name
                                        </th>
                                        <th>
                                            Student Sem
                                        </th>
                                        <th>
                                            Student Contact
                                        </th>
                                        <th>
                                            Student Email
                                        </th>
                                        <th>
                                            Book Name
                                        </th>
                                        <th>
                                            Book Issue Date
                                        </th>

                                        <th>
                                            Return Book
                                        </th>
                                        </tr>


                                    <?php

                                    $res = mysqli_query($link, "select * from issue_books where student_enrollment='$_POST[enr]' and book_return_date=''");

                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<tr>";

                                        echo "<td>";
                                        echo $row['student_enrollment'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $row['student_name'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $row['student_sem'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $row['student_contact'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $row['student_email'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $row['books_name'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $row['books_issue_date'];
                                        echo "</td>";

                                        echo "<td>";
                                        ?><div><a href="return_book_working.php?id=<?php echo $row['id']; ?>&bname=<?php echo $row['book_name']; ?>" class="btn btn-info" role="button">Return Book</a></div><?php
                                        echo "</td>";

                                        echo "</tr>";
                                    }

                                    ?>
                                    </table> <?php

                                    }

                                    ?>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>





