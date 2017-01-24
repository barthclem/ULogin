<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['record', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit record
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['record/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['name', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldName']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldTotalSpending" class="col-sm-2 control-label">Total Of Spending</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['total_spending', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldTotalSpending']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldDay" class="col-sm-2 control-label">Day</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['day', 'type' => 'date', 'class' => 'form-control', 'id' => 'fieldDay']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUserId" class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['user_id', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldUserId']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldWeekId" class="col-sm-2 control-label">Week</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['week_id', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldWeekId']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldMonthId" class="col-sm-2 control-label">Month</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['month_id', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldMonthId']) ?>
    </div>
</div>


<?= $this->tag->hiddenField(['id']) ?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Send', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
