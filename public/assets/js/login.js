$(document).ready(function()
{
    $("#uii-form.login").submit(function(e)
    {
        e.preventDefault(); // Stop Browser to follow the action URL
        var url      = $(this).attr('action');
        var method   = $(this).attr('method');
        var data     = $(this).serialize();
        var base_url = window.location.origin;

        $.ajax({
            url:url,
            type:method,
            data:data
        }).done(function(data)
        {
           if(data != '1' && data != '0')
           {
                $("#login-message").hide();
                $("#login-message").show('slow');
                $("#uii-form.login")[0].reset();
                $("#login-message").html(data);
            }
            else if (data == '1')
            {
                window.location.href = base_url + '/admin/';
                throw new Error('go');
            }
            else if (data == '0')
            {
                window.location.href = base_url + '/user/';
                throw new Error('go');
            }
        });
    });
});