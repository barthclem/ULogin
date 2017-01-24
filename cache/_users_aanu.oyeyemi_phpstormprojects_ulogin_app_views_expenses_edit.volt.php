<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['expenses', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit expenses
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['expenses/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldTitle" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['title', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldTitle']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUserId" class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['user_id', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldUserId']) ?>
    </div>
</div>


<?= $this->tag->hiddenField(['id']) ?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Send', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
