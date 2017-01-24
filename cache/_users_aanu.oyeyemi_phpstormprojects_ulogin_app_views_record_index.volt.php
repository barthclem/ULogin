<div class="page-header">
    <h1>
        Records
    </h1>

</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['record/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Total Amount</th>
            <th>Day</th>
            <th>Week</th>
            <th>Month</th>

            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php $index = 0; ?>
        <?php foreach ($page->items as $record) { ?>
        <?php $index = $index + 1; ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $this->tag->linkTo(['record/view/' . $record->id, $record->name]) ?></td>
            <td><?= $record->totalAmount ?></td>
            <td><?= $record->day ?></td>
            <td><?= $record->weekId ?></td>
            <td><?= $record->month ?></td>

            <td><?= $this->tag->linkTo(['record/edit/' . $record->id, 'Edit']) ?></td>
            <td><?= $this->tag->linkTo(['record/delete/' . $record->id, 'Delete']) ?></td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="nav pull-right">

        <?= $this->tag->linkTo(['record/new', 'Fill record']) ?>

    </div>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?= $page->current . '/' . $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pager">
                <li><?= $this->tag->linkTo(['record/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['record/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['record/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['record/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>

</form>
