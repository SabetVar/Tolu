jQuery(function ($) {
    $(".add-to-cart-ajax").on("click", function (e) {
        e.preventDefault();

        var button = $(this);
        var product_id = button.data("product_id");
        var originalText = button.text(); // Save original text

        $.ajax({
            type: "POST",
            url: ajax_cart_params.ajax_url, // FIXED: Use localized admin-ajax.php URL
            data: {
                action: "custom_add_to_cart",
                product_id: product_id,
            },
            beforeSend: function () {
                button.addClass("loading").text("در حال افزودن");
            },
            success: function (response) {
                button.removeClass("loading");

                if (response.success) {
                    $(button).parent().addClass("added-cart");
                    button.addClass("added-cart").text("مشاهده سبد خرید").attr("href", "/checkout").off("click"); // Change text & link
                    showSnackbar("✅ محصول با موفقیت به سبد اضافه شد", "success");
                    $(document.body).trigger("wc_fragment_refresh"); // Refresh cart count
                } else {
                    button.text(originalText); // Restore original text if failed
                    showSnackbar("❌ مشکلی در افزودن به سبد خرید به وجود آمده است", "error");
                }
            },
        });
    });

    function showSnackbar(message, type) {
        var snackbar = $("<div class='snackbar " + type + "'>" + message + "</div>");
        $("body").append(snackbar);
        setTimeout(function () {
            snackbar.fadeOut(300, function () {
                $(this).remove();
            });
        }, 3000);
    }
});
