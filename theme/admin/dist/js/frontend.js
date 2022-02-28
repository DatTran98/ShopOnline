$(document).ready(function() {
    let home = $(".navbar-nav").children(":first");
    home.addClass("active");
    home.css("background-color", "#B49149");
    $('#btn-checkout').hide();
    $('#card-info').hide();

    $(".nav-item").click(function() {
        $(".nav-item").removeClass("active");
        $(".nav-item").css("background-color", "");
        $(this).addClass("active");
        $(this).css("background-color", "#B49149");
    });

    $("#select_delivery").change(function() {
        calculateTotalPayment();
    });

    $(".update_quantity").on("click", function() {
        let dir = $(this).is(".add");
        const selectedInput = $(this)[dir ? "prev" : "next"]()[0];
        let val = +selectedInput.value || 0;
        const min = +selectedInput.min;
        const max = +selectedInput.max;

        if ((!dir && val > min) || (dir && val < max)) {
            selectedInput.stepUp(dir ? 1 : -1);
            let fieldUpdate = $(this).parent().next().children()[1];
            fieldUpdate.value = $(selectedInput).val();
            let form = $(this).parent().next();
            form.submit();
        } else alert("Số lượng đặt hàng trong khoảng từ: " + min + " đến " + max);
    });

    $(".update-cart").on("click", function() {
        let form = $(this).prev();
        form.submit();
    });
    $(".item-qty").on("change", function() {
        let fieldUpdate = $(this).parent().next().children()[1];
        fieldUpdate.value = $(this).val();
        let form = $(this).parent().next();
        form.submit();
    });


    $('.radio-payment').on('change', function() {
        if ($('input[name="payment_radio"]:checked').val() == 0) {
            $('#btn-checkout').hide();
            $('#btn-order').show();
        } else {
            $('#btn-checkout').show();
            $('#btn-order').hide();
        }
    });

});

function calculateTotalPayment() {
    let location = $("#select_delivery option:selected").text();
    const location_array = location.split("-");
    let location_id = location_array[0];
    $('#location_id').val(location_id.trim());
    var delivery_char = $("#select_delivery option:selected").val();
    var total_payment = parseFloat(delivery_char) + parseFloat($("#total").val());
    $("#total_payment").text(total_payment + " vnd");
}