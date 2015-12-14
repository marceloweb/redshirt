$(function () {
    $("#register").click(function () {
        $("#form").css({"display": "block"});
    });

    var uf_id;
    var uf = [];
    $.ajax({
        url: 'http://redshirt.local/uf',
        type: 'get',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                uf.push({label: item.uf, value: item.id});
            });
        },
    });

    $("#uf").autocomplete({
        source: uf,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#uf_id").val(ui.item.value);
            uf_id = ui.item.value;

            var city = [];
            $.ajax({
                url: 'http://redshirt.local/city/' + uf_id,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (i, item) {
                        city.push({label: item.city, value: item.id});
                    });
                },
            });

            $("#city").autocomplete({
                source: city,
                select: function (event, ui) {
                    event.preventDefault();
                    $(this).val(ui.item.label);
                    $("#city_id").val(ui.item.value);
                }
            });
        }
    });

    $("#send").click(function () {
        submit();
    });


    function submit() {
        $.ajax({
            url: 'http://redshirt.local/save',
            data: "firstname=" + $("#firstname").val() + "&lastname=" + $("#lastname").val() + "&email=" + $("#email").val(),
            type: 'post',
            context: document.body,
            success: function (data) {
                alert('Cadastro realizado com sucesso!');
            },
        });
    }


});