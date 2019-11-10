$(document).ready(function () {
    $('#buku_table').DataTable({
        serverSide: true,
        processing: true,
        ajax: {},
        fnRowCallback: function (row) {
            $('td', row).eq(0).css('font-weight', 'bold');
            $('td', row).addClass('word-warp');
            $('td', row).eq(1).css('width', '100px');
            $('td', row).eq(5).addClass('btn-warp');
        },
        columns: [
            {
                data: null,
                orderable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'isbn',
                name: 'isbn',
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
                name: 'penerbit',
            },
            {
                data: 'aksi',
                name: 'aksi',
                orderable: false,
                searchable: false
            }]
    });

    $('#create_record').click(function () {
        $('.modal-title').text("Buku Baru");
        $('#isbn').inputmask('999-999-99999-9-9')
        $('#buku_form')[0].reset();
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#formModal').modal('show');
        $('.is-invalid').removeClass('is-invalid');
    });

    $(document).on('click', '.edit', function () {
        var id = $(this).attr('id');
        $.ajax({
            url: "/master/buku/" + id + "/edit",
            dataType: "json",
            success: function (html) {
                $('#isbn').val(html.data.isbn).inputmask('999-999-99999-9-9');
                $('#judul').val(html.data.judul);
                $('#penulis').val(html.data.penulis);
                $('#penerbit').val(html.data.penerbit);
                // $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
                // $('#store_image').append("<input type='hidden' name='hidden_image' value='" + html.data.image + "' />");
                $('#id').val(html.data.id);
                $('.is-invalid').removeClass('is-invalid');
                $('.modal-title').text("Edit Buku ");
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal('show');
            }
        })
    });

    $('#buku_form').on('submit', function (event) {
        event.preventDefault();
        $('#isbn').inputmask('');
        if ($('#action').val() == 'Add') {
            $.ajax({
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.errors) {
                        for (control in data.errors) {
                            $('input[name=' + control + ']').addClass('is-invalid');
                            $('#error-' + control).html(data.errors[control]);
                        }
                    }
                    if (data.success) {
                        $('#buku_form')[0].reset();
                        $('#buku_table').DataTable().ajax.reload();
                    }
                }
            })
        }
        if ($('#action').val() == "Edit") {
            $('#isbn').inputmask('');
            $.ajax({
                url: "/master/buku/update",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.errors) {
                        for (control in data.errors) {
                            $('input[name=' + control + ']').addClass('is-invalid');
                            $('#error-' + control).html(data.errors[control]);
                        }
                    }
                    if (data.success) {
                        setTimeout(function () {
                            $('#buku_form')[0].reset();
                            $('#store_image').html('');
                            $('#formModal').modal('hide');
                            $('#buku_table').DataTable().ajax.reload();
                        }, 1000);
                    }
                }
            });
        }
    });

    var user_id;
    $(document).on('click', '.delete', function () {
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
        $('.modal-title').text('Konfirmasi');
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
                    $('#ok_button').text('ok');
                }, 1000);
            }
        })
    });
});
