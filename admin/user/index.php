       <?php
     $stmt = $db->prepare("SELECT * FROM users");
     $stmt->execute();
     $users = $stmt->fetchAll(PDO::FETCH_OBJ);
  

     if(isset($_POST['userDeleteBtn'])) {
       $user_Id = $_POST['user_id'];
       $stmt = $db->prepare("DELETE FROM users Where id=$user_Id");
       $result=  $stmt->execute();

 if($result) {
    echo "<script>location.href='index.php?page=users'</script>";
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
                            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                            <a href="index.php?page=users-create" class="btn btn-primary btn-sm "> <i class="fa fa-plus" aria-hidden="true"></i>
                            Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    <?php
                                   foreach($users as $user):
                                   ?>
                                    <tr>
                                    <td><?php echo $user->id ?></td>
                                    <td><?php echo $user->name ?></td>
                                   <td><?php echo $user->email?></td>
                                    <td><?php echo $user->role ?></td>
                              
                                    
            
                                    <td>

                                    
                                    <form method="post" >
                                        <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
                                    <a href="index.php?page=users-edit&user_id=<?php echo $user->id ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <button name="userDeleteBtn" class="btn btn-danger btn-sm" onclick="return confirm('are you sure to delete?')"><i class="fas fa-trash"></i></button>
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