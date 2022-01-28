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
                <h1> Sản phẩm</h1>

            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"> Danh sách sản phẩm</h3>
                                <a class="pull-right btn btn-primary"
                                    href="<?php echo site_url("admin/add_products"); ?>">Thêm mới</a>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> ID</th>
                                            <th> Tên sản phẩm</th>
                                            <th> Danh mục sản phẩm</th>
                                            <th style="width: 290px;">
                                                Mô tả sản phẩm</th>
                                            <th> Ảnh sản phẩm</th>
                                            <th> Giá</th>
                                            <th> Trạng thái</th>
                                            <th class="text-center" style="width: 100px;">
                                                Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($products as $product){ ?>
                                        <tr>
                                            <td class="text-center"><?php echo $product->product_id; ?></td>
                                            <td><?php echo $product->product_name; ?></td>
                                            <td><?php echo $product->title; ?></td>
                                            <td><?php echo $product->product_description; ?></td>
                                            <td><?php if($product->product_image!=""){ ?><div class="cat-img"
                                                    style="width: 50px; height: 50px;"><img width="100%" height="100%"
                                                        src="<?php echo $this->config->item('base_url').'uploads/products/'.$product->product_image; ?>" />
                                                </div> <?php } ?></td>
                                            <td>
                                                <?php echo $product->price. " " .$this->config->item("currency")." mỗi ".$product->unit; ?>
                                            </td>
                                            <td><?php if($product->in_stock == "1"){ ?><span
                                                    class="label label-success">Còn hàng</span><?php } else { ?><span
                                                    class="label label-danger">Hết hàng</span><?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <?php echo anchor('admin/edit_products/'.$product->product_id, '<i class="fa fa-edit"></i>', array("class"=>"btn btn-primary")); ?>
                                                    <?php echo anchor('admin/delete_product/'.$product->product_id, '<i class="fa fa-times"></i>', array("class"=>"btn btn-danger", "onclick"=>"return confirm('Are you sure delete?')")); ?>

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
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    <script>
    $(function() {

        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });

    });
    </script>
</body>

</html>