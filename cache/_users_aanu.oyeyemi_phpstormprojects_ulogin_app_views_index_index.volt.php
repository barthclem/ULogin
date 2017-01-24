<?= $this->getContent() ?>

<header class="jumbotron subhead" id="overview">
    <div class="hero-unit">
        <h1>Welcome!</h1>
        <p class="lead">Finance Tracker Application</p>

        <div align="right">
            <?= $this->tag->linkTo(['session/signup', '<i class="icon-ok icon-white"></i> Create an Account', 'class' => 'btn btn-primary btn-large']) ?>
        </div>
    </div>
</header>

