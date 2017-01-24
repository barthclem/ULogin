<div class="page-header">
    <h1>
        List Of Weeks
    </h1>
</div>

<?= $this->getContent() ?>


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Total</th>
            <th>Month</th>
            <th>Year</th>


            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?><?php $index = 0; ?>
        <?php foreach ($page->items as $week) { ?>
        <?php $index = $index + 1; ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $this->tag->linkTo(['week/view/' . $week->id, $week->name]) ?></td>
            <td> <?= $week->totalAmount ?> </td>
            <td><?= $week->month ?></td>
            <td><?= $week->year ?></td>


            <td><?= $this->tag->linkTo(['week/edit/' . $week->id, 'Edit']) ?></td>
            <td><?= $this->tag->linkTo(['week/delete/' . $week->id, 'Delete']) ?></td>
        </tr>
        <?php } ?>
        <?php } ?>
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
