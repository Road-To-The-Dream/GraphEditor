<div class="header" style="width: 100%">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark header">
        <div class="container">
            <a href="http://<?= $this->configuration['baseHost'] ?>/redactor" class="nav-link">
                <img class="mb-3 mr-3" src="/image/logo.png" alt="image">
                <span class="main-name">Графический редактор</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                    aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="mt-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="http://<?= $this->configuration['baseHost'] ?>/gallery" class="nav-link">
                            <img class="mb-2" src="/image/gallery.png" alt="image">
                            <span>Галерея</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link mt-1">Hello, <?= $_SESSION['login'] ?? '' ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>