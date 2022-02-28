<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Đăng nhập</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="hold-transition">
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <!-- <div > -->
                        <form method="post" action="<?php echo  site_url("customer/register");?>" class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <h4 class="mt-1 mb-5 pb-1">Welcome to Kati Flower</h4>
                                    </div>
                                    <?php if(isset($error) && $error!=""){
                                    echo $error;
                                    } ?>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Tên đăng nhập/Email</label>
                                            <input type="email" id="form2Example11" name="email" class="form-control"
                                                placeholder="Email" />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Mật khẩu</label>
                                            <input type="password" id="form2Example22" name="password"
                                                placeholder="Mật khẩu" class="form-control" />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Đăng ký</button>
                                            <!-- <a class="text-muted" href="#!">Quên mật khẩu?</a> -->
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Đã có tài khoản?</p>
                                            <a href="<?php echo site_url("customer/login");?>"
                                                class="btn btn-outline-danger"> Đăng nhập</a>
                                        </div>

                                    

                                </div>
                            </div>
                            <div class="col-lg-6 align-items-center gradient-custom-2">
                                <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Họ tên</label>
                                        <input type="text" id="form2Example22" name="user_name" placeholder="Họ tên"
                                            class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Số điện thoại</label>
                                        <input type="text" id="form2Example22" name="user_mobile"
                                            placeholder="Số điện thoại" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Khu vực</label>
                                        <select class="select btn" id='select_delivery' name="user_socity">
                                                    <?php foreach($socities as $socity){ ?>
                                                    <option value="<?php echo $socity->socity_id;?>">
                                                        <?php echo $socity->socity_name;?>
                                                    </option>
                                                    <?php  } ?>
                                                </select>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Địa chỉ</label>
                                        <input type="text" id="form2Example22" name="user_address"
                                            placeholder="Địa chỉ" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
    <style>
    .gradient-custom-2 {
        background: #B49149;
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
    </style>
</body>

</html>