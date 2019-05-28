<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_info">
        <h2>Welcome <br><?= $this->session->userdata("nama") ?></h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <?php if($this->session->userdata('level') == "admin"){ ?>
                <li>
                    <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/karyawan') ?>"><i class="fa fa-users"></i> Data Karyawan</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/product') ?>"><i class="fa fa-cubes"></i> Data Product</a>
                </li>
            <?php }else{ ?>

            <?php } ?>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- don't delete this tag -->
</div>
</div>
<!-- ============ -->

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <?php if($this->session->userdata('level') == "admin"){ ?>
                    <li class="">
                        <a href="<?php echo base_url('admin/dashboard/logout') ?>">Log Out
                            &nbsp;<i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->