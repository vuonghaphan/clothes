$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $('.delMember').on('click', function() {
        $('.titleDelMemberJS').text($(this).data('name'));
        $('.idDelMemberJS').val($(this).data('id'));
    });

    function delMember(e) {
        e.preventDefault();
        let id = $('.idDelMemberJS').val();
        let url = '/admin/member/' + id;
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'delete',
            success: function(data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                $('.rowTable' + id).remove();
                $('#delMemberModal').modal('hide');
            }
        });
    }
    $('.btn-acceptDelMemberJS').on('click', delMember)
});