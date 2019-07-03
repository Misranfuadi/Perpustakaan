$(document).on('submit', 'form#frm', function (event) {
    event.preventDefault();
    var form = $(this);
    var data = new FormData($(this)[0]);
    var url = form.attr("action");
    $.ajax({
        type: form.attr('method'),
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('.is-invalid').removeClass('is-invalid');
            if (data.fail) {
                for (control in data.errors) {
                    $('input[name=' + control + ']').addClass('is-invalid');
                    $('#error-' + control).html(data.errors[control]);
                }
            } else {
                $('#modalForm').modal('hide');
                ajaxLoad(data.redirect_url);
            }
        },
        error: function (errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function ajaxLoad(filename, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $('.loading').show();
    $.ajax({
        type: "GET",
        url: filename,
        contentType: false,
        success: function (data) {
            $("#" + content).html(data);
            $('#table').DataTable({
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "destroy": true,
            });
            $('.loading').hide();
        },
        error: function (xhr) {
            alert(xhr.responseText);
        }
    });
}

function ajaxDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $('.loading').show();
    $.ajax({
        type: 'POST',
        data: {
            _method: 'DELETE',
            _token: token
        },
        url: filename,
        success: function (data) {
            $('#modalDelete').modal('hide');
            $("#" + content).html(data);
            $('#table').DataTable({
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "destroy": true,
            });
            $('.loading').hide();
        },
        error: function (xhr) {
            alert(xhr.responseText);
        }
    });
}
$('#modalForm').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    ajaxLoad(button.data('href'), 'modal_content');
});
$('#modalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    $('#delete_id').val(button.data('id'));
    $('#delete_token').val(button.data('token'));
});
$('#modalForm').on('shown.bs.modal', function () {
    $('#focus').trigger('focus')
});

$(function () {
    $('#table').DataTable({
        "ordering": false,
        "info": true,
        "autoWidth": false,
    });
});
