<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['user', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit user
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['user/edit', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<!--<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['name', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldName']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['username', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldUsername']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['email', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEmail']) ?>
    </div>
</div>


<?= $this->tag->hiddenField(['id']) ?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Send', 'class' => 'btn btn-default']) ?>
    </div>
</div>
-->
<div align="center" class="well">

    <?= $this->tag->form(['class' => 'form-search']) ?>

    <div align="left">
        <h2>
            Edit Form
        </h2>
    </div>

    <div align="center" class="remember">

        <?= $form->render('id') ?>
        <table class="signup" >


            <tr>
                <td class="right"> <?= $form->label('name') ?></td>
                <td>
                     <?= $form->render('name') ?>
                    <?= $form->message('name') ?>
                </td>
            </tr>

            <tr>
                <td class="right"> <?= $form->label('username') ?></td>
                <td>
                    <?= $form->render('username') ?>
                    <?= $form->message('username') ?>
                </td>
            </tr>

            <tr>
                <td class="right"> <?= $form->label('email') ?></td>
                <td>
                    <?= $form->render('email') ?>
                    <?= $form->message('email') ?>
                </td>
            </tr>

            <tr>
                <td class="right"></td>
                <td>
                    <?= $form->render('Save') ?>
                </td>
            </tr>

        </table>


    </div>


</div>

</form>
