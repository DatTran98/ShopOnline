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
                <h1>Lịch làm việc</h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Lịch đóng cửa/ nghỉ lễ</h3>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">

                                    <div class="">
                                        <label class="col-md-4">Ngày</label>
                                        <label class="col-md-4">Giờ bắt đầu</label>
                                        <label class="col-md-4">Giờ kết thúc</label>

                                        <div class="col-md-4">
                                            <input type="text" name="date" id="datepicker" class="form-control input-sm"
                                                placeholder="yyyy-mm-dd" />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="opening_time" id="morning_from"
                                                class="form-control input-sm" placeholder="HH:MM PP" />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="closing_time" id="morning_to"
                                                class="form-control input-sm" placeholder="HH:MM PP" />
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" name="addcatg" value="Thêm" />

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Danh sách ngày đóng cửa/ngày nghỉ</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Ngày đóng cửa/Ngày nghỉ</th>
                                            <th>Thời gian</th>
                                            <th class="text-center" style="width: 100px;">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($schedule as $time){ ?>
                                        <tr>
                                            <td><?php echo $time->date; ?></td>
                                            <td><?php echo date("h:i A",strtotime($time->from_time))." đến ".date("h:i A",strtotime($time->to_time)); ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <?php echo anchor('admin/delete_closing_date/'.$time->id, '<i class="fa fa-times"></i>', array("class"=>"btn btn-danger", "onclick"=>"return confirm('Bạn có chắc muốn xóa không?')")); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </aside>
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
    <!-- AdminLTE for demo purposes
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script> -->
    <script>
    $(function() {

        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
    </script>
</body>

</html>