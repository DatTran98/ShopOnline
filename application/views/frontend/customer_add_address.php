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
    <div id="viewport">
        <?php  $this->load->view("frontend/customer_sidebar"); ?>
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?php if(isset($customer->user_image)) {echo base_url("uploads/profile/".$customer->user_image); }?>"
                                        alt="Admin" class="rounded-circle p-1 bg-secondary" width="110">
                                    <div class="mt-3">
                                        <h4><?php echo $customer->user_fullname; ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $customer->user_email; ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $customer->user_phone; ?></p>
                                    </div>
                                </div>
                                <hr class="my-4">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-5">

                        <div class="card">
                            <?php if(isset($error) && $error!=""){
                                    echo $error;
                                    } ?>
                            <form action="<?php echo site_url("customer/add_address"); ?>" method="post">
                                <div class="card-body">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Họ tên người nhận</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control user-info" name="receiver_name"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Số điện thoại</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control user-info" name="receiver_mobile"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Khu vực</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="select btn" id='select_delivery' name="socity_id">
                                                <?php foreach($socities as $socity){ ?>
                                                <option value="<?php echo $socity->socity_id;?>">
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
                                            <input type="text" class="form-control user-info" name="house_no" value="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <button type="summit" class="btn btn-primary px-4"
                                                id="btn-save">Lưu</button>
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
    </div>
    <style>
    body {
        background: #F9F7F4;
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