<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thanh toán</title>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
        rel="stylesheet" /> -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="hold-transition">
    <section class="h-100 gradient-form" style="background-color: #F9F7F4;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <h4 class="mt-1 mb-4 pb-1">Thanh toán trực tuyến</h4>
                                    </div>
                                    <?php if($this->session->flashdata('success')){ ?>
                                    <p><?php echo $this->session->flashdata('success'); ?></p>
                                    <?php } ?>
                                    <form role="form" action="<?php echo site_url('handleStripePayment');?>"
                                        method="post" class="form-validation" data-cc-on-file="false"
                                        data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                        id="payment-form">
                                        <input type="hidden" value ="<?php echo $total_payment?>" name="total_payment"/>
                                        <input type="hidden" value = "<?php echo $sale_id?>" name="sale_id"/>
                                                     
                                        <div class="form-outline mb-3 required">
                                            <label class="form-label" for="form2Example11">Tên thẻ</label>
                                            <input class='form-control' size='4' type='text' />
                                        </div>

                                        <div class="form-outline mb-3 required">
                                            <label class="form-label" for="form2Example22">Số thẻ</label>
                                            <input autocomplete='off' class='form-control card-number' size='20'
                                                type='text' />
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-outline form-white cvc required">
                                                    <label class="form-label" for="typeText">Mã Cvc</label>
                                                    <input autocomplete='off' class='form-control card-cvc'
                                                        placeholder='***' size='4' type='text' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-outline form-white expiration required">
                                                    <label class="form-label" for="typeExp">Tháng hết hạn</label>
                                                    <input class='form-control card-expiry-month' placeholder='MM'
                                                        size='2' type='text' />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline form-white expiration required">
                                                    <label class="form-label" for="typeText">Năm hết hạn</label>
                                                    <input class='form-control card-expiry-year' placeholder='YYYY'
                                                        size='4' type='text' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-row row">
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-danger alert'>Có lỗi xảy ra khi thực hiện thanh toán
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class='alert-success'>Click thanh toán! Bạn đồng ý thanh toán số tiền
                                                <strong><?php echo $total_payment.$this->config->item('currency');?></strong></br>
                                                cho đơn hàng mã:<strong><?php echo $sale_id;?></strong>
                                            </div>
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Thanh toán</button>
                                                <a href="<?php echo site_url('shopping/cart');?>"class="btn btn-block btn-secondary fa-lg mb-3"
                                                >Huỷ</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Thanh toán đơn hàng</h4>
                                    <p class="small mb-0">Thanh toán trước để đơn hàng được ưu tiên vận chuyển nhanh hơn
                                        </br>
                                        <strong>Lưu ý</strong> rằng nếu bạn hủy thanh toán, không có nghĩa rằng đơn hàng
                                        sẽ bị hủy.
                                        Đơn hàng vẫn được thực hiện và bạn sẽ thanh toán COD cho nhà vận chuyển.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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

    .hide {
        display: none;
    }
    </style>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $stripeForm = $(".form-validation");
    $('form.form-validation').bind('submit', function(e) {
        var $stripeForm = $(".form-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $stripeForm.find('.required').find(inputSelector),
            $errorMessage = $stripeForm.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$stripeForm.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($stripeForm.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });

    function stripeResponseHandler(status, res) {
        if (res.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(res.error.message);
        } else {
            var token = res['id'];
            $stripeForm.find('input[type=text]').empty();
            $stripeForm.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $stripeForm.get(0).submit();
        }
    }
});
</script>

</html>