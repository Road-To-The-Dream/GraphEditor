function checkAmountInput() {
    if ($('#coordinates').children().length > 1) {
        let amountInput = $('#coordinates').children().length - 1;
        for (let i = 0; i < amountInput; i++) {
            $('#input' + (i + 1)).remove();
        }
    }
}

function dynamicAddInputCircle() {
    checkAmountInput();

    $('#coordinates').append($('<input>', {
        type: 'text',
        name: 'x1',
        id: 'input1',
        class: 'mb-2',
        placeholder: 'x1'
    }));

    $('#coordinates').append($('<input>', {
        type: 'text',
        name: 'y1',
        id: 'input2',
        class: 'mb-2',
        placeholder: 'y1'
    }));

    $('#coordinates').append($('<input>', {
        type: 'text',
        name: 'diameter',
        id: 'input3',
        class: 'mb-2',
        placeholder: 'diameter'
    }));
}

function seriallizeCircle() {
    return {
        x1: $('input[name=x1]').val(),
        y1: $('input[name=y1]').val(),
        diameter: $('input[name=diameter]').val()
    };
}