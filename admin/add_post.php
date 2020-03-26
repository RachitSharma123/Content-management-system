<?php
include "includes/admin_header.php";?>
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
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Add Post</a>
                            </li> 
                        </ol>
                        
                          <?php
if(isset($_POST['create_post'])){
      
      $post_title=$_POST['post_title'];
      $post_author=$_POST['post_author'];
      $post_category_id=$_POST['post_category'];
      $post_status=$_POST['post_status'];
      $post_image=$_FILES['image']['name'];
      $post_image_temp=$_FILES['image']['tmp_name'];
      $post_tags=$_POST['post_tags'];
      $post_content=$_POST['post_content'];
      $post_date=date('d-m-y');
      //$post_comment_count=4;
    
    
    move_uploaded_file($post_image_temp,"includes/images/$post_image");
    
 $query = "INSERT INTO posts(post_cat_id, post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 
             
      $create_post_query = mysqli_query($connection, $query);  
          

if(!$create_post_query){
    echo "it failed ".mysqli_error($connection);
}
  $the_post_id =mysqli_insert_id($connection);
   echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
}
    ?>

<form action="" method="post" enctype="multipart/form-data">    
 <div class="form-group">
     <label for="title"><B>Post Title</B></label>
          <input type="text" class="form-control" name="post_title">
      </div>
        <div class="form-group">
       <label for="categories">Categories</label>
       <select name="post_category" id="">
           
      <?php

        $query = "SELECT * FROM categories ";
        $select_categories = mysqli_query($connection,$query);
        



        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];


        if($cat_id == $post_category_id) {

      
        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";


        } else {

          echo "<option value='{$cat_id}'>{$cat_title}</option>";


        }
     
        }

?>
           
        
       </select>

      </div>

    

   
 <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="post_author">
      </div> 
  <div class="form-group">
        
        <select name="post_status" id="">
            <option value="Draft">Post Status</option>
            <option value="Published">Publish</option>
            <option value="Draft">Draft</option>
        </select>
      </div> 
 <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">

         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
         </textarea>
      </div>

<div class="form-group">

<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>

</form>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>
    