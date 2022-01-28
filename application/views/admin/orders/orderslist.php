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
            <section class="content-header"><h1> Đơn đặt hàng</h1></section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo $this->session->flashdata("message"); ?>
                        <div class="box box-primary">
                            <div class="box-header"><h3>Danh sách đơn hàng</h3>
                            </div>
                            <div class="box-body table-responsive">
                                <table class="table data_table">
                                    <thead>
                                        <tr>
                                            <th> Mã đơn hàng</th>
                                            <th> Ngày đặt hàng</th>
                                            <th> Tên khách hàng</th>
                                            <th> Khu vực</th>
                                            <th> Số điện thoại</th>
                                            <th> Ngày giao hàng</th>
                                            <th> Thời gian giao hàng</th>
                                            <th> Tổng tiền</th>
                                            <th> Trạng thái đơn hàng</th>
                                            <th> Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($today_orders as $order){?>
                                        <tr>
                                            <td><?php echo $order->sale_id; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($order->created_at)); ?></td>
                                            <td><?php echo $order->user_fullname; ?></td>
                                            <td><?php echo $order->socity_name; ?></td>
                                            <td><?php echo $order->user_phone; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($order->on_date)); ?></td>
                                            <td><?php echo date("H:i A", strtotime($order->delivery_time_from))." - ".date("H:i A", strtotime($order->delivery_time_to)); ?>
                                            </td>
                                            <td><?php echo $order->total_amount; ?> vnd</td>
                                            <td>
                                            <?php if($order->status == 0){
                                                echo "<span class='label label-default'>Chờ xác nhận</span>";
                                            }else if($order->status == 1){
                                                echo "<span class='label label-success'>Đã xác nhận</span>";
                                            }else if($order->status == 2){
                                                echo "<span class='label label-info'>Đã vận chuyển</span>";
                                            }else if($order->status == 3){
                                                echo "<span class='label label-danger'>Hủy</span>";
                                            }  ?>
                                            </td>
                                            <td><a href="<?php echo site_url("admin/orderdetails/".$order->sale_id); ?>"
                                                    class="btn btn-sm btn-default">Chi tiết</a>
                                                <div class="dropdown">
                                                    <button class="btn btn-success dropdown-toggle" type="button"
                                                        data-toggle="dropdown"> Hành động <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("admin/cancle_order/".$order->sale_id); ?>">
                                                                Hủy</a></li>
                                                        <?php if($order->status == 0){
                                                            echo "<li><a href='".site_url("admin/confirm_order/".$order->sale_id)."'>Xác nhận</a></li>";
                                                        }else if($order->status == 1){
                                                            echo "<li><a href='".site_url("admin/delivered_order/".$order->sale_id)."'>Đã vận chuyển</a></li>";
                                                        }  ?>
                                                        <li><a href="<?php echo site_url("admin/delete_order/".$order->sale_id); ?>"> Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
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
            "order": [
                [0, "desc"]
            ],
            buttons: [
                'excel', 'pdf', 'print'
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