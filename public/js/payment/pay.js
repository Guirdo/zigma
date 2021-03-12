$(document).ready(function(){
    var amount = $('#amount').val();
    var surcharge = $('#surcharge').val();

    $('#total').val(parseFloat(amount) + parseFloat(surcharge));
});

$('#concept').change(function(){
    var concept = $('#concept').val();
    var default_amount = $('#default_amount').val();

    if(concept == 1){
        $('#amount').val(default_amount);
        $('#amount').prop('readonly',true);
    }else{
        $('#amount').val('50');
        $('#amount').prop('readonly',false);
    }

    setTotal();
});

$('#surcharge').on('keyup',function(e){
    e.preventDefault();

    setTotal();
});

function setTotal(){
    var amount = $('#amount').val();
    var surcharge = $('#surcharge').val();

    $('#total').val(parseFloat(amount) + parseFloat(surcharge));
}