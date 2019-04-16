<link rel="stylesheet" href="/css/gallery.css">
<div class="main">
    <div class="container">
        <?php
        if (empty($data['image'])) {
            ?>
            <div class="row text-center text-danger mt-5">
                <div class="col"></div>
                <div class="col"><p style="font-size: 25px">В галерее нет рисунков</p></div>
                <div class="col"></div>
            </div>
            <div class="row text-center">
                <div class="col"></div>
                <div class="col">
                    <a href="http://<?= $configuration['baseHost'] ?>/redactor" style="font-size: 20px">Перейти к рисованию фигур</a>
                </div>
                <div class="col"></div>
            </div>
            <?php
        } else {
        ?>
        <div class="shadow mt-3 mb-4 bg-white rounded border border-primary p-2">
            <div class="container">
                <div class="container">
                    <div class="row border-bottom border-dark mb-3">
                        <div class="col-6 text-center text-muted pr-5">
                            Image
                        </div>
                        <div class="col-3 pl-4 text-center text-muted">
                            Name User
                        </div>
                        <div class="col-3 pl-4 text-center text-muted">
                            Date
                        </div>
                    </div>
                </div>
                <?php
                $dataCount = count($data['image']);
                for ($i = 0; $i < $dataCount; $i++) {
                    ?>
                    <div class="row mt-4">
                        <div class="col-6">
                            <img src="<?= $data['image'][$i]->getPath(); ?>" height="300" alt="image">
                        </div>
                        <div class="col-3 text-center align-self-center name_user"><?= $_SESSION['login'] ?></div>
                        <div class="col-3 text-center align-self-center date"><?= $data['image'][$i]->getCreateAt(); ?></div>
                    </div>
                    <?php
                }
                ?>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php
    require_once 'template/footer.php';
    ?>
</div>