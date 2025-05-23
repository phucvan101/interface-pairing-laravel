function addToCart(event) {
    event.preventDefault()
    let urlCart = $(event.currentTarget).data('url');
    $.ajax({
        type: "GET",
        url: urlCart,
        dataType: 'json',
        success: function (data) {
            if (data.code === 200) {
                alert('Add to cart success!');
            }
        },
        error: function () {

        }
    });
}

$(function () {
    $('.add-to-cart').on('click', addToCart);
})