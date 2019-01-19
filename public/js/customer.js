$(document).ready(function () {
$("#CustomerIdsChanges").change(function(e){
        e.preventDefault();
        var Customer_id =$("#CustomerIdsChanges option:selected").val();
        console.log(Customer_id);
        $.ajax({
            type:"get",
            url :'/admin/getSubCustomerData',
            data: {Customer_id:Customer_id},
            success:function(data){
                // console.log(data);
                if(data !=''){
                    $('#SubCustomerDivDataLoad').html(data);
                }else{
                    $('#SubCustomerDivDataLoad').html('<p style="color: red">Nill Sub Customer</p>');
                }
            }
        });
    });
});
