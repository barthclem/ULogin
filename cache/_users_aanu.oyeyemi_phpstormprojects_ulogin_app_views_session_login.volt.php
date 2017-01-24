<?= $this->getContent() ?>

<div align="center" class="well">

    <?= $this->tag->form(['class' => 'form-search']) ?>

    <div align="left">
        <h2>
            Login Form
        </h2>
    </div>

    <div align="center" class="remember">
    <?= $form->render('username') ?>
    <?= $form->render('password') ?>
    <?= $form->render('go') ?>
    </div>
    </form>

    <div class="forgot">
        <?= $this->tag->linkTo(['session/signup', 'Forgot my password']) ?>
    </div>
</div>