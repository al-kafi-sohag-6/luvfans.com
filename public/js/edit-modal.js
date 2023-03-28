function editModal(id, url) {
    if (id) {
        // $('#editPost').modal('show');
        console.log('edit1');
        let _url = url;
        console.log(_url);
        $.ajax({
            url: _url,
            method: "GET",
            success: function (response) {

                console.log(response);
                refresh_modal();

                $('.modalEditPost #id').val(response.id);
                $('.modalEditPost #editDescription').val(response.description);
                setEditEditorData(response.description);

                if (response.locked == 'yes') {
                    $('.modalEditPost #lock_checkbox').prop("checked", true);
                    $('.modalEditPost .contentLocked i').addClass('icon-lock');
                } else {
                    $('.modalEditPost .contentLocked').addClass('unlock');
                    $('.modalEditPost .contentLocked i').addClass('icon-unlock');
                }
                $('.modalEditPost #lock_checkbox').val(response.locked);

                if (parseFloat(response.price) > 0.00) {
                    $('.modalEditPost .price').show();
                    $('.modalEditPost #price').val(response.price);
                } else {
                    $('.modalEditPost .setPrice').show();
                    $('.modalEditPost .contentLocked').show();
                }

                if (response.media.length == 0 && response.locked == 'yes') {
                    $('.modalEditPost .setTitle').show();

                }

                if (response.title) {
                    $('.modalEditPost .titlePost').show();
                    $('.modalEditPost #title').addClass('active');
                    $('.modalEditPost .setTitle').addClass('btn-active-hover');
                    $('.modalEditPost #title').val(response.title);
                }

                $('#editPost').modal('show');
            }
        });
    }
}

function refresh_modal() {
    setEditEditorData('');
    $('.modalEditPost #id').val('');
    $('.modalEditPost #editDescription').val('');
    $('.modalEditPost #lock_checkbox').val('');
    $('.modalEditPost #price').val('');
    $('.modalEditPost #title').val('');
    $('.modalEditPost #lock_checkbox').prop("checked", false);


    $('.modalEditPost .contentLocked').removeClass('unlock');
    $('.modalEditPost .contentLocked i').removeClass('icon-lock');
    $('.modalEditPost .contentLocked i').removeClass('icon-unlock');
    $('.modalEditPost #title').removeClass('active');
    $('.modalEditPost .setTitle').removeClass('btn-active-hover');

    $('.modalEditPost .setPrice').hide();
    $('.modalEditPost .contentLocked').hide();
    $('.modalEditPost .setTitle').hide();
    $('.modalEditPost .titlePost').hide();
    $('.modalEditPost .price').hide();
}
