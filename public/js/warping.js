$(document).ready(function () {

    $(".CalculateWarpingBagQuantity").on('change keyup',function(e){
        e.preventDefault();
        var rewainding_weight = $("#rewainding_weight").val();
        if(rewainding_weight ==''){  rewainding_weight = 0;}
        $("#net_weight").val(parseFloat(rewainding_weight) + (parseFloat($("#total_bag").val()) * parseFloat($("#total_kg_bag").val())));
    });


});