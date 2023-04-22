<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <?php
                    if ($_SESSION['loggedinuserrole'] == 'Admin') {
                    ?>
                        <a class="nav-link collapsed" href="dashboard.php">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboard
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Users
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="allUsers.php">
                                    All Users
                                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>
                                </a>
                                <a class="nav-link" href="addUser.php">Add Users</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Products
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addProduct.php">Add Product</a>
                                <a class="nav-link" href="allProducts.php">All Products</a>
                            </nav>
                        </div>
                    <?php
                    } 
                    ?>
                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">
                        <?php if (isset($_SESSION['loggedinuseremail'])) {
                            echo $_SESSION['loggedinusername'];
                        } ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>