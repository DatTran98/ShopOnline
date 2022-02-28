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

    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/frontend.css"); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/frontend.js"); ?>"></script>
</head>

<body>
    <!-- header section starts  -->
    <?php  $this->load->view("frontend/common_header"); ?>
    <!-- header section ends -->

    <!-- cart section starts  -->
    <section class="d-flex align-items-center" style="background-color: #F9F7F4;">
        <div class="container py-5 h-100 mt-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Giỏ hàng của bạn</h1>
                                            <h3 class="mb-0 text-muted"><?php echo $this->cart->total_items();?> sản
                                                phẩm</h3>
                                        </div>
                                        <?php echo $this->session->flashdata("message"); ?>
                                        <hr class="my-4">
                                        <?php foreach ($this->cart->contents() as $items): ?>

                                        <div class='row mb-4 d-flex justify-content-between align-items-center'>
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="<?php if($items['image']!=""){ echo $this->config->item('base_url').'uploads/products/'.$items['image'];}else{
                                                echo base_url("img/no_img_avaliable.jpg"); 
                                                    } ?>" class=" img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted"><?php echo $items['category']; ?></h6>
                                                <h6 class="text-black mb-0"><?php echo $items['name']; ?></h6>
                                            </div>

                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button class="btn btn-link px-2 update_quantity sub">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input min="0" max='100' name="quantity"
                                                    value="<?php echo $items['qty']; ?>" type="number"
                                                    class="form-control form-control-sm item-qty" />

                                                <button class="btn btn-link px-2 update_quantity add">
                                                    <i class="fas fa-plus"></i>
                                                </button>

                                            </div>
                                            <?php $attributes = array('method'=>'post');
                                             $this->load->helper('form');
                                            echo form_open(site_url('shopping/update_cart'), $attributes);?>
                                            <input type='hidden' name='row_id' value='<?php echo $items['rowid']?>' />
                                            <input type="hidden" name='quantity' value="<?php echo $items['qty']; ?>"
                                                class="form-control form-control-sm" />
                                            <!-- <button class='btn btn-secondary update-cart' type='submit'>Update</button> -->
                                            <?php echo form_close()?>

                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">
                                                    <?php echo $items['price'].$this->config->item('currency'); ?></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <?php $attributes = array('method'=>'post');
                                             $this->load->helper('form');
                                            echo form_open(site_url('shopping/delete_cart_item'), $attributes);?>
                                                <button class="text-muted" type='submit' name='row_id_delete'
                                                    value='<?php echo $items['rowid']?>'><i
                                                        class="fas fa-times"></i></button>
                                                <?php echo form_close()?>
                                            </div>
                                        </div>
                                        <!-- </form> -->
                                        <hr class="my-4">

                                        <?php endforeach; ?>

                                        <div class="pt-5">
                                            <a href="<?php echo site_url("shopping"); ?>" class="text-dark text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>
                                                trở về shop</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <form class="mt-4" action="<?php echo site_url("shopping/send_order"); ?>"
                                        method="post">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Tổng</h3>
                                            <hr class="my-4">
                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase"><?php echo $this->cart->total_items();?> sản
                                                    phẩm
                                                </h5>
                                                <h5 value='<?php echo $this->cart->total()?>'>
                                                    <?php echo $this->cart->total().$this->config->item('currency');?>
                                                </h5>
                                                <input id='total' type='hidden'
                                                    value='<?php echo $this->cart->total()?>' />
                                            </div>

                                            <h5 class="text-uppercase mb-3">Phí vận chuyển</h5>

                                            <div class="mb-4 pb-2 ">
                                                <?php if(isset($user_socity)){
                                                    foreach($socities as $socity){ 
                                                        if($socity->socity_id==$user_socity->socity_id){?>
                                                <label><?php echo $socity->socity_name." - ".$socity->delivery_charge.$this->config->item('currency');?></label>
                                                <?php }}} else { ?>
                                                <select class="select btn" id='select_delivery' name="socity">
                                                    <?php foreach($socities as $socity){ ?>
                                                    <option value="<?php echo $socity->delivery_charge;?>"
                                                        <?php if(isset($user_socity) && $socity->socity_id==$user_socity->socity_id){ echo 'selected';}?>>
                                                        <?php echo $socity->socity_name." - ".$socity->delivery_charge.$this->config->item('currency');?>
                                                    </option>
                                                    <?php  } ?>
                                                </select>
                                                <?php } ?>
                                            </div>

                                            <hr class="my-4">
                                            <div class="d-flex justify-content-between mb-2">
                                                <h5 class="text-uppercase">Tổng tiền</h5>
                                                <h5 id='total_payment'>
                                                    <?php echo $total_payment.$this->config->item('currency');?></h5>
                                                <input type="hidden" name="total_payment"
                                                    value="<?php echo $total_payment?>"></input>
                                            </div>
                                            <hr class="my-4">
                                            <?php if(_is_frontend_user_login($this)){?>
                                            <h5 class="form-label mb-3">Địa chỉ nhận hàng</h5>

                                            <div class="mb-3">
                                            <input type="hidden" name="location_id" id="location_id"
                                                    value=""></input>
                                                <select class="select" id='select_delivery'>
                                                <option class='form-outline'>Chọn địa chỉ nhận hàng</option>
                                                    <?php foreach($user_address as $address){ ?>
                                                    <option class='form-outline'
                                                        value="<?php echo $address->delivery_charge;?>"><?php echo $address->location_id." - ".$address->house_no." - ".$address->receiver_name." - ".$address->receiver_mobile;?>
                                                    </option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <h5 class="form-label mb-3">Ngày mong muốn giao hàng</h5>
                                            <div id="date-picker-example"
                                                class="mb-3 md-form md-outline input-with-post-icon">
                                                <input type="date" id="date-picker" name="date" class="form-control">
                                            </div>
                                            <h5 class="form-label mb-3">Thời gian giao hàng</h5>
                                            <div class="mb-5">
                                                <select class="select" id='delivery_time' name="time">
                                                    <option class='form-outline' value="8:00-11:00">8:00-11:30</option>
                                                    <option class='form-outline' value="12:30-17:00">12:30-17:00
                                                    </option>
                                                </select>
                                            </div>
                                            <hr class="my-4">
                                            <h5 class="form-label">Chọn hình thức thanh toán</h5>
                                            <div class="form-check m-2">
                                                <input class="form-check-input radio-payment" type="radio"
                                                    name="payment_radio" value=0 checked>
                                                <label class="form-check-label ml-2" for="flexRadioDefault1">
                                                    COD
                                                </label>
                                            </div>
                                            <div class="form-check m-2 mb-5">
                                                <input class="form-check-input radio-payment" type="radio"
                                                    name="payment_radio" value=1>
                                                <label class="form-check-label ml-2" for="flexRadioDefault2">
                                                    trực tuyến qua thẻ
                                                </label>
                                            </div>

                                            <button type="summit" class="btn-cus btn-block btn-lg" id='btn-checkout'
                                                data-mdb-ripple-color="dark">Thanh toán</button>
                                            <button type="summit" class="btn-cus btn-block btn-lg" id='btn-order'
                                                data-mdb-ripple-color="dark">Đặt hàng</button>
                                            <?php } else {?>
                                                <p class="mb-0 me-2">Bạn chưa đăng nhập. Hãy đăng nhập để đặt hàng</p>
                                            <a href="<?php echo site_url("customer/login");?>" class="btn-cus btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Đăng nhập</a>
                                            <?php }?>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- cart section ends -->
    <script type='text/javascript'>
    $(document).ready(function() {
        $('#date-picker').attr('min', date());

    });

    function date() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        return today
    }
    </script>
    <!-- footer section starts  -->
    <?php  $this->load->view("frontend/common_footer"); ?>
    <!-- footer section ends -->

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