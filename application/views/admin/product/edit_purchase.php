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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/skins/_all-skins.min.css"); ?>">


</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php  $this->load->view("admin/common/common_header"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php  $this->load->view("admin/common/common_sidebar"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $this->lang->line("Purchase");?>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $this->lang->line("Purchase products");?></h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class=""> <?php echo $this->lang->line("Product :");?><span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="product_id">
                                            <?php foreach($products as $product){
                                                    ?>
                                            <option value="<?php echo $product->product_id; ?>"
                                                <?php if($product->product_id == $purchase->product_id) { echo "selected"; } ?>>
                                                <?php echo $product->product_name; ?></option>
                                            <?php
                                                } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class=""><?php echo $this->lang->line("Price :");?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price" class="form-control"
                                            value="<?php echo $purchase->price; ?>" placeholder="00.00" />
                                    </div>
                                    <div class="form-group">
                                        <label class=""><?php echo $this->lang->line("Qty :");?> <span
                                                class="text-danger">*</span> 1000gram = 1 KG</label>
                                        <input type="text" name="qty" class="form-control"
                                            value="<?php echo $purchase->qty; ?>" placeholder="00" />
                                    </div>
                                    <div class="form-group">
                                        <label class=""><?php echo $this->lang->line("Unit :");?> <span
                                                class="text-danger">*</span></label>
                                        <input type="unit" name="unit" value="<?php echo $purchase->unit; ?>"
                                            class="form-control" placeholder="Kg/ gr" />

                                    </div>

                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" name="addcatg" value="Lưu" />

                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div>

                </div>
                <!-- Main row -->
            </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- /.content-wrapper -->

        <?php  $this->load->view("admin/common/common_footer"); ?>


        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

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

</body>

</html>