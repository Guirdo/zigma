$('#btnSearch').on('click',function(event){
    event.preventDefault();

    var input = $('#inpSearch').val();

    search(input);
});

function search(input){
    
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
             url: window.location.origin+'/employees/searchTeacher',
             type: 'POST',
             data: {input},
             dataType: 'json',
             success: function(response){
                 var teachers = response.teachers;

                 $('#tbody tr').remove();

                 $.each(teachers,function(i,v){
                     $('#tbody').append(
                        '<tr>'+
                        '<td><input type="radio" name="teacher_id" value="'+v.id+'"></td>'+
                        '<td>'+v.id+'</td>'+
                        '<td>'+v.name+' '+v.lastname+'</td>'+
                        '</tr>'
                     );
                 });
                
             },
             error: function(response){
                console.log(response);
                alert('Something wrong happens!!');
             }
         });
}