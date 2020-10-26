$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // details
    $('.order-detail').on('click', function (){
        let id = $(this).data('id');
        let url = $(this).data('url');
        $.ajax({
            dataType: 'json',
            method: 'get',
            url: url,
            success: function (data){
                if (data.code === 200){
                    $('.table-detail-order').html(data.html);
                }
            }
        })
    })
    // end detail

    // cancel order
    $('.btn-cancel-order').on('click', function (){
        $('.id-cancel-order').val($(this).data('id'));
    })

    $('.accept-cancel-order').on('click', function(){
        let id = $('input.id-cancel-order').val();
        let url = '/admin/order/cancel/' + id;
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'put',
            success: function (data){
                let htmlHandle = '<button class="btn-danger btn-hanble">Đã hủy</button>';
                let row = $('.rowTable' + id);
                row.find('#handleJs').empty().append(htmlHandle);
                let htmlDelOrder = '<button data-id="' + id + '" class="btn-danger del-order" id="delOrdel" data-toggle="modal" data-target="#modal-del-order" ><i class="fa fa-trash-alt "></i></button>';
                row.find('.btn-cancel-order').remove();
                row.find('#delOrder').append(htmlDelOrder);
                toastr.success(data.message,'Thông báo',{
                    timeOut: 2000
                });
                $('#modal-cancel').modal('hide');
            }
        })
    })
    // end cancel order

    // del order
    $(this).on('click', '.del-order',function (){
        $('.id-del-order').text($(this).data('id'));
    });
    function delOrder(e) {
        e.preventDefault();
        let id = $('.id-del-order').text();
        let url = '/admin/order/del/' + id;
        $.ajax({
            dataType: 'json',
            type: 'delete',
            url: url,
            success: function (data) {
                toastr.success(data.message, 'Thông báo', {
                    timeOut: 2000
                });
                $('.rowTable' + id).remove();
                $('#modal-del-order').modal('hide');
            }
        })
    }
    $(this).on('click', '.accept-del-order', delOrder);
    // end del order
});
