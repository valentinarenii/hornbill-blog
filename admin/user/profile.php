<?php

$userId = $_SESSION['user']->id;

$stmt = $db->prepare("SELECT * FROM users WHERE id=$userId");
$stmt->execute();
$user =  $stmt->fetchObject();
// print_r($user);

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
                            <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
                              
                        </div>
                        <div class="card-body">
                            <div class="my-3">
                                <strong>Name : <?php echo $user->name ?></strong>
                            </div>
                            <div class="my-3"><strong>Email : <?php echo $user->email ?></strong></div>
                            <div class="my-3"><strong>Password : <?php echo $user->password ?></strong></div>
                            <div class="my-3"><strong>Role : <?php echo $user->role ?></strong></div>
                           
                        </div>
                    </div>
                    </div>

                         </div>
                         </div>