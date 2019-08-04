$(document).ready(function () {
    $('#buku_table').DataTable({
        serverSide: true,
        processing: true,
        ajax: {},
        columns: [{
                data: 'isbn',
                name: 'isbn'
            },
            {
                data: 'judul',
                name: 'judul'
            },
            {
                data: 'penulis',
                name: 'penulis'
            },
            {
                data: 'penerbit',
                name: 'penerbit'
            },
            {
                data: 'aksi',
                name: 'aksi',
                orderable: false
            },
        ]
    });

    $('#create_record').click(function () {
        $('#form_result').html('');
        $('.modal-title').text("Buku Baru");
        $('#buku_form')[0].reset();
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#formModal').modal('show');
    });

    $('#buku_form').on('submit', function (event) {
        event.preventDefault();
        if ($('#action').val() == 'Add') {
            $.ajax({
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#buku_form')[0].reset();
                        $('#buku_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            })
        }
        if ($('#action').val() == "Edit") {
            $.ajax({
                url: "/master/buku/update",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    var html = '';
                    if (data.fail) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#buku_form')[0].reset();
                        $('#store_image').html('');
                        $('#buku_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            });
        }
    });

    $(document).on('click', '.edit', function () {
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
            url: "/master/buku/" + id + "/edit",
            dataType: "json",
            success: function (html) {
                $('#isbn').val(html.data.isbn);
                $('#judul').val(html.data.judul);
                $('#penulis').val(html.data.penulis);
                $('#penerbit').val(html.data.penerbit);
                // $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
                // $('#store_image').append("<input type='hidden' name='hidden_image' value='" + html.data.image + "' />");
                $('#id').val(html.data.id);
                $('.modal-title').text("Edit Buku " + html.data.judul);
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal('show');
            }
        })
    });

    var user_id;
    $(document).on('click', '.delete', function () {
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
        $('#ok_button').text('ok');
    });
    $('#ok_button').click(function () {
        $.ajax({
            url: "/master/buku/destroy/" + user_id,
            beforeSend: function () {
                $('#ok_button').text('Deleting...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#confirmModal').modal('hide');
                    $('#buku_table').DataTable().ajax.reload();
                }, 1000);
            }
        })
    });
});
