$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('.delPrdJS').on('click', function(e) {
        $('.titleDelPrdJS').text($(this).data('name'));
        $('.idDelPrdJS').text($(this).data('id'));
    });
    $('.btn-acceptDelOrderJS').on('click', function(e) {
        let id = $('.idDelPrdJS').text();
        let url = '/admin/product/' + id;
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'delete',
            success: function(data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                $('.rowTable' + id).remove();
                $('#delProductModal').modal('hide');
            }
        });
    });
});