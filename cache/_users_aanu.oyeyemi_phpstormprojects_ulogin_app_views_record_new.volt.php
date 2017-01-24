<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['record', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        <?= $recordName ?>
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['record/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Expenses</th>
            <th>Amount</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $index = 0; ?>
        <?php foreach ($expenditures as $page) { ?>
        <?php $index = $index + 1; ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $page->type ?></td>
            <td><?= $page->totalAmount ?></td>


            <td><?= $this->tag->linkTo(['record/expendituredel/' . $page->id, 'Delete']) ?></td>
        </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<div class="row">
<?= $form->render('expenses') ?>
<?= $form->render('amount') ?>
<?= $form->render('Add New Entry') ?>
</div>
<div class="row">
    <?= $this->tag->linkTo(['expenses/', ' Add new Category']) ?>
</div>
</form>
