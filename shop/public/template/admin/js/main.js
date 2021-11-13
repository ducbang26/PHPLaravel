$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Sau khi xóa dữ liệu không thể khôi phục')) {
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('đã xảy ra lỗi, vui lòng thử lại');
                }
            }
        })
    }
}