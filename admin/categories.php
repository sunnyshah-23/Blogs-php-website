<?php include "includes/admin_header.php"?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>author</small>
                        </h1>
                       
                        <div class="col-xs-6">
                             <?php // Finding Category
                                 if(isset($_POST['submit']))
                                 {
                                    $cat_title= $_POST['cat_title'];

                                    if($cat_title=="" || empty($cat_title))
                                    {
                                        echo "This field should not be empty";
                                    }

                                    else
                                    {
                                        $query = "INSERT INTO categories(cat_title) "; 
                                        $query .= "VALUE('{$cat_title}') ";
                                        $create_category_query = mysqli_query($connection,$query);
                                        if(!$create_category_query)
                                        {
                                            die('Query Failed' . mysqli_error($connection));
                                        }

                                    }
                                 }




                              ?>

                         




                        
                        
                    
            
                    
                            <form action="" method="post">
                                <label for="cat_titile">Add Category</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title">
                                 </div>
                                 <div class="form-group">
                                    <input class="btn btn-primary" type=submit name="submit" value="Add Category">
                                 </div>
                            </form>

                           <?php
                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                include "includes/update_categories.php";
                            }



                            ?>
                        </div><!-- ADD CTEGORY FORM-->


                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                 <thead>
                                     <tr>
                                         <th>ID</th>
                                         <th>Category Title</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query="select * from categories";
                                    $select_categories=mysqli_query($connection,$query);
                                    while($row=mysqli_fetch_assoc($select_categories))
                                 {
                                     $cat_id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];
                                     echo "<tr>";
                                     echo "<td>{$cat_id}</td>";
                                     echo "<td>{$cat_title}</td>";
                                     echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                     echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                     echo "</tr>";
                                 }
                                 ?>

                                  <?php // DELETE Category
                                        if(isset($_GET['delete']))
                                        {
                                            $the_cat_id=$_GET['delete'];
                                            $query="delete from categories where cat_id={$the_cat_id}";
                                            $delete_query=mysqli_query($connection,$query);
                                            header("Location: categories.php");

                                        }
                                        



                                   ?>
                                  

                                
                                    </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php"?>


   