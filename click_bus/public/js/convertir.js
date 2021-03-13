$( document ).ready(function() {

    function save_operation(operation) {
        $.ajax({
            method: "POST",
            url: "/operation",
            data: JSON.stringify(operation),
            contentType: "application/json"
        }).done(function(response) {
            console.log(response);
        }).fail(function(response) {
            console.log(response.responseText);
        });
    }

    function reqConv(coin, selectCoin, cantidad, uuid){
        var key = coin +"_" + selectCoin;

        $.ajax({
            url: "https://free.currconv.com/api/v7/convert?q=" + key + "&compact=ultra&apiKey=" + config.apikey,
        }).done(function(response) {
            var operation = {
                amount: cantidad,
                from_currency: coin,
                to_currency: selectCoin,
                converted_value: response[key],
                uuid: uuid
            };

            $('#'+ coin).html(response[key]*cantidad)
            save_operation(operation);
        });
    }

    function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    $('form[name=coin_exchange]').submit(function(event) {
        event.preventDefault();

        var valorSelect = $('#coin_exchange_coin').val();
        var cantidad = $('#coin_exchange_amount').val();
        var uuid = uuidv4();
        reqConv('MXN',valorSelect,cantidad, uuid);
        reqConv('ERN',valorSelect,cantidad, uuid);
        reqConv('DZD',valorSelect,cantidad, uuid);
        reqConv('CDF',valorSelect,cantidad, uuid);
        reqConv('MAD',valorSelect,cantidad, uuid);
        reqConv('SYP',valorSelect,cantidad, uuid);
    })
});