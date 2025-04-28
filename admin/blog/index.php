  <?php
  #get blogs
  $stmt = $db->prepare("SELECT blogs.id, blogs.title, blogs.content, blogs.photo,
  blogs.create_at, categories.name as category_name, users.name as user_name FROM blogs
  INNER JOIN categories ON blogs.category_id = categories.id
  INNER JOIN users ON blogs.user_id = users.id");
// $stmt = $db->prepare("SELECT * FROM blogs");
  $stmt->execute();
  $blogs = $stmt->fetchAll(PDO::FETCH_OBJ);
  
  

  #delete blogs
  if(isset($_POST['blogDeleteBtn'])) {
    $blogId = $_POST['blog_id'];
    $selectStmt = $db->prepare("SELECT photo FROM blogs WHERE id=$blogId ");
    $selectStmt->execute();
    $blog = $selectStmt->fetchObject();

    $stmt = $db->prepare("DELETE FROM blogs WHERE id=$blogId");
   $result = $stmt->execute();

    if($result) {
       unlink("../assets/blog-images/$blog->photo");
       echo " <script>sweetalert('deleted a blog', 'blogs')</script>";

    }
    
  }

  ?>
            <div class="container-fluid">

                                <!-- Page Heading -->
                                <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Category List</h1>
                                </div> -->

                                <!-- Content Row -->
                                <div class="row">
                                    <div class="col-md-12">
        
                                <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Blog List</h6>
                            <a href="index.php?page=blogs-create" class="btn btn-primary btn-sm "> <i class="fa fa-plus" aria-hidden="true"></i>
                            Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Content</th>
                                            <th>Photo</th>
                                            <th>Author</th>
                                            <th>Create at</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    <?php
                                   foreach($blogs as $blog):
                                   ?>
                                    <tr>
                                    <td><?php echo $blog->id ?></td>
                                    <td><?php echo $blog->title ?></td>
                                    <td><?php echo $blog->category_name ?></td>
                                    <td>
                                        <div style="max-width: 300px; max-height:200px; overflow:auto;">
                                        <?php echo $blog->content ?>
                                        </div>
                                    </td>
                                    <td><img src="../assets/blog-images/<?php echo $blog->photo ?>" alt="" style="width: 100px;"  ></td>
                                    <td><?php echo $blog->user_name ?></td>
                                    <td><?php echo $blog->create_at?></td>
                                  
                              
                                    
            
                                    <td>

                                    
                                    <form method="post" class="d-flex">
                                    <input type="hidden" name="blog_id" value="<?php echo $blog->id ?>">
                                    <a href="index.php?page=blogs-edit&blog_id=<?php echo $blog->id ?>" class="btn btn-primary btn-sm mx-1"><i class="fas fa-edit" title="edit"></i></a>

                                    <button name="blogDeleteBtn" class="btn btn-danger btn-sm" title="delete" onclick="return confirm('are you sure to delete?')"><i class="fas fa-trash"></i></button>
                                    <a href="index.php?page=blogs-comments&blog_id=<?php echo $blog->id ?>" class="btn btn-info btn-sm mx-1" title="comment"><i class="fas fa-comment-dots"></i></a>
                                    </form>
                                   
                                    </td>
                                    
                                </tr>
                                   <?php

                                   endforeach;
                                   ?>
                                      
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                         </div>
                         </div>
                    