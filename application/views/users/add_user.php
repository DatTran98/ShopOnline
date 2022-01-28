<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/select2.min.css"); ?>">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.css"); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.css
    "); ?>">

    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/skins/_all-skins.min.css"); ?>">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php  $this->load->view("admin/common/common_header"); ?>
        <?php  $this->load->view("admin/common/common_sidebar"); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Quản lý người dùng</h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Thêm người dùng</h3>
                            </div>
                            <div class="box-body">

                                <form role="form" action="" method="post">
                                    <div class="box-body">
                                        <?php 
                                echo $this->session->flashdata("message");
                               ?>
                                        <?php if(isset($error) && $error!=""){
                            echo $error;
                        } ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="user_fullname">Họ tên</label>
                                                    <input type="text" class="form-control" id="user_fullname"
                                                        name="user_fullname" placeholder="họ tên" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="user_email">Email</label>
                                                    <input type="email" class="form-control" id="user_email"
                                                        name="user_email" placeholder="user@gmail.com" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="user_password">Mật khẩu</label>
                                                    <input type="password" class="form-control" id="user_password"
                                                        name="user_password" placeholder="mật khẩu" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="user_type">Loại người dùng</label>
                                                    <select class="form-control select2" name="user_type" id="user_type"
                                                        style="width: 100%;">
                                                        <?php foreach($user_types as $user_type){
                                                ?>
                                                        <option value="<?php echo $user_type->user_type_id; ?>">
                                                            <?php echo $user_type->user_type_title; ?></option>
                                                        <?php
                                            } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label for="status">
                                                    <input type="checkbox" id="status" name="status" /> Trạng thái hoạt động
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                        <a class="btn btn-secondary" href="<?php echo site_url("users"); ?>">Quay về</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php  $this->load->view("admin/common/common_footer"); ?>

    </div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jQuery/jQuery-2.1.4.min.js"); ?>">
    </script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/select2.full.min.js"); ?>">
    </script>
    <!-- DataTables -->
    <script
        src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/jquery.dataTables.min.js"); ?>">
    </script>
    <script
        src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.min.js"); ?>">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>

    <script>
    $(function() {
        $(".select2").select2();
    });
    </script>

</body>

</html>