<div class="main">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <input name="path" id="path" type="file" accept=".txt,image/*">
                <input type="button" onclick="AjaxLoadImage('path', '<?= $configuration['baseHost'] ?>')" value="Load Image">
            </div>
        </div>
        <div class="row">
            <div class="col-8 mt-2">
                <img id="image" width="100%" height="<?= $_SESSION['height'] ?? '' ?>" src="<?= $_SESSION['img'] ?? '' ?>" alt="image">
            </div>
            <div class="col-4">
                <div class="border border-secondary p-3">
                    <p>Выберите фигуру:
                        <select class="mt-3" name="Figure" id="list">
                            <option value="default">--Выберите фигуру--</option>
                            <option value="Квадрат">Квадрат</option>
                            <option value="Прямоугольник">Прямоугольник</option>
                            <option value="Параллелограмм">Параллелограмм</option>
                            <option value="Эллипс">Эллипс</option>
                            <option value="Окружность">Окружность</option>
                            <option value="Точка">Точка</option>
                            <option value="Отрезок">Отрезок</option>
                            <option value="Треугольник">Треугольник</option>
                            <option value="Текст">Текст</option>
                        </select>
                    </p>
                </div>
                <div class="border border-secondary p-3 mt-3 hidden" id="coordinates">
                    <p>Координаты:</p>
                </div>
                <div class="border border-secondary p-3 mt-3 hidden" id="border">
                    <p>Укажите цвет контура:
                        <input type="color" id="color" name="bg" value="#ff0000">
                    </p>
                </div>
                <p class="text-danger" id="messageError"></p>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 hidden" id="btn">
                        <input class="btn btn-success btn-md btn-block mt-2"
                               type="button" name="btn_login" value="Нанести"
                               onclick="AjaxSendCoordinates('image', '<?= $configuration['baseHost'] ?>')">
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php
    require_once 'template/footer.php';
    ?>
</div>
<script>
    $("#list").val($("#list option:first").val());
</script>
<script src="/js/HideElement.js"></script>
<script src="/js/LoadImage.js"></script>
<script src="/js/SendCoordinates.js"></script>
<script src="/js/ChangeSelect.js"></script>