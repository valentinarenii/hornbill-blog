
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-cat"></i>
    </div>
    <div class="sidebar-brand-text mx-3">HB - Blog</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li 
<?php
if(isset($_GET['page'])):
    ?>
    class="nav-item ";
    <?php
else:
    ?>
    class="nav-item active";
    <?php
endif;
?>

>
<a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->



<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->




<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Charts -->
<li
<?php
if(isset( $_GET['page'])) {
    if($_GET['page'] === 'Categories' || $_GET['page'] === 'Categories-create' || $_GET['page'] === 'Categories-edit') {
        echo  "class ='nav-item active' ";
    
    }else {
        echo "class='nav-item' ";
    }
    }else {
        echo "class='nav-item' ";
    }

?>

>

    <a class="nav-link" href="index.php?page=Categories">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Category</span></a>
</li>
<li 

<?php
 if(isset($_GET['page'])) {
    if( $_GET['page'] === 'blogs' ||$_GET['page'] === 'blogs-create' || $_GET['page'] === 'blogs-edit') {
        echo "class='nav-item active' ";

    }else {
     echo "class= 'nav-item' ";
    }
    }else {
     echo "class= 'nav-item' ";
    }
 
    ?>
>
    <a class="nav-link" href="index.php?page=blogs">
    <i class="fas fa-fw fa-table"></i>
        <span>Blog</span></a>
</li>
<li
<?php
if(isset($_GET['page'])) {
    if( $_GET['page'] == 'users' || $_GET['page'] == 'users-create'|| $_GET['page'] == 'users-edit') {
        echo " class='nav-item active' ";
    }else {
        echo " class='nav-item' ";

    }
    }else {
        echo " class='nav-item' ";

    }

?>
>
    <a class="nav-link" href="index.php?page=users">
    <i class="fas fa-user-circle"></i>
        <span>User</span></a>
</li>

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> -->
<!-- Nav Item - Form -->
<!-- <li class="nav-item">
    <a class="nav-link" href="form.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Form</span></a>
</li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider d-none d-md-block"> -->

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>