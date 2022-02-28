<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url("img/user2-160x160.jpg"); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php _get_current_user_name($this); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Đang hoạt động</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?php echo site_url("admin/dashboard"); ?>">
                    <i class="fa fa-dashboard"></i> <span>Trang chủ</span><small
                        class="label pull-right bg-green"></small>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url("admin/listcategories"); ?>">
                    <i class="fa fa-list"></i> <span> Danh mục sản phẩm</span> <small
                        class="label pull-right bg-green"></small>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url("admin/products"); ?>">
                    <i class="fa fa-list-alt"></i> <span> Sản phẩm</span> <small
                        class="label pull-right bg-green"></small>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url("admin/orders"); ?>">
                    <i class="fa fa-slack"></i> <span> Đơn hàng</span> <small class="label pull-right bg-green"></small>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url("admin/registers"); ?>">
                    <i class="fa fa-mobile"></i> <span> Khách hàng</span> <small
                        class="label pull-right bg-green"></small>
                </a>
            </li>


            <li>
                <a href="<?php echo site_url("admin/stock"); ?>">
                    <i class="fa fa-sticky-note-o"></i> <span> Tồn kho</span> <small
                        class="label pull-right bg-green"></small>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url("admin/add_purchase"); ?>">
                    <i class="fa fa-shopping-cart"></i> <span> Nhập hàng</span> <small
                        class="label pull-right bg-green"></small>
                </a>
            </li>
            <?php if(_get_current_user_type_id($this)==0){ ?>
            <li>
                <a href="#">
                    <i class="fa fa-users"></i> <span> Người dùng</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url("users"); ?>"><i class="fa fa-circle-o"></i>
                            Danh sách người dùng</a></li>
                    <li><a href="<?php echo site_url("users/add_user"); ?>"><i class="fa fa-circle-o"></i>
                            Thêm mới</a></li>

                </ul>
            </li>
            <?php  } ?>
            <li>
                <a href="<?php echo site_url("admin/socity"); ?>">
                    <i class="fa fa-map-signs"></i> <span> Khu vực</span> <small
                        class="label pull-right bg-green"></small>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-clock-o"></i> <span>
                        Lịch làm việc</span><i class="fa fa-angle-left pull-right"></i></small>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo site_url("admin/time_slot"); ?>">
                            <i class="fa fa-clock-o"></i> <span> Thời gian làm việc</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("admin/closing_hours"); ?>">
                            <i class="fa fa-clock-o"></i> <span> Thời gian đóng cửa</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
</aside>