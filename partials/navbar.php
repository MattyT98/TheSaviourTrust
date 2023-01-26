<?php
    include "relativePath.php";
    include "../js/admin_navigation.php";    
?>
<!DOCTYPE html>
<html> 
     <!-- Side Navbar -->
     <nav id="sidebarMenu" class="collapse navbar-collapse d-lg-block sidebar collapse navbarExtras">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="<?php echo $Path.'/pages/home.php'?>" class="<?php echo ($page == "Home" ? "nav-link active" : "nav-link")?> navbarExtra list-group-item-action ripple" aria-current="true">
                    <i class="fas fa-chart-line fa-fw me-3"></i><span class="nav-text">Home</span>
                </a>
                <form id="form" action="../php/admin_permission_check.php" method="POST">                     
                    <a href="javascript: submit()" class="<?php echo ($page == "Admin" ? "nav-link active" : "nav-link")?> navbarExtra list-group-item-action ripple">
                        <i class="fas fa-chart-line fa-fw me-3"></i><span class="nav-text">Admin</span>
                    </a>                    
                </form>
                <a href="<?php echo $Path.'/pages/visitForm.php'?>" class="<?php echo ($page == "Visit Form" ? "nav-link active" : "nav-link")?> navbarExtra list-group-item-action ripple">
                    <i class="fas fa-chart-line fa-fw me-3"></i><span class="nav-text">Visit Form</span>
                </a>
                <a href="<?php echo $Path.'/php/logout.php'?>" class="list-group-item list-group-item-action py-2 ripple"><span class="text-danger">Logout</span></a>
            </div>
        </div>
    </nav>

    <!-- Top Navbar -->
    <nav id="main-navbar" class="navbar navbar-ontop navbar-expand-lg navbar-light fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="sideBarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-light"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $Path.'/pages/home.php'?>">
                <img src="<?php echo ($Path)?>/images/NavLogo.png" height="50" alt="MDB Logo" loading="lazy"/>
            </a>

            <!-- Search form -->
            <form class="d-none d-md-flex input-group w-auto my-auto">
                <input autocomplete="off" type="search" class="form-control rounded" placeholder='Search' style="min-width: 225px;"/>
            </form>
        </div>
    </nav>
</html>


