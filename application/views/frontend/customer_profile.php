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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php if(isset($customer->user_image)) {echo base_url("uploads/profile/".$customer->user_image); }?>" alt="Admin"
                                    class="rounded-circle p-1 bg-secondary" width="110">
                                <div class="mt-3">
                                    <h4><?php echo $customer->user_fullname; ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $customer->user_email; ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $customer->user_phone; ?></p>
                                    <button class="btn btn-lg btn-secondary" id="btn-edit-profile">Chỉnh sửa</button>
                                </div>
                            </div>
                            <hr class="my-4">

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                <?php echo $this->session->flashdata("message"); ?>
                    <div class="card">
                        <form action="<?php echo site_url("customer/update_profile"); ?>" method="post" enctype="multipart/form-data" >
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Họ tên</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control user-info" readonly="readonly" name="user_fullname"
                                        value="<?php echo $customer->user_fullname; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control user-info" readonly="readonly" name="user_email"
                                        value="<?php echo $customer->user_email; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số điện thoại</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control user-info" readonly="readonly" name="user_mobile"
                                        value="<?php echo $customer->user_phone; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Khu vực</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control user-info" readonly="readonly"
                                        value="<?php echo $customer->socity_name; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Địa chỉ</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control user-info" readonly="readonly" name="user_address"
                                    value="<?php echo $customer->house_no; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ảnh đại diện</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" class="form-control user-info" id="avatar" disabled="disabled" name="avatar" size="20"/>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="summit" class="btn btn-primary px-4" id="btn-save" disabled="disabled">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <h4 class="mt-5">Danh sách địa chỉ nhận hàng</h4>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <a class="btn btn-dark pull-right mb-2"
                                        href="<?php echo site_url("customer/address"); ?>">Quản lý địa chỉ</a>
                                    <div class="table-responsive project-list">
                                        <table class="table project-table table-centered table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Khu vực</th>
                                                    <th>Địa chỉ nhà</th>
                                                    <th>Tên người nhận</th>
                                                    <th>Số điện thoại</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            foreach($addresses as $address)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $address->location_id; ?></td>
                                                    <td><?php echo $address->socity_name; ?></td>
                                                    <td><?php echo $address->house_no; ?></td>
                                                    <td><?php echo $address->receiver_name; ?></td>
                                                    <td><?php echo $address->receiver_mobile; ?></td>
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
                    </div>
                </div>
            </div>
        </div>
        <?php  $this->load->view("frontend/common_footer"); ?>
    </div>

    <style>
    body {
        background: #F9F7F4;
        margin-top: 20px;
    }
    </style>

    <script>
    $(document).ready(function() {
        $('#btn-edit-profile').on('click', function() {
            if ( $('.user-info').is('[readonly="readonly"]') ) {
                $('.user-info').attr('readonly',false);
                $('#btn-save').attr('disabled',false);
                $('#avatar').attr('disabled',false);
                $('#btn-edit-profile').text('Hủy');
             }else{
                $('.user-info').attr('readonly',true);
                $('#btn-save').attr('disabled',true);
                $('#avatar').attr('disabled',true);
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