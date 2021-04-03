<?php
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Display & Search Book</h3>
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
                                <h2>Display & Search Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                            <form class="form1" action="" method="post">
                                <input type="text" name="t1" class="form-control" placeholder="Enter book name">
                                <input type="submit" name="submit1" value="search books" class="btn" style="background-color:#53BB9C; color: white">
                            </form>  


                                <?php

                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "Book number"; echo"</th>";
                                    echo "<th>"; echo "Book image"; echo"</th>";
                                    echo "<th>"; echo "Book name"; echo"</th>";
                                    echo "<th>"; echo "Author name"; echo"</th>";
                                    echo "<th>"; echo "Publication name"; echo"</th>";
                                    echo "<th>"; echo "Purchase date"; echo"</th>";
                                    echo "<th>"; echo "Book price"; echo"</th>";
                                    echo "<th>"; echo "Book quantity"; echo"</th>";
                                    echo "<th>"; echo "Availabe quantity"; echo"</th>";
                                    echo "</tr>";
                                if(isset($_POST["submit1"]))
                                {
                                $res=mysqli_query($link,"SELECT * FROM add_books WHERE books_name LIKE '%$_POST[t1]%' ");
                                while($row=mysqli_fetch_array($res))
                                {
                                echo "<tr>";
                                echo "<td>"; echo $row['id']; echo "</td>";
                                echo "<td>"; ?> <img scr="<?php echo $row["books_image"];?>" height="100" width="100"> <?php echo"</td>";
                                echo "<td>"; echo $row["books_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_author_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_publication_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_purchase_date"]; echo"</td>";
                                echo "<td>"; echo $row["books_price"]; echo"</td>";
                                echo "<td>"; echo $row["books_qty"]; echo"</td>";
                                echo "<td>"; echo $row["available_qty"]; echo"</td>";
                                echo "</tr>";
                                
                                }

                                }
                                else{

                                $res=mysqli_query($link,"SELECT * FROM add_books");
                                while($row=mysqli_fetch_array($res))
                                {
                                echo "<tr>";
                                echo "<td>"; echo $row['id']; echo "</td>";
                                echo "<td>"; ?> <img scr="<?php echo $row["books_image"];?>" height="100" width="100"> <?php echo"</td>";
                                echo "<td>"; echo $row["books_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_author_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_publication_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_purchase_date"]; echo"</td>";
                                echo "<td>"; echo $row["books_price"]; echo"</td>";
                                echo "<td>"; echo $row["books_qty"]; echo"</td>";
                                echo "<td>"; echo $row["available_qty"]; echo"</td>";
                                echo "</tr>";
                                
                                }
                                }

                                echo "</table>";
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

