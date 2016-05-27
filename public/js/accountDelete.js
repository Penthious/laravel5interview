$('input[type=submit]').on('click', function (e){
    e.preventDefault();
    if (confirm('Are you sure you want to delete your account')){
        $('#delete').submit();
    };
})
