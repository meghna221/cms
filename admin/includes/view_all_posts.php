<?php
if(isset($_POST['checkBoxArray'])) {
foreach($_POST['checkBoxArray'] as $postValueId ){
        
  $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options) {
        case 'published':
        
$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";      
 $update_to_published_status = mysqli_query($con,$query);       
         break;
         case 'draft':
$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
        
 $update_to_draft_status = mysqli_query($con,$query);  
         break;
            
  case 'delete':
        
$query = "DELETE FROM posts WHERE post_id = {$postValueId}  ";
        
 $update_to_delete_status = mysqli_query($con,$query);
         break;
            case 'clone':

            $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
            $select_post_query = mysqli_query($con, $query);
                 while ($row = mysqli_fetch_array($select_post_query)) {
            $post_title         = $row['post_title'];
            $post_category_id   = $row['post_category_id'];
            $post_date          = $row['post_date']; 
            $post_author        = $row['post_authour'];
            $post_status        = $row['post_status'];
            $post_image         = $row['post_image'] ; 
            $post_tags          = $row['post_tags']; 
            $post_content       = $row['post_content'];

          }

                 
      $query = "INSERT INTO posts(post_category_id, post_title, post_authour, post_date,post_image,post_content,post_tags,post_status) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 

                $copy_query = mysqli_query($con, $query); 
                 
                 break; 
        } 
    } 
}
?>
<form method="post">
    <div id="bulkOptionContainer" class="col-xs-4">

        <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
         <option value="clone">Clone</option>
        </select>

        </div> 
         
<div class="col-xs-4">

<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>

 </div>     
<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                             <th><input id="selectAllBoxes" type="checkbox"></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                    <th>Views</th>
                                <th>Edit</th>
                                <th>View Post</th>
                                <th>Delete</th></tr>
                            </thead>
                                <tbody>
                                      <?php
                                $select_all_posts="select  *from posts order by post_id desc";
                                $res=mysqli_query($con,$select_all_posts);
                                while($row=mysqli_fetch_assoc($res))
                                { $post_title=$row['post_title'];
                                 $post_id=$row['post_id'];
                                 $post_author=$row['post_authour'];
                                  $post_category_id=$row['post_category_id'];
                                  $post_status=$row['post_status'];
                                  $post_image=$row['post_image'];
                                  $post_tags=$row['post_tags'];
                                  $post_comment_count=$row['post_comment_count'];
                                  $post_date=$row['post_date'];
                                 $post_views=$row['post_views_count'];
                                 
                                ?>
                           
                                <tr>
                                    <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                                <td><?php echo $post_id; ?></td>
                              <td><?php echo $post_author; ?></td>
                                <td><?php echo $post_title; ?></td>
                                    <?php
                                  $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        $select_categories_id = mysqli_query($con,$query);  

        while($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        
        echo "<td>$cat_title</td>";
            
        }
         ?>
                                    
                                     <td><?php echo $post_status; ?></td>
                                    <td align="center"><img src="../images/<?php echo $post_image; ?>" height="50px" width="100px"></td>
                                    <td><?php echo $post_tags; ?></td>
                                    <td><?php echo $post_comment_count; ?></td>
                                    <td><?php echo $post_date; ?></td>
                                     <?php echo "<td><a onclick=\"javascript: return confirm('Are you sure you want to reset the post count');\" href='posts.php?reset=$post_id'>$post_views</a></td>";
                                     ?>
                                   <?php echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
                                    echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View Post</a></td>"; ?>
                                     <?php 
                                    echo "<td><a onclick=\"javascript: return confirm('Are you sure you want to delete');\" href='posts.php?delete=$post_id'>Delete</a></td>";
                                    
                                    ?>

                                   
                                </tr>
                                        <?php } ?>
    </tbody></table>
    
<?php
 if(isset($_GET['delete'])){
                                        $the_p_id=$_GET['delete'];
                                        $query="delete from posts where post_id=$the_p_id ";
                                        $dquery=mysqli_query($con,$query);
                                        header("Location : posts.php");
                                       
                                    }
    if(isset($_GET['reset'])){
    
    $the_post_id = mysqli_real_escape_string($con,$_GET['reset']);
    
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $the_post_id ";
    $reset_query = mysqli_query($con, $query);
    header("Location: posts.php");
    
}

?>
</form>

<script>
    $(document).ready(function(){
       $('#selectAllBoxes').click(function(){
                               if(this.checked){
                                   $('.checkBoxes').each(function(){
                                       this.checked=true;
                                   });
                               }    
            else{
                $('.checkBoxes').each(function(){
                                       this.checked=false;
                                   });
            }
                                   });
        }
    );
</script>