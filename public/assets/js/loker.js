$(document).ready(function()
{
    $("#uii-form.loker").submit(function(e)
    {
        e.preventDefault(); // Stop Browser to follow the action URL
        var url      = $(this).attr('action');
        var method   = $(this).attr('method');
        var data     = $(this).serialize();
        var base_url = window.location.origin;

        $.ajax({
            url: url,
            type: method,
            data: data
        }).done(function(data)
        {
           if(data != '1')
           {
                $("#post-message").hide();
                $("#post-message").show('slow');
                $("#post-message").html(data);
            }
            else if (data == '1')
            {
                window.location.href = base_url + '/admin/loker?msg=Lowongan Kerja Successfully Created!';
                throw new Error('go');
            }
        });
    });

    $("#uii-form.loker-edit").submit(function(e)
    {
        e.preventDefault(); // Stop Browser to follow the action URL
        var url      = $(this).attr('action');
        var method   = $(this).attr('method');
        var data     = $(this).serialize();
        var base_url = window.location.origin;

        $.ajax({
            url: url,
            type: method,
            data: data
        }).done(function(data)
        {
           if(data != '1')
           {
                $("#post-message").hide();
                $("#post-message").show('slow');
                $("#post-message").html(data);
            }
            else if (data == '1')
            {
                window.location.href = base_url + '/admin/loker?msg=Lowongan Kerja Successfully Edited!';
                throw new Error('go');
            }
        });
    });

    $("#form-delete").submit(function(e)
    {
        e.preventDefault(); // Stop Browser to follow the action URL
        var url      = $(this).attr('action');
        var method   = $(this).attr('method');
        var data     = $(this).serialize();
        var base_url = window.location.origin;

        $.ajax({
            url: url,
            type: method,
            data: data
        }).done(function(data)
        {
           if(data != '1')
           {
                $("#post-message").hide();
                $("#post-message").show('slow');
                $("#post-message").html(data);
            }
            else if (data == '1')
            {
                location.reload();
            }
        });
    });
});