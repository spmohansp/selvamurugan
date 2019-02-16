$(document).ready(function () {

    $(".CalculateYarnBagQuantity").on('change keyup',function(e){
        e.preventDefault();
        $("#net_weight").val(parseFloat($("#total_bag").val()) * parseFloat($("#total_kg_bag").val()));
    });

    $(".Yarn_company").on('change keyup', function (e) {
        var Yarn_company = $('.Yarn_company option:selected').val();
        e.preventDefault();
        if (Yarn_company == '1' || Yarn_company == '2') {
            $('#total_kg_bag').attr('required', false);
            $('#total_bag').attr('required', false);
            $('#net_weight').attr('required', false);
            $('#net_weight').attr('readonly', true);
            $('#total_bag_div').show();
            $('#total_kg_bag_div').show();

        } else {
            $('#net_weight').attr('readonly', true);
            $('#net_weight').attr('required', true);
            $('#total_kg_bag').attr('required', true);
            $('#total_bag').attr('required', true);
            $('#total_bag_div').show();
            $('#total_kg_bag_div').show();
        }
    });



});