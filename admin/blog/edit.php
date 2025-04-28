<?php
$blogId = $_GET['blog_id'];
#get categroy

$stmt = $db->prepare("SELECT * FROM categories ");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_OBJ);

#get blog
$blogStmt = $db->prepare("SELECT * FROM blogs WHERE id=$blogId");
$blogStmt->execute();
$blog = $blogStmt->fetchObject();
// print_r($blog->photo);




#update blog
$titleErr = '';
$contentErr = '';
$categoryErr = '';
$photoErr = '';

if(isset($_POST['blogUpdateeBtn'])) {
 $title = $_POST['title'];
  $content = $_POST['content'];
  $categoryId = $_POST['category_id'];
  $userId = $_SESSION['user']->id;
  $create_at = date('Y-m-d h:i:s');


  $photoName = $_FILES['photo']['name'];
  $photoTmpName = $_FILES['photo']['tmp_name'];
  $photoType = $_FILES['photo']['type'];


  if($title == '') {
    $titleErr = 'the title field is required';

  }elseif($content == '') {
    $contentErr = 'the content field is required';

  }
  elseif($categoryId == '') {
    $categoryErr = 'the category field is required';

  } else {
    if($photoName == '') {
        $stmt  = $db->prepare("UPDATE blogs SET title='$title',category_id='$categoryId',content='$content' WHERE id=$blogId");

    }else {
        #delete old photo
        unlink("../assets/blog-images/$blog->photo");
        if(in_array($photoType,['image/png', 'image/jpg', 'image/jpeg'])) {
            move_uploaded_file($photoTmpName, "../assets/blog-images/$photoName");
         } 
         $stmt  = $db->prepare("UPDATE blogs SET title='$title',category_id='$categoryId', content='$content',photo='$photoName' WHERE id=$blogId");

    }
  

    $result = $stmt->execute();
    if($result) {
        echo " <script>sweetalert('updated a blog', 'blogs')</script>";
    }

    }
  
  
}


?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Blog Edit Form</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Blog Edit Form</h6>
                            <a href="index.php?page=blogs" class="btn btn-primary btn-sm "> <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            Back</a>
                        </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-2">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="<?php echo $blog->title ?>" class="form-control">
                                    <span class="text-danger"><?php echo $titleErr ?></span>
                                </div>
                                <div class="mb-2">
                                    <label for="">Category</label>
                                 <select name="category_id" id="" class="form-control"aria-label="Default select example">
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $category):?>
                                    <option value="<?php echo $category->id ?>"
                                        <?php
                                      if($category->id == $blog->category_id) {
                                          echo 'selected';
                                      }
                                        ?>>
                                    <?php echo $category->name ?></option>
                                    <?php
                           
                                   endforeach;
                                   ?>
                                 </select>
                                
                                 

                                    <span class="text-danger"><?php echo $categoryErr ?></span>
                                </div>
                                <div class="mb-2">
                                    <label for="">Content</label>
                               <textarea name="content" class="form-control" value="" rows="10" id=""><?php echo $blog->content ?></textarea>
                                    <span class="text-danger"><?php echo $contentErr ?></span>
                                </div>
                                <div class="mb-2">
                                    <label for="">Photo</label>
                                  <input type="file" name="photo" class="form-control">
                                  <img class="my-2" src="../assets/blog-images/<?php  echo $blog->photo ?>" alt="" style="width: 150px;">
                                  <span class="text-danger"><?php echo $photoErr ?></span>
                                </div>
                                <button name="blogUpdateeBtn" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
    </div>

</div>
</div>
