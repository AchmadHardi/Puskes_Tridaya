    <aside class="admin-sidebar">
        <div class="admin-sidebar-brand">
            <!-- begin sidebar branding-->
            <span class="admin-brand-content font-secondary"><a href='media.php'>Puskes Tridaya Sakti</a></span>
            <!-- end sidebar branding-->
            <div class="ml-auto">
                <!-- sidebar pin-->
                <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
                <!-- sidebar close for mobile device-->
                <a href="#" class="admin-close-sidebar"></a>
            </div>
        </div>
        <div class="admin-sidebar-wrapper js-scrollbar">
            <ul class="menu">
                <li class="menu-item active ">
                    <a href="?" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">
                                Dashboard
                            </span>
                        </span>
                        <span class="menu-icon">
                            <!-- <span class="icon-badge badge-success badge badge-pill">4</span> -->
                            <i class="icon-placeholder mdi mdi-home "></i>
                        </span>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="?module=transaksi" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">
                                Transaksi
                            </span>
                        </span>
                        <span class="menu-icon">
                            <!-- <span class="icon-badge badge-success badge badge-pill">4</span> -->
                            <i class="icon-placeholder mdi mdi-cash-register"></i>
                        </span>
                    </a>
                </li>

                <li class="menu-item ">
                    <a href="?module=metode" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">
                                Metode
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-chart-bar "></i>
                        </span>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Master
                                <span class="menu-arrow"></span>
                            </span>
                            <!-- <span class="menu-info">Contains Data</span> -->
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-archive"></i>
                        </span>
                    </a>
                    <ul class="sub-menu">
                        <?php $submenu = array('Laporan','Pasien','Obat','Kategori','User'); ?>
                        <?php $icon = array('mdi mdi-edit','mdi mdi-account','mdi mdi-rhombus-split','mdi mdi-wrap-disabled','mdi mdi-view-week'); ?>
                        <?php for ($i=0; $i < count($submenu); $i++): ?>
                            <li class="menu-item">
                                <a href="?module=<?php echo strtolower($submenu[$i]) ?>" class=" menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name"><?php echo ucwords($submenu[$i]) ?></span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder <?php echo strtolower($icon[$i]) ?>"></i>
                                    </span>
                                </a>
                            </li>
                        <?php endfor ?>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>