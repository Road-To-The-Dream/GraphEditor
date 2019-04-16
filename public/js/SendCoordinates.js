function AjaxSendCoordinates(image, baseHost) {
    let srcImg = document.getElementById(image).src;

    let nameFigure = selectNameFigure($("#list option:selected").text());

    let coordinates = seriallize(nameFigure);

    let colorBorder = $('#color').val();

    $.ajax({
        url: 'http://' + baseHost + '/Redactor/validateCoordinates',
        type: 'post',
        dataType: 'text',
        data: {
            "coordinates": coordinates,
            "srcImg": srcImg
        },
        success: function (response) {
            if (response === '') {
                $('#messageError').text('');
                $.ajax({
                    url: 'http://' + baseHost + '/Redactor/createPicture',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        "figure": nameFigure,
                        "coordinates": coordinates,
                        "colorBorder": colorBorder,
                        "srcImg": srcImg
                    },
                    success: function (response) {
                        $('#image').attr('src', '/UserImage/' + response);
                    }
                });
            } else {
                $('#messageError').text(response);
            }
        }
    });
}

function selectNameFigure(nameFigure) {
    let Figure = '';

    switch (nameFigure) {
        case 'Квадрат':
            Figure = 'Square';
            break;
        case 'Прямоугольник':
            Figure = 'Rectangle';
            break;
        case 'Параллелограмм':
            Figure = 'Parallelogram';
            break;
        case 'Эллипс':
            Figure = 'Ellipse';
            break;
        case 'Окружность':
            Figure = 'Circle';
            break;
        case 'Точка':
            Figure = 'Point';
            break;
        case 'Отрезок':
            Figure = 'Line';
            break;
        case 'Треугольник':
            Figure = 'Triangle';
            break;
        case 'Текст':
            Figure = 'Text';
            break;
    }

    return Figure;
}

function seriallize(nameFigure) {

    switch (nameFigure) {
        case 'Square':
            return seriallizeRectangle();
        case 'Rectangle':
            return seriallizeRectangle();
        case 'Parallelogram':
            return seriallizeParallelogram();
        case 'Ellipse':
            return seriallizeEllipse();
        case 'Circle':
            return seriallizeCircle();
        case 'Point':
            return seriallizePoint();
        case 'Line':
            return seriallizeLine();
        case 'Triangle':
            return seriallizeTriangle();
        case 'Text':
            return seriallizeText();
    }
}