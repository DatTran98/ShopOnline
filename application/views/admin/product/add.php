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
                    <div class="col-md-6">
                        <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Thêm sản phẩm</h3>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="">Tên sản phẩm <span class="text-danger">*</span></label>
                                        <input type="text" name="prod_title" class="form-control"
                                            placeholder="Tên sản phẩm" />
                                    </div>
                                    <div class="form-group">
                                        <label class="">Danh mục sản phẩm <span class="text-danger">*</span></label>
                                        <select class="text-input form-control" name="parent">
                                            <option value="">Chọn sanh mục</option>
                                            <?php  
                                                    echo printCategory(0,0,$this);
                                                    function printCategory($parent,$leval,$th){
                                                    
                                                    $q = $th->db->query("SELECT a.*, Deriv1.count FROM `categories` a  LEFT OUTER JOIN (SELECT `parent`, COUNT(*) AS count FROM `categories` GROUP BY `parent`) Deriv1 ON a.`id` = Deriv1.`parent` WHERE a.`status`=1 and a.`parent`=" . $parent);
                                                    $rows = $q->result();
                            
                                                    foreach($rows as $row){
                                                        if ($row->count > 0) {
                                                				
                                                                    //print_r($row) ;
                                                					//echo "<option value='$row[id]_$co'>".$node.$row["alias"]."</option>";
                                                                    printRow($row,true);
                                               					    printCategory($row->id, $leval + 1,$th);
                                                					
                                                				} elseif ($row->count == 0) {
                                                					printRow($row,false);
                                                                    //print_r($row);
                                                				}
                                                        }
                            
                                                    }
                                                     
                                                    function printRow($d,$bool){
                                                          
                                                   // foreach($data as $d){
                                                    ?>
                                            <option value="<?php echo $d->id; ?>"
                                                <?php if($d->parent == "0" && $d->leval == "0" && $bool){echo "disabled";} ?>
                                                <?php if(isset($_REQUEST["parent"]) && $_REQUEST["parent"]==$d->id){echo "selected"; } ?>>
                                                <?php for($i=0; $i<$d->leval; $i++){ echo "_"; } echo $d->title; ?>
                                            </option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class=""> Mô tả sản phẩm</label>
                                        <textarea name="product_description" class="textarea"
                                            placeholder="Thêm mô tả sản phẩm tại đây"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm </label>
                                        <input type="file" name="prod_img" />
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="prod_status" id="optionsRadios1" value="1"
                                                    checked />
                                                Còn hàng
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="prod_status" id="optionsRadios2" value="0" />
                                                Hết hàng
                                            </label>
                                        </div>
                                        <p class="help-block">Trạng thái</p>
                                    </div>

                                    <div class="form-group">
                                        <label class="">Giá sản phẩm <span class="text-danger">*</span></label>
                                        <input type="text" name="price" class="form-control" placeholder="00.00" />
                                    </div>
                                    <div class="form-group">
                                        <label class="">Số lượng <span class="text-danger">*</span></label>
                                        <input type="text" name="qty" class="form-control" placeholder="00" />
                                    </div>
                                    <div class="form-group">
                                        <label class="">Đơn vị tính <span class="text-danger">*</span></label>
                                        <select name="unit" class="form-control">
                                            <option class="gram" value="gram">Gram</option>
                                            <option class="kg" value="kg">Kg</option>
                                            <option class="nos" value="nos">Túi/hộp/bó</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" name="addcatg" value="Thêm" />
                                    <a class="btn btn-secondary" href="<?php echo site_url("admin/products"); ?>">Quay
                                        về</a>
                                </div>
                            </form>
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
</body>

</html>