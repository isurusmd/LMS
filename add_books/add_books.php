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
                        <h2>ADD Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

                        <table class="table table-bordered">

                        <tr>
                            <td><input type="text" class="form-control" placeholder="Book Name" name="bookname" required=""></td>
                        </tr>

                            <tr>
                                <td>

                                    <input type="file"  name="f1" required=""></td>
                            </tr>

                            <tr>
                                <td><input type="text" class="form-control" placeholder="Book Author" name="authorname" required=""></td>
                            </tr>

                            <tr>
                                <td><input type="text" class="form-control" placeholder="Book Publication Name" name="pubname" required=""></td>
                            </tr>

                            <tr>
                                <td><input type="text" class="form-control" placeholder="Book Purchase Date" name="purdate" required=""></td>
                            </tr>

                            <tr>
                                <td><input type="text" class="form-control" placeholder="Price" name="price" required=""></td>
                            </tr>

                            <tr>
                                <td><input type="text" class="form-control" placeholder="Quantity" name="quantity" required=""></td>
                            </tr>

                            <tr>
                                <td><input type="text" class="form-control" placeholder="Available Book Quantity " name="abq" required=""></td>
                            </tr>


                            <tr>
                                <td><input type="submit" name="submit1" class="btn btn-default submit" value="Insert Book Details" style="background-color:Blue; color: white;"></td>
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
if(isset($_POST["submit1"])) {
    $tm = md5(time());
    $fnm = $_FILES["f1"]["name"];
    $dst = "./book_image/" . $tm . $fnm;
    $dst1 = "book_image/" . $tm . $fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
    mysqli_query($link,"insert into add_book values ('','$_POST[bookname]','$dst1','$_POST[authorname]','$_POST[pubname]','$_POST[purdate]','$_POST[price]','$_POST[quantity]','$_POST[abq]','$_SESSION[librarian]')");

    ?>
    <script type="text/javascript">
        alert("Books inserted successfully");

    </script>


    <?php

 }
?>


<?php
include "footer.php";
?>






