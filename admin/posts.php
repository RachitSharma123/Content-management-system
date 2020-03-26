<?php include "includes/admin_header.php"?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header">
                           Welcome to Admin
                            <small>Author</small>
                        </h1>
                         <?php
                        if(isset($_GET['source']))
                        {
                            $source=$_GET['source'];
                        
                        switch($source){
                            case'add_post';
                       include "includes/add_post.php";
                            break;
                            case'edit_post';
                       include "edit_post.php";
                            break;      
                                
                  }
                        
             }
             ?>
               <?php
                        if(isset($_POST['checkBoxArray']))
                        {
                        foreach($_POST['checkBoxArray'] as $postValueId){
                        $bulk_options = $_POST['bulk_options']; 
                        switch($bulk_options){
                        case 'Published':
                        $query ="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id={$postValueId}";
                        $update_to_published_status = mysqli_query($connection,$query);
                        break;
                        case 'Draft':
                        $query ="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id={$postValueId}";
                        $update_to_draft_status = mysqli_query($connection,$query);
                        break;
                    

                                }
                            }
                        }
                        
                     
                        ?>
                <form action="" method="post">
                   <table class="table table-bordered table-hover">
                         <div class="bulkOptionsContainer" class="col-xs-70" >
                              <select class="form-control" name="bulk_options" id="">
                              <option value="">Select Options</option>
                               <option value="Published">Published</option>
                               <option value="Draft">Draft</option>
                               
                             </select>
                       </div><br>
                               <div class="col-xs-4">
                                      <input type="submit" name="submit" class="btn btn-success" value="Apply">
                              <a class="btn btn-primary" href="add_post.php">Add New</a>
                                  
                               </div>
                                <thead>
                               <tr>
                                  <th> <input id="selectAllBoxes" type="checkbox"></th>
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Tags</th>
                                   <th>Comments</th>
                                   <th>Date</th>
                                    <th>Veiw</th>
                                   <th>Update</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php 
                               
                               
      $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection,$query);         
        
     while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
         $post_title = $row['post_title'];
        $post_category = $row['post_cat_id'];
         $post_status = $row['post_status'];
        $post_image = $row['post_image'];
         
         $post_tags = $row['post_tags'];
        $post_comment = $row['post_comment_count'];
          $post_date = $row['post_date'];                      
          echo "</tr>";
         ?>
         
        <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value='<?php echo $post_id; ?>'></td>
          
         <?php
         echo "<td>$post_id</td>";
          echo "<td>$post_author</td>";
          echo "<td>$post_title</td>";

            $query = "SELECT * FROM categories WHERE cat_id =$post_category ";
        $select_categories_id = mysqli_query($connection,$query); 
          
           while($row = mysqli_fetch_assoc($select_categories_id)) 
           {
        $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
          
         echo "<td>{$cat_title}</td>";
           }
               
               
               
               
          echo "<td>$post_status</td>";
          echo "<td><img width='100' src='includes/images/$post_image' alt='realated to $post_title'></td>";
          echo "<td>$post_tags</td>";
          echo "<td>$post_comment</td>";
          echo "<td>$post_date</td>";
          echo "<td><a href='../post.php?p_id={$post_id}'>Veiw Post</a></td>";   
         echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Update</a></td>";
         echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        
         echo "</tr>";
     }
                               
  ?>
  </tbody>
                        </table>
                       <?php
                        if(isset($_GET['delete'])){
                            $the_post_id=$_GET['delete'];
                            $query="DELETE FROM posts WHERE post_id ={$the_post_id}";
                       $delete_query=mysqli_query($connection,$query);
                             header("Location:posts.php");
                        }
                        
                        
                        
                        
                        ?>
                       
                       
                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>
    