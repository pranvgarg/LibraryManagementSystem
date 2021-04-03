<?php
session_start();
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add book info</h3>
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
                                <h2>Add Books Information</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                    <form class="col-lg-6" action="" method="post" name="form1" enctype="multipart/form-data">

                                    <table class="table table-bordered">

                                    <tr>
                                    <td><input type="text" class="form-control" name="name" placeholder="Name"></td>
                                    </tr>

                                    <tr>
                                    <td>Cover Image<input type="file" name="f1"></td>
                                    </tr>

                                    <tr>
                                    <td><input type="text" class="form-control" name="aname" placeholder="Author Name"></td>
                                    </tr>

                                    <tr>
                                    <td><input type="text" class="form-control" name="pname" placeholder="Publication Name"></td>
                                    </tr>

                                    <tr>
                                    <td>Purchase Date<input type="date" class="form-control" name="pdate" placeholder="Purchase Date"></td>
                                    </tr>

                                    <tr>
                                    <td><input type="text" class="form-control" name="price" placeholder="Price"></td>
                                    </tr>

                                    <tr>
                                    <td><input type="text" class="form-control" name="qty" placeholder="Quantity"></td>
                                    </tr>

                                    <tr>
                                    <td><input type="text" class="form-control" name="aqty" placeholder="Available Quantity"></td>
                                    </tr>

                                    <!-- <tr>
                                    <td><input type="text" class="form-control" name="lusername" placeholder="Librarian Username"></td>
                                    </tr> -->

                                    <tr>
                                    <td><input type="submit" class="btn btn-info" name="submit1" value="Insert Book Details" style="background-color:#53BB9C; color: white"></td>
                                    </tr>

                                    </table>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php

        if(isset($_POST['submit1']))
        {

        $tm = md5(time());
        $fnm = $_FILES['f1']['name'];
        $dst="./books_image/".$tm.$fnm;
        $dst1="books_image/".$tm.$fnm;
        move_uploaded_file($_FILES['f1']['tmp_name'], $dst);

        mysqli_query($link, "insert into add_books(books_name, books_image, books_author_name, books_publication_name, books_purchase_date, books_price, books_qty, available_qty, librarian_username ) values ('$_POST[name]', '$dst1', '$_POST[aname]', '$_POST[pname]', '$_POST[pdate]', '$_POST[price]', '$_POST[qty]', '$_POST[aqty]', '$_SESSION[librarian]')");
        
        ?>
        <script type="text/javascript">
        confirm("BOOK INSERTED SUCCESSFULLY ");
        </script>

        <?php
    
        }

?>

<?php
include "footer.php";
?>