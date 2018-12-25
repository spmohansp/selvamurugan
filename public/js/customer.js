$(document).ready(function () {


    $("#CatagoryChange").change(function(e){
        e.preventDefault();
        console.log('sdf');
        var catagoryId =$("#CatagoryChange option:selected").val();
        $.ajax({
            type:"get",
            url :'/admin/getSubCustomerData',
            data: {catagoryId:catagoryId},
            success:function(data){
                console.log(data);
                $('#SubCatagoryData').html(data);
            }
        });
    });



});