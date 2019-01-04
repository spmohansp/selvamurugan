$(document).ready(function () {

    $(".CalculateYarnBagQuantity").on('change keyup',function(e){
        e.preventDefault();
        $("#net_weight").val(parseFloat($("#total_bag").val()) * parseFloat($("#total_kg_bag").val()));
    });



});