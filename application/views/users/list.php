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
                <h1>
                    <?php echo $this->lang->line("Manage Users");?>
                </h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Danh sách người dùng</h3>
                                <a class="pull-right btn btn-primary"
                                    href="<?php echo site_url("users/add_user"); ?>">Thêm mới</a>
                            </div>

                            <div class="box-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> Email </th>
                                            <th> Họ tên </th>
                                            <th> Trạng thái hoạt động </th>

                                            <th width="80"> Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user){
                    ?>
                                        <tr>
                                            <td><?php echo $user->user_email; ?></td>
                                            <td><?php echo $user->user_fullname; ?></td>


                                            <td><input class='tgl tgl-ios tgl_checkbox' data-table="users"
                                                    data-status="user_status" data-idfield="user_id"
                                                    data-id="<?php echo $user->user_id; ?>"
                                                    id='cb_<?php echo $user->user_id; ?>' type='checkbox'
                                                    <?php echo ($user->user_status==1)? "checked" : ""; ?> />
                                                <label class='tgl-btn' for='cb_<?php echo $user->user_id; ?>'></label>
                                            </td>
                                            <td>

                                                <a href="<?php echo site_url("users/edit_user/".$user->user_id); ?>"
                                                    class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <?php echo anchor('users/delete_user/'.$user->user_id, '<i class="fa fa-remove"></i>', array("class"=>"btn btn-danger", "onclick"=>"return confirm('Bạn có chắc muốn xóa người dùng không?')")); ?>
                                            </td>
                                        </tr>
                                        <?php
                } ?>
                                    </tbody>
                                </table>
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

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        $("body").on("change", ".tgl_checkbox", function() {
            var table = $(this).data("table");
            var status = $(this).data("status");
            var id = $(this).data("id");
            var id_field = $(this).data("idfield");
            var bin = 0;
            if ($(this).is(':checked')) {
                bin = 1;
            }

            $.ajax({
                    method: "POST",
                    url: "<?php echo site_url("admin/change_status"); ?>",
                    data: {
                        table: table,
                        status: status,
                        id: id,
                        id_field: id_field,
                        on_off: bin
                    }
                })
                .done(function() {
                    alert("Thay đổi trạng thái thành công");
                });
        });
    });
    </script>
</body>

</html>