$(document).ready(function(){
    $('#alert-delete').hide();
});

$('#btnDelete').on('click',function(){
    $('#alert-delete').show(500);
  });

$('#btnCancel').on('click',function(){
    $('#alert-delete').hide(500);
  });

$('#btnConfirm').on('click',function(event){
    event.preventDefault();
    
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        var tutor_id = $('#tutor_id').val();
        
        $.ajax({
             url: window.location.origin+'/tutors/'+tutor_id,
             type: 'DELETE',
             data: {},
             dataType: 'json',
             success: function(response){
                window.location.replace(window.location.origin+response.redirect);
             },
             error: function(response){
                console.log(response);
                alert('Something wrong happens');
             }
         });
  });