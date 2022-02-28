<header>
    <a href="<?php echo site_url("shopping"); ?>" class="logo">Kati Flower<span>.</span></a>
    <?php if(isset($isCartPage) && !$isCartPage){ ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item rounded active px-3">
                    <a class="nav-link" href="<?php echo site_url("shopping"); ?>">trang chủ <span class="sr-only">(current)</span></a>
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

                <form action="<?php echo site_url("shopping/product")?>">
                    <div class="form-group mb-0">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Tìm kiếm..." name="search"
                                aria-describedby="product-search-addon" />
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit" id="product-search-addon"><i
                                        class="fa fa-search search-icon font-12"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

                <a href="<?php echo site_url("shopping/cart"); ?>" class="position-relative d-inline-flex">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-basket d-flex align-items-center justify-content-center"
                        id='total_item'><?php echo $this->cart->total_items(); ?></span></a>


                <?php if(_get_current_user_name($this)!=""){ ?>
                <a href="<?php echo site_url("customer"); ?>" class="fas fa-user">Xin chào
                    <?php echo _get_current_user_name($this)?></a>
                <?php  }else{?>
                <a href="<?php echo site_url("customer/login");?>" class="fas fa-user"> Đăng nhập</a>
                <?php } ?>

            </div>
        </div>

    </nav>
    <?php } ?>

</header>