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

    <!-- home section starts  -->

    <section class="d-flex align-items-center home" id="home"
        style="background: url(<?php echo base_url("/uploads/sliders/slideshow_1.jpg"); ?>)">

        <div class="content">
            <h3>Hoa khô kati</h3>
            <span> natural & beautiful flowers </span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae laborum ut minus corrupti dolorum dolore
                assumenda iste voluptate dolorem pariatur.</p>
            <a href="#products" class="btn-cus">shop now</a>
        </div>
    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span> giới thiệu </span> về chúng tôi </h1>

        <div class="d-flex align-items-center row">

            <div class="video-container">
                <video src="<?php echo base_url("img/about-vid.mp4"); ?>" loop autoplay muted></video>
                <h3>best flower sellers</h3>
            </div>

            <div class="content">
                <h3>Hãy chọn kati flower!</h3>
                <p>Xin chào, chúng mình là Kati. Không chỉ là một thương hiệu về hoa khô
                    chúng mình còn mong muốn biến những sản phẩm của mình thành những món quà lưu giữ kỉ niệm, những
                    điều ý nghĩa cho các bạn. </p>
                <p>Bạn có thể tham khảo những mẫu hoa qua website, cửa hàng hoặc liên hệ DALIA để được tư vấn và thiết
                    kế mẫu hoa cho riêng mình nhé!</p>
                <a href="#" class="btn-cus">learn more</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- icons section starts  -->

    <section class="d-flex icons-container">
        <!-- d-flex flex-wrap pt-5 pb-5  col-8 col-md-12 col-md-12 col-sm-12 col-xs-6 -->
        <div class="d-flex align-items-center icons">
            <img src="<?php echo base_url("img/icon-1.png"); ?>" alt="">
            <div class="info">
                <h3>vận chuyển giá rẻ</h3>
                <span>ship cod toàn quốc</span>
            </div>
        </div>

        <div class="d-flex align-items-center icons">
            <img src="<?php echo base_url("img/icon-2.png"); ?>" alt="">
            <div class="info">
                <h3>đổi/trả 10 ngày</h3>
                <span>đảm bảo quyền lợi</span>
            </div>
        </div>

        <div class="d-flex align-items-center icons">
            <img src="<?php echo base_url("img/icon-3.png"); ?>" alt="">
            <div class="info">
                <h3>kèm quà tặng</h3>
                <span>trên mọi đơn hàng</span>
            </div>
        </div>

        <div class="d-flex align-items-center icons">
            <img src="<?php echo base_url("img/icon-4.png"); ?>" alt="">
            <div class="info">
                <h3>bảo mật thanh toán</h3>
                <span>thanh toán thông minh</span>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- prodcuts section starts  -->

    <section class="products" id="products">

        <h1 class="heading"> sản phẩm <span>nổi bật</span> </h1>

        <div class="d-flex flex-wrap box-container">
            <?php foreach($products as $product){ ?>
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="<?php if($product->product_image!=""){ echo $this->config->item('base_url').'uploads/products/'.$product->product_image;}else{
                        echo base_url("img/no_img_avaliable.jpg"); 
                    } ?>" alt="">
                    <div class="d-flex icons">
                        <a href="#products" class="cart-btn"
                            onclick="return addToCart(<?php echo $product->product_id;?>)">thêm
                            vào giỏ</a>
                    </div>
                </div>
                <div class="content">
                    <h3><?php echo $product->product_name; ?></h3>
                    <div class="price">
                        <?php echo ($product->price - $product->price*0.1). " " .$this->config->item("currency") ?>
                        <span><?php echo $product->price. " " .$this->config->item("currency") ?></span>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>

    </section>

    <!-- prodcuts section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> khách hàng <span>đánh giá</span> </h1>

        <div class="d-flex flex-wrap box-container">

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium
                    enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam
                    nesciunt eaque nulla dignissimos.</p>
                <div class="d-flex user">
                    <img src="<?php echo base_url("img/pic-1.png"); ?>" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium
                    enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam
                    nesciunt eaque nulla dignissimos.</p>
                <div class="user">
                    <img src="<?php echo base_url("img/pic-2.png"); ?>" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium
                    enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam
                    nesciunt eaque nulla dignissimos.</p>
                <div class="user">
                    <img src="<?php echo base_url("img/pic-3.png"); ?>" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"> <span> liên hệ với</span> chúng tôi </h1>

        <div class="d-flex row">
            <form action="">
                <input type="text" placeholder="name" class="box">
                <input type="email" placeholder="email" class="box">
                <input type="number" placeholder="number" class="box">
                <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn-cus">
            </form>

            <div class="image">
                <img src="<?php echo base_url("img/contact.jpg"); ?>" alt="">
            </div>

        </div>

    </section>

    <!-- contact section ends -->

    <!-- footer section starts  -->
    <?php  $this->load->view("frontend/common_footer"); ?>
    <!-- footer section ends -->

    <script >
    function addToCart($product_id) {
        amountItem += 1;
        console.log(amountItem);
        // $.ajax({
        //     method: "POST",
        //     url: "<?php echo site_url("sale/add_to_cart"); ?>",
        //     data: {
        //         product_id: $product_id
        //     }
        //     success: function (data) {
        //         alert('THIS WORKED');

        //     },
        //     error: function () {
        //         alert('Nah died');
        //     }
        // });
        return false;
    }
    </script>

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