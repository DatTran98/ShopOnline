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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/frontend.js"); ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/frontend.css"); ?>">
</head>

<body>
    <?php  $this->load->view("frontend/customer_sidebar"); ?>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <?php if(isset($error) && $error!=""){
                                    echo $error;
                                    } ?>
                        <form action="<?php echo site_url("customer/update_address"); ?>" method="post">
                            <div class="card-body">
                            <input type="hidden" class="form-control user-info" name="location_id" value="<?php echo $location->location_id;?>">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Họ tên người nhận</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control user-info" name="receiver_name" value="<?php echo $location->receiver_name;?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Số điện thoại</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control user-info" name="receiver_mobile"
                                            value="<?php echo $location->receiver_mobile;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Khu vực</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="select btn" id='select_delivery' name="socity_id">
                                            <?php foreach($socities as $socity){ ?>
                                            <option value="<?php echo $socity->socity_id;?>" <?php if($socity->socity_id == $location->socity_id) echo "selected";?>>
                                                <?php echo $socity->socity_name;?>
                                            </option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Địa chỉ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control user-info" name="house_no" value="<?php echo $location->house_no;?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="summit" class="btn btn-primary px-4" id="btn-save">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php  $this->load->view("frontend/common_footer"); ?>
    </div>

    <style>
    body {
        background: #F9F7F4;
        margin-top: 50px;
    }
    </style>

    <script>
    $(document).ready(function() {
        $('#btn-edit-profile').on('click', function() {
            if ($('.user-info').is('[readonly="readonly"]')) {
                $('.user-info').attr('readonly', false);
                $('#btn-save').attr('disabled', false);
                $('#avatar').attr('disabled', false);
                $('#btn-edit-profile').text('Hủy');
            } else {
                $('.user-info').attr('readonly', true);
                $('#btn-save').attr('disabled', true);
                $('#avatar').attr('disabled', true);
                $('#btn-edit-profile').text('Chỉnh sửa');
            }
        });
    });
    </script>

    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/frontend_sidebar.css"); ?>">
    <!-- script for boostrap4-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>