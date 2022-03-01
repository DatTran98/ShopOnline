<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kati flower</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/frontend.css"); ?>">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/frontend.js"); ?>"></script>
</head>

<body>
    <div id="viewport">
        <?php  $this->load->view("frontend/customer_sidebar"); ?>
        <div id="content" class="content-wrapper">
            <section class="content-header">
                <h1>Đơn đặt hàng</h1>
            </section>
            <section class="content">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive project-list">
                                <h3>Danh sách đơn hàng</h3>
                                <?php echo $this->session->flashdata("message"); ?>
                                <table class="table data_table" id="table_orders">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Khu vực</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày giao hàng</th>
                                            <th>Thời gian giao hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            foreach($orders as $order)
                            {
                                ?>
                                        <tr>
                                            <td><?php echo $order->sale_id; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($order->created_at)); ?></td>
                                            <td><?php echo $order->socity_name; ?></td>
                                            <td><?php echo $order->user_phone; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($order->on_date)); ?></td>
                                            <td><?php echo date("H:i A", strtotime($order->delivery_time_from))." - ".date("H:i A", strtotime($order->delivery_time_to)); ?>
                                            </td>
                                            <td><?php echo $order->total_amount; ?></td>
                                            <td><?php if($order->status == 0){
                                echo "<span class='badge badge-secondary'>Chờ xử lý</span>";
                            }else if($order->status == 1){
                                echo "<span class='bbadge badge-info'>Đã xác nhận</span>";
                            }else if($order->status == 2){
                                echo "<span class='badge badge-success'>Đã vận chuyển</span>";
                            }else if($order->status == 3){
                                echo "<span class='badge badge-danger'>Đã hủy</span>";
                            }  ?></td>
                                            <td><a href="<?php echo site_url("customer/order_details/".$order->sale_id); ?>"
                                                    class="btn btn-sm btn-warning">Chi tiết</a>
                                                <?php if($order->status == 0){?>
                                                <a href="<?php echo site_url("customer/cancle_order/".$order->sale_id); ?>"
                                                    class="btn btn-sm btn-danger">hủy</a>
                                                <?php }  ?>
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
            <?php  $this->load->view("frontend/common_footer"); ?>
        </div>
    </div>
    <style>
    body {
        background: #F9F7F4;
    }
    </style>
    <script>
    $(document).ready(function() {
        $('#table_orders').DataTable({
            "order": [
                [5, "asc"]
            ]
        });
    });
    </script>
    <!-- footer section ends -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/frontend_sidebar.css"); ?>">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js">
    </script>
</body>

</html>