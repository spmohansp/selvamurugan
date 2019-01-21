$(document).ready(function () {

    $(".CalculateWarpingBagQuantity").on('change keyup',function(e){
        e.preventDefault();
        var rewainding_weight = $("#rewainding_weight").val();
        var baby_cone_weight = $("#baby_cone_weight").val();
        if(rewainding_weight ==''){  rewainding_weight = 0;}
        if(baby_cone_weight ==''){  baby_cone_weight = 0;}

        var total_kg_bag1 = $("#total_kg_bag1").val();
        var total_bag1 = $("#total_bag1").val();
        // if(total_kg_bag1 ==''){  total_kg_bag1 = 0;}
        // if(total_bag1 ==''){  total_bag1 = 0;}

        var total2 =0;
        if(($("#total_kg_bag2").val() !=  '') || ($("#total_bag2").val() != '')){
            total2 = parseFloat($("#total_kg_bag2").val()) * parseFloat($("#total_bag2").val());
            $('#total_kg_bag2').attr('required', true);
            $('#total_bag2').attr('required', true);
            $('#company_id_2').attr('required', true);
        }else{
            $('#total_kg_bag2').attr('required', false);
            $('#total_bag2').attr('required', false);
            $('#company_id_2').attr('required', false);
        }
        $("#net_weight").val(parseFloat(rewainding_weight) + parseFloat(baby_cone_weight) + (parseFloat(total_kg_bag1) * parseFloat(total_bag1)) + parseFloat(total2));
    });
});