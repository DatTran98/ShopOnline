<header>
    <a href="#" class="logo">Kati Flower<span>.</span></a>
    <?php if(!$isCartPage){ ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item rounded active px-3">
                    <a class="nav-link" href="#home">trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item rounded px-3">
                    <a class="nav-link" href="#about">giới thiệu</a>
                </li>

                <li class="nav-item rounded px-3">
                    <a class="nav-link" href="#products">sản phẩm</a>
                </li>

                <li class="nav-item rounded  px-3">
                    <a class="nav-link" href="#review">đánh giá</a>
                </li>

                <li class="nav-item rounded px-3">
                    <a class="nav-link" href="#contact">liên hệ</a>
                </li>
            </ul>
            <div class="icons d-flex justify-content-center">
                <a href="#" class="fas fa-search"></a>
                <a href="<?php echo site_url("sale/cart"); ?>" class="position-relative d-inline-flex" >
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-basket d-flex align-items-center justify-content-center">0</span></a>
                <a href="#" class="fas fa-user"></a>
            </div>
        </div>

    </nav>
    <?php } ?>
</header>