<?php
$nameErr = '';
$emailErr = '';
$passwordErr = '';


if(isset($_POST['userCreateBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
  
if($name == '') {
    $nameErr = ' The name field is required';
}elseif ($email =='') {
    $emailErr = ' Then email field is required';

}elseif($password == '') {
    $passwordErr = 'The password is required';
   
}else {
    $password = md5($password);
    $stmt = $db->prepare("INSERT INTO users(name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    $result = $stmt->execute();
    if($result) {
       echo "<script>location.href='index.php?page=users'</script>";
    }
}

  
}

?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Create Form</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">User Creation Form</h6>
                            <a href="index.php?page=users" class="btn btn-primary btn-sm "> <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            Back</a>
                        </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control">
                                    <span class="text-danger"><?php echo $nameErr; ?></span>
                                </div>
                                <div class="mb-2">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control">
                                    <span class="text-danger"><?php echo $emailErr; ?></span>
                                </div>
                                <div class="mb-2">
                                    <label for="">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                            
                                </div>
                                <div class="mb-2">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                    <span class="text-danger"><?php echo $passwordErr;?></span>
                                </div>
                                <button name="userCreateBtn" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
    </div>

</div>
</div>