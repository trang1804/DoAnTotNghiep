
function addToCart(id) { // thêm sản phẩm có sô lượng
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
                timer: 1000
            });     
        },
        error: function (response) {
            console.log('response', response.responseJSON)
            if(response.responseJSON.message){
                swal(response.responseJSON.message, {
                    icon: response.responseJSON.status,
                });
            }
           else swal(response.message, {
                icon: response.status,
            });
        },
    });


}

function addCart(id) { // thêm sản phẩm măc định sô lượng là 1

    let url = "/api/add-cart/" + id;
    $.ajax({
        type: "get",
        url: url,
        success: function (res) {
            console.log('res',res)
            swal(res.message, {
                icon: res.status,
                timer: 2000
            });     
        },
        error: function (response) {
            console.log('response', response.responseJSON)
            if(response.responseJSON.message){
                swal(response.responseJSON.message, {
                    icon: response.responseJSON.status,
                });
            }
           else swal(response.message, {
                icon: response.status,
            });
        },
    });


}

function removeCart(id) { // xóa sản phẩm theo id trong giỏ hàng

    let url = "/api/remove-cart/" + id;
    $.ajax({
        type: "get",
        url: url,
        success: function (res) {
            console.log('res',res)
            swal(res.message, {
                icon: res.status,
                timer: 2000
            }).then(function() {
                $("#pro" + id).remove();
            });     
        },
        error: function (response) {
            console.log('response', response.responseJSON)
            if(response.responseJSON.message){
                swal(response.responseJSON.message, {
                    icon: response.responseJSON.status,
                });
            }
           else swal(response.message, {
                icon: response.status,
            });
        },
    });


}