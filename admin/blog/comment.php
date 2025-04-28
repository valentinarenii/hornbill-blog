<?php
$blogId = $_GET['blog_id'];

  //  get comments depending on blog
  $stmt = $db->prepare("SELECT comments.id, comments.text,comments.create_at, users.name FROM comments INNER JOIN users ON comments.user_id= users.id WHERE blog_id=$blogId");
  $stmt->execute();
  $comments =  $stmt->fetchAll(PDO::FETCH_OBJ);

//   print_r($comments);
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
                            <h6 class="m-0 font-weight-bold text-primary">Comments List</h6>
                            <a href="index.php?page=blogs" class="btn btn-primary btn-sm "> <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            Back</a>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                            <?php if(count($comments) >=1): ?> 
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Text</th>
                                            <th>User</th>
                                            <th>Create at</th>
                                         
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                 <?php
                                   foreach($comments as $comment):
                                   ?>
                                    <tr>
                                    <td><?php echo $comment->id ?></td>
                                    <td><?php echo $comment->text ?></td>
                                    <td><?php echo $comment->name ?></td>
                                    <td><?php echo $comment->create_at ?></td>
                                
                              
                           
                                    
                                   
                                    </td>
                                    
                                </tr>
                                   <?php

                                   endforeach;
                                   ?>
                                      
                                    </tbody> 
                                </table>
                                <?php else:  ?>
                                    <p class="textt-primary">No Comment
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    </div>

                         </div>
                         </div>
                         <?php
               
                         ?>
                    