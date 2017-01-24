<div class="page-header">
    <h1>
        List Of Records in <?= $weekName ?>
    </h1>
</div>
<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['week', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>


<?= $this->getContent() ?>


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Total Amount</th>
            <th>Day</th>
            <th>Month</th>

            <th></th>

        </tr>
        </thead>
        <tbody>
        <?php if (isset($records)) { ?>
        <?php $index = 0; ?>
        <?php foreach ($records as $record) { ?>
        <?php $index = $index + 1; ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $this->tag->linkTo(['record/view/' . $record->id, $record->name]) ?></td>
            <td><?= $record->totalAmount ?></td>
            <td><?= $record->day ?></td>
            <td><?= $record->month ?></td>

            <td><?= $this->tag->linkTo(['record/delete/' . $record->id, 'Delete']) ?></td>
        </tr>

        <?php } ?>
        <?php } ?>
        <tr></tr>
        <tr>
        <td></td><td>Total</td><td><?= $total ?><td></td><td></td><td></td></tr>

        </tbody>
    </table>
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
                <li><?= $this->tag->linkTo(['week/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['week/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['week/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['week/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
