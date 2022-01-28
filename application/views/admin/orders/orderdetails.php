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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" />
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
                <h1>Chi tiết đơn hàng</h1>

            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>

                        <div class="box box-primary">
                            <div class="box-header">
                                <input type="button" value="Print" onclick="window.print()"
                                    class="con_txt2 non-print" />
                                <a class="pull-right btn btn-primary"
                                    href="<?php echo site_url("admin/orders"); ?>">Quay lại</a>
                            </div>
                            <div class="box-body table-responsive">
                                <table class="table table-bordered data_table">
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <table class="table">
                                                    <tr>
                                                        <td valign="top">
                                                            <strong>
                                                                Mã đơn hàng: <?php echo $order->sale_id; ?></strong>
                                                            <br />
                                                            <strong> Ngày đặt hàng:
                                                                <?php echo date("d-m-Y h:i A",strtotime($order->created_at)); ?></strong>
                                                            <br />

                                                        </td>
                                                        <td>
                                                            <strong>
                                                                Chi tiết vận chuyển: </strong><br />
                                                            <strong> Liên hệ:
                                                                <?php echo $order->user_fullname ; ?> <br /> Phone :
                                                                <?php echo $order->user_phone; ?></strong><br />
                                                            <strong>
                                                                Địa chỉ: </strong>
                                                            <address>
                                                                <?php echo $order->socity_name; ?><br />
                                                                <?php echo $order->house_no; ?>
                                                            </address><br />
                                                            Ngày giao hàng:
                                                            <?php echo date("d-m-Y", strtotime($order->on_date)); ?>
                                                            <br />
                                                            Thời gian giao hàng:
                                                            <?php echo $order->delivery_time_from." đến ".$order->delivery_time_to; ?>
                                                            </p>

                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Tên sản phẩm</th>
                                            <th> Số lượng</th>
                                            <th> Giá sản phẩm
                                                <?php echo $this->config->item("currency");?></th>
                                        </tr>
                                        <?php $total_price = 0;
                                foreach($order_items as $items){
                                    ?>
                                        <tr>
                                            <td><?php echo $items->product_name; ?><br />
                                                <?php echo $items->unit_value." ".$items->unit. " ($items->price ".$this->config->item("currency").") "; ?>
                                            </td>
                                            <td>
                                                <?php echo $items->qty ; ?>
                                            </td>
                                            <td>
                                                <?php echo $items->qty * $items->price;
                                            $total_price = $total_price + ($items->qty * $items->price);
                                             ?>
                                            </td>
                                        </tr>
                                        <?php
                                }
                                ?>
                                        <tr>
                                            <td colspan="2"><strong class="pull-right">
                                                    Tổng tiền sản phẩm</strong></td>
                                            <td>
                                                <strong class=""><?php echo $total_price; ?>
                                                    <?php echo $this->config->item("currency");?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong class="pull-right">Phí vận chuyển :</strong></td>
                                            <td>
                                                <strong class=""><?php echo $order->delivery_charge; ?>
                                                    <?php echo $this->config->item("currency");?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong class="pull-right">Tổng tiền phải trả :</strong>
                                            </td>
                                            <td>
                                                <strong
                                                    class=""><?php echo $net = $total_price + $order->delivery_charge; ?><?php echo $this->config->item("currency");?>
                                                </strong>
                                            </td>
                                        </tr>
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
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>



    </script>
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


</body>

</html>