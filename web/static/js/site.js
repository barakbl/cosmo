$( document ).ready(function() {

    $( "body" ).on( "click", 'input[type="submit"]', function() {
        $.ajax({
            type: "POST",
            data: $('#loginForm').serialize(),
            dataType : 'json',
            url: baseUrl + '/web/index.php/login',
            success: function(data)
            {
                if(!data.username) {
                    alert('User Not Found')
                } else {
                    $('h2.greet').html('Hello '+ data.username);
                    $('#loginForm').html('');
                }
            }
        });
        return false;
    });
});