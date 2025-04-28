<?php
$userId = $_GET['user_id'];

#get user
$stmt = $db->prepare("SELECT * FROM users WHERE id=$userId");
$stmt->execute();
$user = $stmt->fetchObject();


$nameErr = '';
$emailErr = '';
$passwordErr = '';


if(isset($_POST['userUpdateBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
  
if($name == '') {
    $nameErr = ' The name field is required';
}elseif ($email =='') {
    $emailErr = ' Then email field is required';

}else {
    if($password == '') {
        $stmt = $db->prepare("UPDATE users SET name='$name', email='$email',role='$role' WHERE id=$userId");
    }else {
        $password = md5($password);
        $stmt = $db->prepare("UPDATE users SET name='$name', email='$email', password='$password',role='$role' WHERE id=$userId");
    }
  
    $result = $stmt->execute();
    if($result) {
        echo " <script>sweetalert('updated a user', 'users')</script>";
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
                            <h6 class="m-0 font-weight-bold text-primary">User Edit Form</h6>
                            <a href="index.php?page=users" class="btn btn-primary btn-sm "> <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            Back</a>
                        </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="<?php echo $user->name ?>" class="form-control">
                                    <span class="text-danger"><?php echo $nameErr; ?></span>
                                </div>
                                <div class="mb-2">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="<?php echo $user->email ?>" class="form-control">
                                    <span class="text-danger"><?php echo $emailErr; ?></span>
                                </div>
                                <div class="mb-2">
                                    <label for="">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin"
                                            <?php if($user->role == 'admin'): ?>
                                                selected
                                                <?php endif ?>
                                            >Admin
                                        </option>
                                        <option value="user"
                                        <?php if($user->role == 'user'): ?>
                                                selected
                                                <?php endif ?>
                                                >User
                                        </option>
                                    </select>
                            
                                </div>
                                <div class="mb-2">
                                   
                                    <label for="">Password</label>
                                    <input type="checkbox" onclick="showPasswordInput()" id="checkbox">
                                    <input type="text" name="password" id="password-input" class="form-control" style="display: none;" placeholder="Enter new password" >
                                    <span class="text-danger"><?php echo $passwordErr;?></span>
                                </div>
                                <button name="userUpdateBtn" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
    </div>

</div>
</div>
<script>
   function showPasswordInput() {
    let checkbox = document.getElementById('checkbox');
    let passwordInput = document.getElementById('password-input');
   
    if(checkbox.checked) {
        passwordInput.style.display = 'block';
    }else {
        passwordInput.style.display = 'none';
    }
   }
</script>