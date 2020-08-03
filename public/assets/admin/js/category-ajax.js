// add-category
$(document).ready(function() {
    $('.btn-saveAddCatJs').on('click', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let errorAddCatJS = $(".errorAddCatJS");
        let nameAddCatJS = $(".nameAddCatJS");
        $.ajax({
            url: url,
            data: {
                name: nameAddCatJS.val(),
            },
            type: "POST",
            success: function(response) {
                if (response.code === 200) {
                    $(".content-panel").html(response.tableComponents);
                    toastr.success(response.message, "Thông báo", {
                        timeOut: 3000
                    });
                    nameAddCatJS.val('');
                    $("#addCatModal").modal("hide");
                }
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorAddCatJS.removeClass("d-none");
                errorAddCatJS.text(error);
            }
        });
    });
});
// end-add-cat


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // edit-cate
    function editCat(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data('id');
        $('.idEditCatJS').val(id);
        let errorEditCatJS = $('.errorEditCatJS');
        errorEditCatJS.addClass('d-none');
        $.ajax({
            url: url,
            dataType: "json",
            type: 'get',
            success: function(data) {
                $('.titleEditCatJS').text(data.name);
                $('.nameEditCatJS').val(data.name);
            }
        });
    }
    $(this).on('click', '.editCatJS', editCat)

    // end-edit-cat

    // update-Cat
    function updateCat(e) {
        e.preventDefault();
        let id = $('.idEditCatJS').val();
        let url = '/admin/category/' + id;
        let errorEditCatJS = $('.errorEditCatJS');
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'put',
            data: {
                name: $('.nameEditCatJS').val(),
                id: id, // check trung ten
            },
            success: function(data) {
                if (data.code === 200) {
                    $('.card-body').html(data.tableComponents);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    $('#editCatModal').modal('hide')
                }
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorEditCatJS.removeClass("d-none");
                errorEditCatJS.text(error);
            }
        });
    }
    $(this).on('click', '.btn-updateCatJs', updateCat)
        // end update

    // del catModal
    $(this).on('click', '.delCatJS', function() {
        $('.titleDelCatJS').text($(this).data('name'));
        $('.idDelCatJS').val($(this).data('id'));
    });

    function delCat(e) {
        e.preventDefault();
        let id = $('.idDelCatJS').val();
        let url = '/admin/category/' + id;
        $.ajax({
            url: url,
            type: 'delete',
            dataType: 'json',
            success: function(data) {
                if (data.code === 200) {
                    $('.content-panel').html(data.tableComponents);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    $("#delCatModal").modal('hide');
                } else {
                    toastr.error(data.message, 'Thông báo', {
                        timeOut: 3000
                    });
                    $("#delCatModal").modal('hide');
                }
            },
        });
    }
    $(this).on('click', '.btn-acceptDelCatJS', delCat);
    // end del
});
