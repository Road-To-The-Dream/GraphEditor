function checkAmountInput() {
    if ($('#coordinates').children().length > 1) {
        let amountInput = $('#coordinates').children().length - 1;
        for (let i = 0; i < amountInput; i++) {
            $('#input' + (i + 1)).remove();
        }
    }
}

function dynamicAddInputRectangle(countCoordinates) {
    checkAmountInput();

    let j = 1;
    for (let i = 0; i < countCoordinates / 2; i++) {
        $('#coordinates').append($('<input>', {
            type: 'text',
            name: 'x' + (i + 1),
            id: 'input' + j,
            class: 'mb-2',
            placeholder: 'x' + (i + 1)
        }));

        $('#coordinates').append($('<input>', {
            type: 'text',
            name: 'y' + (i + 1),
            id: 'input' + (j + 1),
            class: 'mb-2',
            placeholder: 'y' + (i + 1)
        }));

        j = j + 2;
    }
}

function seriallizeRectangle() {
    return {
        x1: $('input[name=x1]').val(),
        y1: $('input[name=y1]').val(),
        x2: $('input[name=x2]').val(),
        y2: $('input[name=y2]').val()
    };
}