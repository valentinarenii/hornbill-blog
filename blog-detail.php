
     <?php
       session_start();
     require_once('layout/navbar.php');
     //navbar
     require_once('layout/header.php');
     #get a blog

   $blogId = $_GET['blog_id'];
     $stmt = $db->prepare("SELECT blogs.title,blogs.content, blogs.photo, blogs.create_at, users.name FROM blogs INNER JOIN users On blogs.user_id = users.id WHERE blogs.id=$blogId");
     $stmt->execute();
     $blog = $stmt->fetchObject();

    
     #create comments
     if(isset($_POST['createCommentBtn'])) {
       $text = $_POST['text'];
       $userId = $_SESSION['user']->id;
       $date = date('Y-m-d H:i:s');
       

    //    creating comments into database
    $stmt = $db->prepare("INSERT INTO comments(text, blog_id, user_id, create_at) VALUES ('$text', $blogId, $userId, '$date') ");
    $result = $stmt->execute();
    if($result) {
        echo "<script>sweetalert('created a comment', 'blog-detail.php?blog_id=".$blogId.  " ') </script>";
    }

    
     }
    //  get comments depending on blog
    $commentStmt = $db->prepare("SELECT comments.text,comments.create_at, users.name FROM comments INNER JOIN users ON comments.user_id= users.id WHERE blog_id=$blogId");
    $commentStmt->execute();
    $comments =  $commentStmt->fetchAll(PDO::FETCH_OBJ);
//    print_r($comments);

    ?> 
  
    <div id="blog-detail">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8">
                    <h3 data-aos="fade-right" data-aos-duration="1000">Blog Detail</h3>
                    <div class="heading-line" data-aos="fade-left" data-aos-duration="1000"></div>
                    <div class="card my-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="card-body p-0">
                            <div class="img-wrapper">
                                <img style="width: 800px;" src="assets/blog-images/<?php echo $blog->photo ?>" class="img-fluid" alt="">
                            </div>
                            <div class="content p-3">
                                <h5 class="fw-semibold text-primary"><?php echo $blog->title ?></h5>
                                <div class="mb-3"><?php echo $blog->create_at ?>| by <?php echo $blog->name ?></div>
                                <p>
                                    <?php echo $blog->content ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Comment Section -->
                   
                    <div class="comment">
                        <?php if(isset($_SESSION['user'])): ?>
                        <h5 data-aos="fade-right" data-aos-duration="1000">Leave a Comment</h5>
                        <form method="post" data-aos="fade-left" data-aos-duration="1000">
                            <div class="mb-2">
                                <input type="hidden" value="<?php echo $blogId ?>">
                                <textarea name="text" rows="5" class="form-control" required></textarea>
                            </div>
                            <button type="sumit" name="createCommentBtn" class="btn">Submit</button>
                         
                        </form>
                        <?php else: ?>
                            <a href="#signIn" class="btn btn-primary" data-bs-toggle="offcanvas" aria-controls="staticBackdrop">Sign In to comment</a>
                        <?php endif; ?>

                        <h6 class="fw-bold mt-5">User's Comments</h6>
                        <?php foreach($comments as $comment): ?>
                        <div class="card card-body my-3" data-aos="fade-right" data-aos-duration="1000">
                            <h6><?php echo $comment->name ?></h6>
                         
                          <?php echo $comment->text ?>
                            <div class="mt-3">
                                <span class="float-end"><?php echo $comment->create_at ?></span>
                            </div>
                          
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
              <?php
            require_once('layout/right-side.php');
              ?>
            </div>
        </div>
    </div>

  
<?php
 require_once('layout/footer.php');

?>

