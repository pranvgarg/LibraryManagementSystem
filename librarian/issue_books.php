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
                        <h3>Issue books</h3>
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
                                <h2>Issue books </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1 " action="" method="post">
                                    <table >
                                        <tr>
                                            <td>
                                                <select name="enrr" class="form-control selectpicker">
                                                    <?php
                                                        $res=mysqli_query($link,"SELECT enrollment FROM student_registration ");
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                            echo "<option>";
                                                            echo $row['enrollment'];

                                                            echo "</option>";
                                                        }

                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                            </td>
                                            <td>
                                                <input type="submit" class="btn btn-info" name="submit1" value="Submit Query" style="background-color:#53BB9C; color: white; margin-top:5px">
                                            </td>

                                        </tr>
                                    </table>
                                
                                <?php
                                    if(isset($_POST["submit1"]))
                                    {
                                        //echo $_POST['enrr'];
                                        $res1=mysqli_query($link,"SELECT * FROM student_registration WHERE enrollment=$_POST[enrr]");
                                        while ($row1 = mysqli_fetch_array($res1)) {
                                            $firstname=$row1['firstname'];
                                            $lastname=$row1['lastname'];
                                            $username=$row1['username'];
                                            $email=$row1['email'];
                                            $contact=$row1['contact'];
                                            $sem=$row1['sem'];
                                            $enrollment=$row1['enrollment'];
                                            $_SESSION['enrollment'] = $enrollment;
                                            $_SESSION['susername'] = $username;
                                          }
                                        
                                        ?>
                                            <table class="table table-bordered">

                                            <tr>
                                            <td><input type="text" class="form-control" name="enrollment" placeholder="Enrollment" value="<?php echo $enrollment ?>" disabled></td>
                                            </tr>

                                            <tr>
                                            <td><input type="text" class="form-control" name="studentname" placeholder="Student Name" value="<?php echo $firstname.' '.$lastname ?>" required></td>
                                            </tr>

                                            <tr>
                                            <td><input type="text" class="form-control" name="studentsem" placeholder="Student Sem" value="<?php echo $sem ?>" required></td>
                                            </tr>

                                            <tr>
                                            <td><input type="text" class="form-control" name="studentcontact" placeholder="Student Contact" value="<?php echo $contact ?>" required></td>
                                            </tr>

                                            <tr>
                                            <td><input type="text" class="form-control" name="studentemail" placeholder="Student Email" value="<?php echo $email ?>" required></td>
                                            </tr>

                                            <tr>
                                            <td>
                                            <select name="booksname" class="form-control selectpicker">
                                            <?php
                                            $res=mysqli_query($link,"SELECT books_name FROM add_books ");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                echo "<option>";
                                                echo $row['books_name'];

                                                echo "</option>";
                                            }
                                            ?>
                                           
                                            </select>
                                            </td>
                                            </tr>

                                            <tr>
                                            <td><input type="date" class="form-control" name="booksissuedate" placeholder="Books Issue Date" value="<?php echo date("Y-m-d") ?>" required></td>
                                            </tr>

                                            <tr>
                                            <td><input type="text" class="form-control" name="studentusername" placeholder="Student User Name" value="<?php echo $username ?>"  disabled></td>
                                            </tr>

                                            <tr>
                                            <td>
                                                <input type="submit" class="form-control btn btn-info" name="submit2" value="Issue books" style="background-color:#53BB9C; color: white; margin-top:5px">
                                            </td>
                                            </tr>

                                            </table>

                                        <?php

                                    }

                                ?>
                                </form>
                                <?php

                                echo "hello";

                                if(isset($_POST["submit2"])) 
                                {
                                    mysqli_query($link, "insert into issue_books values('','$_SESSION[enrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[booksissuedate]','','$_SESSION[susesrname]')");
                                    ?>

                                    <script type="text/javascript">
                                    //alert("Book issued successfully");
                                    //video number 10;
                                    alert("Book issued successfully");
                                    window.location.href=window.location.href;
                                    </script>
                                    <?php

                                
                                }

                               ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <!-- student_enrollment, student_name, student_sem, student_contact, student_email, books_name, books_issue_date, student_username, books_return_date) -->

<?php
include "footer.php";
?>

