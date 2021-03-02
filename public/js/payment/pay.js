$(document).ready(function(){
    var amount = $('#amount').val();
    var surcharge = $('#surcharge').val();

    $('#total').val(parseFloat(amount) + parseFloat(surcharge));
});

$('#concept').change(function(){
    var concept = $('#concept').val();
    
    if(concept == 1){
        $('#amount').val($('default_amount').val());
    }
});

$('#surcharge').on('keyup',function(e){
    e.preventDefault();

    var amount = $('#amount').val();
    var surcharge = $('#surcharge').val();

    $('#total').val(parseFloat(amount) + parseFloat(surcharge));
});