$("select").change(function () {
    if ($("#list").val() == 'default') {
        let divBorder = document.getElementById('border');
        let divCoordinates = document.getElementById('coordinates');
        let divButton = document.getElementById('btn');
        divBorder.style.display = 'none';
        divCoordinates.style.display = 'none';
        divButton.style.display = 'none';
        return false;
    }
    methodHide();
    showBlockInput($(this).val());
});

function methodHide() {
    let e = document.getElementById('border');
    e.style.display = 'block';
}

function showBlockInput(nameFigure) {
    let divCoordinates = document.getElementById('coordinates');
    let divButton = document.getElementById('btn');
    divCoordinates.style.display = 'block';
    divButton.style.display = 'block';

    switch (nameFigure) {
        case 'Квадрат' :
            $("head").append('<script src="/js/figure/Rectangle.js"></script>');
            dynamicAddInputRectangle(4);
            break;
        case 'Прямоугольник' :
            $("head").append('<script src="/js/figure/Rectangle.js"></script>');
            dynamicAddInputRectangle(4);
            break;
        case 'Параллелограмм' :
            $("head").append('<script src="/js/figure/Parallelogram.js"></script>');
            dynamicAddInputParallelogram(8);
            break;
        case 'Эллипс' :
            $("head").append('<script src="/js/figure/Ellipse.js"></script>');
            dynamicAddInputEllipse();
            break;
        case 'Окружность' :
            $("head").append('<script src="/js/figure/Circle.js"></script>');
            dynamicAddInputCircle();
            break;
        case 'Точка' :
            $("head").append('<script src="/js/figure/Point.js"></script>');
            dynamicAddInputPoint();
            break;
        case 'Отрезок' :
            $("head").append('<script src="/js/figure/Line.js"></script>');
            dynamicAddInputLine(4);
            break;
        case 'Треугольник' :
            $("head").append('<script src="/js/figure/Triangle.js"></script>');
            dynamicAddInputTriangle(3);
            break;
        case 'Текст' :
            $("head").append('<script src="/js/figure/Text.js"></script>');
            dynamicAddInputText();
            break;
    }
}