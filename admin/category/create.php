
<?php
$nameErr = "";
if(isset($_POST['categoryCreateBtn'])) {
    $name =  $_POST['name'];
     if($name === '') {
       $nameErr = "The name field is require.";
       
     }else {
        $stmt =  $db->prepare("INSERT INTO categories (name) VALUES ('$name')");
        $stmt->execute();
        echo " <script>sweetalert('created a category', 'Categories')</script>";
     }
   
}
?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category Create</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Category Creation Form</h6>
                            <a href="index.php?page=Categories" class="btn btn-primary btn-sm "><i class="fa fa-chevron-left" aria-hidden="true"></i>
                            Back</a>
                        </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control">
                                    <span class="text-danger"><?php echo $nameErr ?></span>
                                </div>
                                <button name="categoryCreateBtn" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
    </div>

</div>
</div>