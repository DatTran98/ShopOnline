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
                <h1> Lịch làm việc </h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Thời gian làm việc</h3>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <label
                                                class="col-md-6">Giờ mở cửa</label>
                                            <label
                                                class="col-md-6">Giờ đóng cửa</label>
                                          
                                            <div class="col-md-6">
                                                <input type="text" name="opening_time" id="morning_from"
                                                    value="<?php echo (!empty($schedule) &&  $schedule->opening_time != "" ) ?  date("h:i A",strtotime( $schedule->opening_time )) :  ""; ?>"
                                                    class="form-control input-sm" placeholder="HH:MM PP" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="closing_time" id="morning_to"
                                                    value="<?php echo (!empty($schedule) && $schedule->closing_time != "") ?  date("h:i A",strtotime( $schedule->closing_time )) :  ""; ?>"
                                                    class="form-control input-sm" placeholder="HH:MM PP" />
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" name="savecat" value="Lưu" />

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
    <script
        src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datepicker/jquery.timepicker.min.js"); ?>">
    </script>
    <script>
    $(document).ready(function() {

        $('#morning_from,#morning_to').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            minTime: '6',
            maxTime: '12:00pm',
            startTime: '06:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
    </script>
</body>

</html>