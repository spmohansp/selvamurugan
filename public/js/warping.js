$(document).ready(function () {

    $(".CalculateWarpingBagQuantity").on('change keyup',function(e){
        e.preventDefault();
        var rewainding_weight = $("#rewainding_weight").val();
        var baby_cone_weight = $("#baby_cone_weight").val();
        if(rewainding_weight ==''){  rewainding_weight = 0;}
        if(baby_cone_weight ==''){  baby_cone_weight = 0;}
        $("#net_weight").val(parseFloat(rewainding_weight) + parseFloat(baby_cone_weight) + (parseFloat($("#total_bag").val()) * parseFloat($("#total_kg_bag").val())));
    });
});