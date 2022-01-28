$(document).ready(function() {
    let home = $('.navbar-nav').children(":first")
    home.addClass("active");
    home.css('background-color', '#B49149')

    $('.nav-item').click(function() {
        $('.nav-item').removeClass("active");
        $(".nav-item").css("background-color", "");
        $(this).addClass("active");
        $(this).css('background-color', '#B49149')
    });

   
});

let amountItem = 0;
// function addToCart($product_id){
//     amountItem += 1;

    
//     $('.cart-basket').text(amountItem);



//     return false;
// }