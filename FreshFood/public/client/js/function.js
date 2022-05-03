
function addToCart(id) {
    let quantity = $("#quantity").val();
    let _token = $("input[name=_token]").val();
    let url = "/api/add-to-cart/" + id;
    let data = { quantity, _token };

    $.ajax({
        type: "post",
        url: url,
        data: data,
        success: function (res) {
            swal(res.message, {
                icon: res.status,
                timer: 2000
            });     
        },
        error: function (response) {
            console.log('response', response)
            swal(response.message, {
                icon: response.status,
            });
        },
    });


}