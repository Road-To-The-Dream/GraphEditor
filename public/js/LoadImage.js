function AjaxLoadImage(path, baseHost) {
    let file_data = $('#' + path).prop('files')[0];
    let form_data = new FormData();

    form_data.append('file', file_data);

    $.ajax({
        url: 'http://' + baseHost + '/Redactor/loadImage',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response) {
            if (response[0] === '') {
                $('#image').attr('src', response[3]);
            } else {
                swal({
                    title: response[0],
                    text: response[1],
                    icon: "error",
                    button: "OK"
                })
            }
        }
    });
}


