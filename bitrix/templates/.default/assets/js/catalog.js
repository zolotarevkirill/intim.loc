$(document).ready(function () {
    $('[data-item="fast-view"]').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('item');
        var section = button.data('section');
        $.post("/include/fastview.php", {id: id, section: section},
        function (data) {
            $("#fastview").html(data);
        });
    });


    $('.textDostavka').hide();
    $('.textDostavka1').hide();
    $('[data-item="fast-view"]').on('hidden.bs.modal', function (event) {
        $(this).find('img').attr('src', '');
    });

    $('.alert').fadeOut(0);

    var cook = $.cookie('yes_int');

    if (cook !== '1') {
        $('#attantion').css('display', 'none');
    }

    $('#oplt').change(function () {
        var item = $("#oplt option:selected").val();
        if (item !== 'NaN') {
            $('.textDostavka1').css('display', 'none');
            $('#' + item).css('display', 'block');
        } else {
            $('.textDostavka1').css('display', 'none');
        }
    });

    UpdateCarts();


    $('#acc1').click(function () {
        var PGENDER = $('#PERSONAL_GENDER option:selected').val(),
                PBIRTHDATE = $('#PERSONAL_BIRTHDATE').val(),
                PERSONAL_PHONE = $('#PERSONAL_PHONE').val(),
                LastName = $('#LastName').val(),
                FirstName = $('#FirstName').val(),
                userID = $('#userID').val(),
                action = 'update_user_info';
        $.post("/include/account.php", {
            PGENDER: PGENDER,
            PERSONAL_PHONE: PERSONAL_PHONE,
            PBIRTHDATE: PBIRTHDATE,
            LastName: LastName,
            FirstName: FirstName,
            userID: userID,
            action: action
        },
        function (data) {
            $('.alert').fadeIn(300);
        });
        return false;
    });

    $('#acc2').click(function () {
        var UserEmail = $('#UserEmail').val(),
                userID = $('#userID').val(),
                action = 'update_user_email';
        $.post("/include/account.php", {
            UserEmail: UserEmail,
            userID: userID,
            action: action
        }, function (data) {
            if (data.toString().trim() == 'Error!') {
                $('#UserEmail').css('border', '1px solid red');
            } else {
                $('#UserEmail').css('border', '1px solid #797979');
                $('.alert').fadeIn(300);
            }
        });
        return false;
    });


    $('#acc3').click(function () {
        var pswd1 = $('#pswd1').val(),
                pswd2 = $('#pswd2').val(),
                pswd3 = $('#pswd3').val(),
                userID = $('#userID').val(),
                action = 'update_user_pswd';
        $.post("/include/account.php", {pswd1: pswd1, pswd2: pswd2, pswd3: pswd3, userID: userID, action: action}, function (data) {
            $('#PswdForm').validator('validate');
            $('.help-new').html("<ul class='list-unstyled'><li>" + data + "</li></ul>");
        });
        return false;
    });

    $('#acadres').click(function () {
        var userID = $('#userID').val(),
                userAdress = $('#adressUser').val(),
                action = 'update_user_adress';
        $.post("/include/account.php", {userAdress: userAdress, userID: userID, action: action}, function (data) {
            $('.alert').fadeIn(300);
        });
    });

    $('.povtor').click(function () {
        var order_id = $(this).data('item'),
                userID = $(this).data('user'),
                action = 'update_user_order';
        $.post("/include/account.php", {order_id: order_id, userID: userID, action: action}, function (data) {
            window.location = "http://www.mysecretplace.ru/order/";
        });
    });

    $('#RegistrationForm').ajaxForm(function (data) {
        $('#RegistrationForm .form-group').hide();
        $('#RegistrationForm').html(data);
    });
    $('#FormAuth').ajaxForm(function (data) {
        window.location = "http://www.mysecretplace.ru";
    });
});

function yes() {
    $.cookie('yes_int', '1');
}



function animateBtn() {
    $('.alert').fadeIn(300);
    $('.flip').addClass('adding');
    setTimeout(function () {
        $('.flip').removeClass('adding');
        $('.alert').fadeOut(300);
    }, 1500);
    $('html').addClass('nav-active');
}


function UpdateCarts() {
    UpdateHeaderCart();
    UpdateRightCart();
}

function DeleteCart(param) {
    var item = param;
    $.post("/include/DeleteCart.php", {item: item}, function (data) {
        if (data !== 'FALSE') {
            UpdateCarts();
        }
    });
}

function UpdateHeaderCart() {
    var u = 1;
    $.post("/include/HeaderUpdeter.php", {u: u}, function (data) {
        $("#HeaderCart").html(data);
    });
}

function UpdateRightCart() {
    var u = 2;
    $.post("/include/UpdateRightCart.php", {u: u}, function (data) {
        $("#rightItemCart").html(data);
    });
}

function UpdateOrder() {
    var u = 3;
    $.post("/include/UpdateOrder.php", {u: u}, function (data) {
        $('.ajax-order').html(data);
    });
}

function plusElement(param, param2) {
    var item = param;
    var sess = param2;
    var select = "plus";
    $.post("/include/UpdateCount.php", {item: item, sess: sess, select: select}, function (data) {
        UpdateCarts();
        UpdateOrder();
    });
}

function minusElement(param, param2) {
    var item = param;
    var sess = param2;
    var select = "minus";
    $.post("/include/UpdateCount.php", {item: item, sess: sess, select: select}, function (data) {
        UpdateCarts();
        UpdateOrder();
    });
}

function DeleteOrderCart(param) {
    var item = param;
    $.post("/include/DeleteCart.php", {item: item}, function (data) {
        if (data.toString().trim() !== 'FALSE') {
            UpdateCarts();
            UpdateOrder();
        }
    });
}

function Order() {
    var order_name = $('#order-name').val();
    var order_city = $('#newcity option:selected').text();
    var order_street = $('#order-street').val();
    var order_room = $('#order-room').val();
    var order_index = $('#order-index').val();
    var order_phone = $('#order-phone').val();
    var order_phone2 = $('#order-phone2').val();
    var dostavka = $('#newdostavka option:selected').text();
    var oplata = $('#oplt').val();
    var deliveryprice = $('#deliveryprice').val();
    var deliveryDateMax = $('#deliveryDateMax').val();
    var postomat = $('#postomat option:selected').text();
    var postmat_id = $('#postomat').val();
    var dostavka_id = $('#newdostavka').val();
    var order_city_id = $('#newcity').val();
    $.post("/include/Order.php", {order_name: order_name, order_city: order_city, order_street: order_street, order_room: order_room, order_index: order_index, order_phone: order_phone, order_phone2: order_phone2, oplata: oplata, dostavka: dostavka, deliveryprice: deliveryprice, deliveryDateMax: deliveryDateMax, postomat: postomat, postmat_id: postmat_id, dostavka_id: dostavka_id, order_city_id: order_city_id}, function (data) {
        if (isNaN(parseInt(data))) {
            $('input').removeClass('error');
            $(data.trim()).addClass('error');
        } else {
            $('input').removeClass('error');
            var clientid = data.toString().trim();
            window.location = "http://www.mysecretplace.ru/order/?order=1&clientid=" + clientid;
        }
    });
    UpdateCarts();
    return false;
}