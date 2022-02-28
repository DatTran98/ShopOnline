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

    <section>
        <?php  $this->load->view("frontend/customer_sidebar"); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Chi tiết đơn hàng</h1>

            </section>

            <section class="content">
                <div class="col-xs-12">
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="box box-primary">
                        <div class="box-header">
                            <input type="button" value="Print" onclick="window.print()"
                                class="con_txt2 non-print btn btn-secondary mb-3" />
                            <a class="pull-right mb-3" href="<?php echo site_url("customer/orders"); ?>">Quay
                                lại</a>
                        </div>
                        <?php if(isset($order)){?>
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
                                                            Chi tiết vận chuyển: </strong> <?php if($order->status == 0){echo "<span class='badge badge-secondary'>Chờ xử lý</span>";
                                                            }else if($order->status == 1){
                                                                echo "<span class='bbadge badge-info'>Đã xác nhận</span>";
                                                            }else if($order->status == 2){
                                                                echo "<span class='badge badge-success'>Đã vận chuyển</span>";
                                                            }else if($order->status == 3){
                                                                echo "<span class='badge badge-danger'>Đã hủy</span>";
                                                            }  ?><br />
                                                        <strong> Trạng thái thanh toán:
                                                            <?php if($order->is_paid == 1){  echo "<span class='badge badge-info'>Đã thanh toán</span>";
                                                            }else {echo "<span class='badge badge-warning'>Chưa thanh toán</span>"; }?>
                                                            <br />
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
                        <?php }?>
                    </div>

                </div>
            </section>
        </div>
        <?php  $this->load->view("frontend/common_footer"); ?>
    </section>
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