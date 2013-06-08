$(function () {
    $('.choices').change(function (e) {
        $('#searched_text').toggle($('#optionsRadios3').prop('checked'));
    });

    $('form#remote_search').submit(function (event) {
        event.preventDefault();
        var form = $(this).serialize();
        $.post('/index.php?action=process&layout=empty', form).done(function (html) {
            $('#results').html(html);
        });
    });
});