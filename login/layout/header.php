      <header class="admin-header">
        <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>
        <nav class=" mr-auto my-auto">
            <ul class="nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" data-target="#siteSearchModal" data-toggle="modal" href="#">
                        <i class=" mdi mdi-magnify mdi-24px align-middle"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <nav class=" ml-auto">
            <ul class="nav align-items-center">
                <li class="nav-item ml-3"><?php echo $_SESSION['username']; ?></li>
                <li class="nav-item ml-3 dropdown ">
                    <div class="avatar avatar-sm avatar-online">
                        <span class="avatar-title rounded-circle bg-dark">A</span>
                    </div>
                <!-- <div class="dropdown-menu  dropdown-menu-right"   >
                    <a class="dropdown-item"></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?logout" style="color: red"> Logout</a>
                </div> -->
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link btn btn-danger" href="?logout">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
</header>