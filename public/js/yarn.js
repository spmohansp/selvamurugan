$(document).ready(function () {

    $(".CalculateYarnBagQuantity").on('change keyup',function(e){
        e.preventDefault();
        $("#net_weight").val(parseFloat($("#total_bag").val()) * parseFloat($("#total_kg_bag").val()));
    });




    $(".YarnType").on('change keyup',function(e){
        e.preventDefault();
        if ($(this).val() == 'full'){
            $('#net_weight').attr('readonly', true);
            $('#total_bag_div').show();
            $('#total_kg_bag_div').show();
            $("#net_weight").val('');
            $('#total_kg_bag').attr('required', true);
            $('#total_bag').attr('required', true);
            $('#net_weight').attr('required', false);
        } else if($(this).val() == 'baby'){
            $('#net_weight').attr('readonly', false);
            $('#net_weight').attr('required', true);
            $('#total_kg_bag').attr('required', false);
            $('#total_bag').attr('required', false);
            $('#total_bag').val('');
            $('#net_weight').val('');
            $('#total_kg_bag').val('');
            $('#total_bag_div').hide();
            $('#total_kg_bag_div').hide();
        } else if($(this).val() == 'warping'){
            $('#net_weight').attr('readonly', false);
            $('#net_weight').attr('required', true);
            $('#total_kg_bag').attr('required', false);
            $('#total_bag').attr('required', false);
            $('#total_bag').val('');
            $('#net_weight').val('');
            $('#total_kg_bag').val('');
            $('#total_bag_div').hide();
            $('#total_kg_bag_div').hide();
        }
    });



});