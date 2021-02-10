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
             url: window.location.origin+'/employees/search',
             type: 'POST',
             data: {input},
             dataType: 'json',
             success: function(response){
                 var employees = response.employees;
                 var employeetypes = response.employeetypes;

                 $('#tbody tr').remove();

                 $.each(employees,function(i,v){
                     $('#tbody').append(
                        '<tr>'+
                        '<td><input type="radio" name="employee_id" value="'+v.id+'"></td>'+
                        '<td>'+v.id+'</td>'+
                        '<td>'+v.name+' '+v.lastname+'</td>'+
                        '<td>'+employeetypes[i].employeetype+'</td>'+
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