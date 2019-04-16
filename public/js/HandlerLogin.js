function AjaxLogin(FirstName, messageError, baseHost) {
    $.ajax({
        url: 'http://' + baseHost + '/login/validate',
        type: 'POST',
        dataType: 'text',
        data: {"login": $('#' + FirstName).val()},
        beforeSend: function () {
            document.getElementById(messageError).innerHTML = 'Ожидание данных...';
        },
        success: function (response) {
            if (response !== '') {
                document.getElementById(messageError).innerHTML = response;
            } else {
                location.href = 'http://' + baseHost + '/redactor'
            }
        },
        error: function () {
            document.getElementById(messageError).innerHTML = 'Ошибка!';
        }
    })
}