<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           
               
                
                 
                   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
                   
                    
                      <ul class="nav navbar-nav">
                         <?php 
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="cms";


    
foreach($db as $key => $value){
    
    define(strtoupper($key),$value);
}

$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


    $query = "SELECT * FROM categories LIMIT 3";
    $select_all_categories_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       $cat_title = $row['cat_title'];
       $cat_id = $row['cat_id'];
        
        echo "<li><a href='/cms/category/{$cat_id}'>{$cat_title}</a></li>";
    }
                    
    ?>                    <li>
                              <a href="Registration.php">Register</a>
                          </li>
                          <li>
                              <a href="admin">Admin</a>
                          </li>
                          <?php
                          
                           if(isset($_SESSION['username'])) {
    
        if(isset($_GET['p_id'])) {
            
          $the_post_id = $_GET['p_id'];
        
        echo "<li><a href='/cms/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                              }
                          }
                          
                          
                          ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
