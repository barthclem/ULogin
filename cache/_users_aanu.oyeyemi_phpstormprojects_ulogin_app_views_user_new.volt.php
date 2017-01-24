<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['user', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create user
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['user/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
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

<div class="form-group">
    <label for="fieldPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['password', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldPassword']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Save', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
