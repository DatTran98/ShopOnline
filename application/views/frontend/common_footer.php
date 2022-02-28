<section class="footer">
    <?php if(!$isCustomerPage){ ?>
    <div class="d-flex box-container">

        <div class="box">
            <h3>Liên kết nhanh</h3>
            <a href="#home">trang chủ</a>
            <a href="#about">giới thiệu</a>
            <a href="#products">sản phẩm</a>
            <a href="#review">đánh giá</a>
            <a href="#contact">liên hệ</a>
        </div>

        <div class="box">
            <h3>truy cập</h3>
            <a href="<?php echo site_url("customer") ?>">tài khoản của tôi</a>
            <a href="<?php echo site_url("customer/orders") ?>">đơn hàng của tôi</a>
        </div>

        <div class="box">
            <h3>chi nhánh</h3>
            <a href="#">hà nội</a>
            <a href="#">hồ chí minh</a>
            <a href="#">đà nẵng</a>
            <a href="#">đà lạt</a>
        </div>

        <div class="box">
            <h3>địa chỉ liên hệ</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">katiflower@gmail.com</a>
            <a href="#">số 8, ngõ 117/69 thái hà - đống đa - hà nội</a>
            <img src="images/payment.png" alt="">
        </div>

    </div>
    <?php }?>
    <div class="credit"> Copyright &copy; 2021 <span> Kati Flowers </span> | All rights reserved. </div>
</section>