// Hàm này chạy khi toàn bộ DOM đã sẵn sàng
$(document).ready(function () {
    $('.cart_quantity_input').on('input', function () {
        let $row = $(this).closest('tr'); //  tìm hàng (<tr>) chứa input đó – tức là dòng sản phẩm đang chỉnh.
        let productId = $row.data('id');
        let price = parseInt($row.find('.cart_price p').text().replace(/[^0-9]/g, ''));
        let quantity = parseInt($(this).val()) || 0; // Nếu người dùng nhập không hợp lệ (ví dụ chữ cái), parseInt trả về NaN, nên dùng || 0 để gán giá trị mặc định là 0.


        let total = price * quantity;
        $row.find('.cart_total_price').text(total.toLocaleString()); //Hiển thị lại tổng tiền dòng đó với định dạng hàng nghìn (dấu phẩy) thì number_format mới hiếu

        // Tính lại tổng tiền toàn bộ giỏ hàng
        let grandTotal = 0;
        $('.cart_total_price').each(function () {
            let val = parseInt($(this).text().replace(/[^0-9]/g, '')) || 0;
            grandTotal += val;
        });
        $('h2:contains("Total:")').text('Total: ' + grandTotal.toLocaleString() + ' VND');


        $.ajax({
            url: window.cartUpdateUrl,
            method: 'POST',
            data: {
                id: productId,
                quantity: quantity,
                _token: window.csrfToken
            },
            success: function (res) {
                if (res.code === 200) {
                    $row.find('.cart_total_price').text(res.cart_total.toLocaleString());
                    $('h2:contains("Total:")').text('Total: ' + res.grand_total.toLocaleString() + ' VND');
                }
            }
        });
    });
});