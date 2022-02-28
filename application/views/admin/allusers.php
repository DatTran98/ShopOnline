<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/plugins/daterangepicker/daterangepicker-bs3.css"); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.min.css
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
                    Khách hàng
                </h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"> Danh sách khách hàng</h3>

                            </div>
                            <div class="box-body table-responsive">
                                <table id="tbl_customer" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ Tên</th>
                                            <th>Số điện thoại </th>
                                            <th>Email</td>
                                            <th>Tổng đơn đặt hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user)
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $user->user_id; ?></td>
                                            <td><?php echo $user->user_fullname; ?></td>
                                            <td><?php echo $user->user_phone; ?></td>
                                            <td><?php echo $user->user_email; ?></td>
                                            <td><?php echo $user->total_orders; ?></td>
                                            <td><?php echo (($user->total_amount*100)/100); ?></td>
                                            <td><?php if($user->status == "1"){ ?><span
                                                    class="label label-success"><?php echo $this->lang->line("Active");?></span><?php } else { ?><span
                                                    class="label label-danger"><?php echo $this->lang->line("Deactive");?></span><?php } ?>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script
        src="<?php echo base_url($this->config->item("theme_admin")."/plugins/daterangepicker/daterangepicker.js"); ?>">
    </script>
    <script>
    $('#tbl_customer').DataTable();
    </script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.data_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/pages/dashboard.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    <!-- date-range-picker -->

</body>

</html>