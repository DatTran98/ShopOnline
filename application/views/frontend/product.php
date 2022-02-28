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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/frontend.js"); ?>"></script>
</head>

<body>
    <section>
        <?php  $this->load->view("frontend/customer_sidebar"); ?>

        <div class="content-wrapper">

            <!-- header section starts  -->
            <?php  $this->load->view("frontend/common_header"); ?>
            <?php  $this->load->library('cart'); ?>
            <!-- header section ends -->

            <section class="content products">
                <div class="wrapper">
                    <!-- Sidebar Holder -->
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3>Katiflower</h3>
                        </div>

                        <ul class="list-unstyled components">

                            <?php  
                            echo printCategory(0,0,$this);
                            function printCategory($parent,$leval,$th){
                            
                            $q = $th->db->query("SELECT a.*, Deriv1.count FROM `categories` a  LEFT OUTER JOIN (SELECT `parent`, COUNT(*) AS count FROM `categories` GROUP BY `parent`) Deriv1 ON a.`id` = Deriv1.`parent` WHERE a.`status`=1 and a.`parent`=" . $parent);
                            $rows = $q->result();
    
                            foreach($rows as $row){
                                if ($row->count > 0) {
                                            printRow($row,true);
                                            printCategory($row->id, $leval + 1,$th);
                                            
                                        } elseif ($row->count == 0) {
                                            printRow($row,false);
                                        }
                                }
    
                            }
                                
                            function printRow($d,$bool){
                            ?>
                            <li>
                                <a href="<?php echo site_url("shopping/product/$d->id") ?>" class="nav-link active">
                                    <?php for($i=0; $i<$d->leval; $i++){ echo "_"; } echo $d->title; ?></a>
                            </li>

                            <?php } ?>
                        </ul>

                    </nav>

                </div>

                <h1 class="heading d-flex align-items-center justify-content-end"><span>sản phẩm</span>  &nbsp <a href="<?php echo site_url("shopping/cart"); ?>" class="position-relative d-inline-flex">
                    <i class="fas fa-shopping-cart"></i>
                   </a>&nbsp
                <?php if(_get_current_user_name($this)!=""){ ?>
                <a href="<?php echo site_url("customer"); ?>" class="fas fa-user"> &nbsp &nbsp</a>
                <?php  }else{?>
                <a href="<?php echo site_url("customer/login");?>" class="fas fa-user"> Đăng nhập</a>
                <?php } ?></h1>
                <form action="<?php echo site_url("shopping/product")?>" class="d-flex mb-5 justify-content-center">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm..." name="search"
                                aria-describedby="product-search-addon" />
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit" id="product-search-addon"><i
                                        class="fa fa-search search-icon font-12"></i></button>
                            </div>
                        </div>
                    </div>
                   
                </form>
                
                <div class="d-flex flex-wrap box-container">

                    <?php foreach($products as $product){ ?>
                    <div class="box">
                        <span class="discount">-10%</span>
                        <div class="image">
                            <img src="<?php if($product->product_image!=""){ echo $this->config->item('base_url').'uploads/products/'.$product->product_image;}else{
                        echo base_url("img/no_img_avaliable.jpg"); 
                    } ?>" alt="">
                            <div class="d-flex icons">

                                <button class="cart-btn btn_add_to_cart" value="<?php echo $product->product_id;?>">thêm
                                    vào giỏ</button>
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
        </div>
        <?php  $this->load->view("frontend/common_footer"); ?>
    </section>
    <!-- footer section starts  -->

    <!-- footer section ends -->

    <script>
    $('.btn_add_to_cart').click(function() {
        let id = $(this).val();
        $.ajax({
            url: '<?php echo site_url('shopping/add_to_cart'); ?>',
            type: 'POST',
            data: {
                product_id: id
            },
            dataType: 'json',
            success: function(data) {
                $('#total_item').text(data);
            }
        });
    });
    </script>
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/frontend_sidebar.css"); ?>">
    <!-- script for boostrap4-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>