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
                <h1>
                    <?php echo $this->lang->line("Categories"); ?>
                </h1>

            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('success_req'); ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"> Thêm mới danh mục</h3>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class=""> Tên danh mục<span class="text-danger">*</span></label>
                                        <input type="text" name="cat_title" class="form-control"
                                            placeholder="Tên danh mục" />
                                    </div>
                                    <div class="form-group">
                                        <label class=""> Danh mục cha <span class="text-danger">*</span></label>
                                        <select class="text-input form-control" name="parent">
                                            <option value="0"> Không</option>
                                            <?php  
                                                    echo printCategory(0,0,$this);
                                                    function printCategory($parent,$leval,$th){
                                                    
                                                    $q = $th->db->query("SELECT a.*, Deriv1.count FROM `categories` a  LEFT OUTER JOIN (SELECT `parent`, COUNT(*) AS count FROM `categories` GROUP BY `parent`) Deriv1 ON a.`id` = Deriv1.`parent` WHERE a.`parent`=" . $parent);
                                                    $rows = $q->result();
                            
                                                    foreach($rows as $row){
                                                        if ($row->count > 0) {
                                                				
                                                                    //print_r($row) ;
                                                					//echo "<option value='$row[id]_$co'>".$node.$row["alias"]."</option>";
                                                                    printRow($row);
                                               					   // printCategory($row->id, $leval + 1,$th);
                                                					
                                                				} elseif ($row->count == 0) {
                                                					printRow($row);
                                                                    //print_r($row);
                                                				}
                                                        }
                            
                                                    }
                                                    function printRow($d){
                                                          
                                                   // foreach($data as $d){
                                                    ?>
                                            <option value="<?php echo $d->id; ?>">
                                                <?php for($i=0; $i<$d->leval; $i++){ echo "_"; } echo $d->title; ?>
                                            </option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> Ảnh danh mục </label>
                                        <input type="file" name="cat_img" />
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="cat_status" id="optionsRadios1" value="1"
                                                    checked />
                                                Hoạt động </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="cat_status" id="optionsRadios2" value="0" />
                                                Không hoạt động
                                            </label>
                                        </div>
                                        <p class="help-block"> Trạng thái danh mục
                                        </p>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" name="addcatg" value="Thêm" />
                                    <a class="btn btn-secondary" href="<?php echo site_url("admin/listcategories"); ?>">Quay về</a>
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