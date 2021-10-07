window.addEventListener("load", function() {
    $(".add-product-btn").on("click", function(e) {
        e.preventDefault();

        var id = $(this).data("id");
        var name = $(this).data("name");
        var price = $.number($(this).data("price"), 2);

        $(this).removeClass("btn-success").addClass("btn-default disabled");

        var html = `<tr>
                <td>${name}</td>
                <td><input type="number" name="quantities[]" data-price="${price}"
                 class="form-control product-quantity" min="1"
                    value="1" style="width:auto;"></td>
                <td class="product-price">${price}</td>
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}">
                    <span class="fa fa-trash"> </span> </button> </td>
            </tr>`;

        $(".order-list").append(html);

        calculateTotal();
    });

    $("body").on("click", ".disabled", function(e) {
        e.preventDefault();
    });
    $("body").on("click", ".remove-product-btn", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $(this).closest("tr").remove();
        $("#product-" + id)
            .removeClass("btn-default disabled")
            .addClass("btn-success");

        calculateTotal();

    });

    // Product quantity
    $("body").on('keyup change', '.product-quantity', function() {
        var quantity = Number($(this).val());
        var quantityPrice = $(this).data('price');
        $(this).closest('tr').find('.product-price').html($.number(quantity * quantityPrice, 2));
        calculateTotal();
    });

    $('total-price').number(true, 2)

});

function calculateTotal() {
    var price = 0;

    $(".order-list .product-price").each(function(index) {
        price += parseFloat($(this).html().replace(/,/g, ''));
    });

    console.log(price);
    // $(".total-price").html($.number(price, 2));
    $(".total-price").html('Video num 30');
};