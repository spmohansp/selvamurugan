$(document).ready(function () {


    $('body').on('change',".DeleveryChanges",function(e){
        e.preventDefault();
        // var Sub_Customer_id =$("#sub_customer_id option:selected").val();
        // var Customer_id =$(".DeleverCustomerId option:selected").val();
        var Sizing_set_id =$("#Sizing_set_id option:selected").val();
        $.ajax({
            type:"get",
            url :'/admin/getNonDeleveredSizingBeamList',
            data: {Sizing_set_id:Sizing_set_id},
            success:function(data){
                if(data !=''){
                    $('#NonDeleverBeamListDiv').html(data);
                    $('.SearchableDropDownSelect').select2();
                }else{
                    $('#SubCustomerDivDataLoad').html('<p style="color: red">Nill Beam Customer</p>');
                }
            }
        });
    });

    $('body').on('click',"#AddFullBeamDelevery",function(e){
        e.preventDefault();
        var sizing_beam_id = $('#Non_Delever_Sizing_Beam option:selected').val();
        if(sizing_beam_id != undefined){
            $.ajax({
                type:"get",
                url :'/admin/getNonDeleveredSizingBeamDetail',
                data: {sizing_beam_id:sizing_beam_id},
                success:function(data){
                    if(data !=''){
                        $('.AddSizingBEamDeleveryDiv').append(data);
                    }
                }
            });
        }
    });
});
