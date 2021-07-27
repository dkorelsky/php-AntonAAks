$(function () {

    const links_with_id = $('.product_link_with_id');
    const cart_value = $("#cart_count");


    $.each(links_with_id, function () {
        $(this).bind('click', function () {
            let current_id = $(this).attr('data-id');
            cart_value.html();
        })
    });

});