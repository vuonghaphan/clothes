$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $('.delRoleJS').on('click', function() {
        $('.titleDelRoleJS').text($(this).data('name'));
        $('.idDelRoleJS').val($(this).data('id'));
    });

    function delRole(e) {
        e.preventDefault();
        let id = $('.idDelRoleJS').val();
        let url = '/admin/role/' + id;
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'delete',
            success: function(data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                $('.rowTable' + id).remove();
                $('#delRoleModal').modal('hide');
            }
        });
    };
    $('.btn-acceptDelRoleJS').on('click', delRole);
});