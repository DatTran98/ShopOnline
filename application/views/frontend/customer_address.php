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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/frontend.js"); ?>"></script>
</head>

<body>

    <section>
        <?php  $this->load->view("frontend/customer_sidebar"); ?>

        <div class="content-wrapper">
            <section class="content">
                <div class="col-xs-12">
                <div class="box-header">
                    <h3>Danh sách địa chỉ</h3>
                    <?php echo $this->session->flashdata("message"); ?>
                    <a class="pull-right btn btn-cus mb-2"
                                    href="<?php echo site_url("customer/add_address"); ?>">Thêm mới</a>
                    </div>
                    <table class="table data_table" id="table_address">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khu vực</th>
                                <th>Địa chỉ nhà</th>
                                <th>Tên người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Hành động</th>
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
                                <td class="d-flex justify-content-center"><a
                                        href="<?php echo site_url("customer/edit_address/".$address->location_id); ?>"
                                        class="btn btn-sm btn-secondary">Sửa</a>

                                    <form method="post" id="form_delete_address" action="<?php echo site_url("customer/delete_address");?>">
                                        <input type="hidden" value="<?php echo $address->location_id?>"
                                            name="location_id">
                                        <button type="button" class="btn btn-sm btn-danger btn_delete_address" >Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <?php  $this->load->view("frontend/common_footer"); ?>
    </section>
    <style>
    body {
        background:#F9F7F4;
        margin-top: 20px;
    }

    </style>
    <script>
    $(document).ready(function() {
        $('#table_address').DataTable({
            "order": [
                [1, "asc"]
            ]
        });
        $('.btn_delete_address').on('click', function(){
            if(confirm('Bạn có chắc muốn xóa địa chỉ này không?')){
                $('#form_delete_address').submit();
            }
        });
    });
    </script>
    <!-- footer section ends -->
    <link rel="stylesheet"
        href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/frontend_sidebar.css"); ?>">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js">
    </script>
</body>

</html>