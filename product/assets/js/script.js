(() => {

    $(".card-header").on("click", (e) => {
        const t = $(e.target); // t = this
        const cardBody = t.next(".card-body");
        const cardToolbar = t.find("> .card-toolbar");

        if (cardToolbar.hasClass("drop-inactive")) {
            cardToolbar.addClass("drop-active").removeClass("drop-inactive");
            cardBody.slideDown();
        } else {
            cardToolbar.addClass("drop-inactive").removeClass("drop-active");
            cardBody.slideUp();
        }
    });

    // Price Slider Using jquery-ui.js
    const min = parseInt($('#minimum_price').val());
    const max = parseInt($('#maximum_price').val());
    $('#price_range').slider({
        range: true,
        min: min,
        max: max,
        values: [min, max],
        step: 1,
        stop: function (event, ui) {
            $('#price_text').html("₹" + ui.values[0] + ' - ' + "₹" + ui.values[1]);
            $('#minimum_price').val(ui.values[0]);
            $('#maximum_price').val(ui.values[1]);
            filterProduct(1);
        }
    });

    $('input[type=checkbox]').on("click", () => filterProduct(1));
    $("input#searchKeyword").on('keyup input', () => filterProduct(1));
    $(document).on('click', '.page-link', (e) => filterProduct($(e.currentTarget).data("page")));

    const checkboxFilter = selector => {
        const filter = [];
        $('[data-filter=' + selector + ']:checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }

    const filterProduct = page => {
        const minimumPrice = $('#minimum_price').val();
        const maximumPrice = $('#maximum_price').val();
        const brand = checkboxFilter('brand');
        const ram = checkboxFilter('ram');
        const storage = checkboxFilter('storage');
        const searchKeyword = $('#searchKeyword').val();
        $.ajax({
            url: "process.php",
            method: "POST",
            data: {
                page: page,
                minimumPrice: minimumPrice,
                maximumPrice: maximumPrice,
                brand: brand,
                ram: ram,
                storage: storage,
                searchKeyword: searchKeyword
            },
            beforeSend:function () {
                $("#productsContainer").html(`<div class="card min-h-400px col-lg-12">
                                            <div class="card-body justify-align-center">
                                                <div class="spinner-border" role="status"></div>
                                            </div>
                                        </div>`);
            $("#pagination").html('');
              },
            success: function (res) {
                try {
                     res = JSON.parse(res)
                    const products = res.products;
                    const pagination = res.pagination;
                    $("#productsContainer").html(products);
                    $("#pagination").html(pagination);
                } catch (e) {
                    alert(e);
                }
            },
            error: function () {
                alert("Error in sending request");
            }
        })
    }
    filterProduct(1);
})();