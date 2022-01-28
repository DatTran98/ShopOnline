<header class="main-header">
    <a href="<?php echo site_url(_get_user_redirect($this)); ?>" class="logo">
        <span class="logo-mini"><b>K</b></span>
        <span class="logo-lg"><b> Kati Flower</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"> <?php echo $this->lang->line("Toggle navigation");?></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url("img/user2-160x160.jpg"); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo _get_current_user_name($this); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?php echo base_url("img/user2-160x160.jpg"); ?>" class="img-circle"
                                alt="User Image">
                            <p><?php echo _get_current_user_name($this); ?></p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url("users/edit_user/"._get_current_user_id($this)); ?>"><i
                                        class="btn btn-default btn-flat"> Chỉnh sửa hồ sơ </i></a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo site_url("admin/signout") ?>" class="btn btn-default btn-flat">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>