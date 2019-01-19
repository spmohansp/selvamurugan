$(document).ready(function () {

    $(".CalculateChemicalTotal").on('change keyup', function (e) {
        e.preventDefault();
        $("#total").val(parseFloat($("#total_bag").val()) * parseFloat($("#cost_per").val()));
    });
});
