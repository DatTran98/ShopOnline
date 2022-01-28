<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.css"); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.css
    "); ?>">
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/skins/_all-skins.min.css"); ?>">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php  $this->load->view("admin/common/common_header"); ?>
      <?php  $this->load->view("admin/common/common_sidebar"); ?>

      <div class="content-wrapper">
                 <section class="content-header">
                    <h1> Nhập hàng</h1>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"> Nhập sản phẩm</h3>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="">Chọn sản phẩm <span class="text-danger">*</span></label>
                                            <select class="form-control" name="product_id">
                                                <?php foreach($products as $product){
                                                    ?>
                                                    <option value="<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class=""> Giá nhập hàng <span class="text-danger">*</span></label>
                                            <input type="text" name="price" class="form-control" placeholder="00.00"/>
                                        </div>
                                        <div class="form-group">
                                            <label class=""> Số lượng <span class="text-danger">*</span></label>
                                            <input type="text" name="qty" class="form-control" placeholder="00"/>
                                        </div>
                                        <div class="form-group">
                                            <label class=""> Đơn vị<span class="text-danger">*</span></label>
                                             <select name="unit" class="form-control" >
                                             <option class="gram" value= "gram">Gram</option>
                                                <option class="kg" value= "kg" >Kg</option>
                                                <option class="nos" value= "nos">Túi/hộp/bó</option>
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" name="addcatg" value="Thêm" />
                                        <a class="btn btn-secondary" href="<?php echo site_url("admin/stock"); ?>">Quay
                                        về</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Danh sách đơn nhập hàng</h3>                                    
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th> Tên sản phẩm></th>
                                                <th> Số lượng</th>
                                                <th> Đơn vị</th>
                                                <th class="text-center" style="width: 100px;"> Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($purchases as $purchase){ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $purchase->purchase_id; ?></td>
                                                <td><?php echo $purchase->product_name; ?></td>
                                                <td><?php echo $purchase->qty; ?></td>
                                                <td><?php echo $purchase->unit; ?></td>
                                                <td class="text-center"><div class="btn-group">
                                                        <?php echo anchor('admin/edit_purchase/'.$purchase->purchase_id, '<i class="fa fa-edit"></i>', array("class"=>"btn btn-primary")); ?>
                                                        <?php echo anchor('admin/delete_purchase/'.$purchase->purchase_id, '<i class="fa fa-times"></i>', array("class"=>"btn btn-danger", "onclick"=>"return confirm('Are you sure delete?')")); ?>
                                                        
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
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jQuery/jQuery-2.1.4.min.js"); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    
  </body>
</html>
