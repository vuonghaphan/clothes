$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $('.delPer').on('click', function() {
        $('.titleDelPerJS').text($(this).data('name'));
        $('.idDelPerJS').val($(this).data('id'));
    });

    function delPer(e) {
        e.preventDefault();
        let id = $('.idDelPerJS').val();
        let url = '/admin/permission/' + id;
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'delete',
            success: function(data) {
                toastr.success(data.message, 'Thông báo ', {
                    timeOut: 3000
                });
                $('.rowTable' + id).remove();
                $('#delPerModal').modal('hide');
            }
        });
    }
    $('.btn-acceptDelPerJS').on('click', delPer);
});