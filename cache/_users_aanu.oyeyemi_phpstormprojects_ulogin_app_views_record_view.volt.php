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
        <tbody><?php $index = 0; ?>
        <?php foreach ($expenditures as $page) { ?><?php $index = $index + 1; ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $page->type ?></td>
            <td><?= $page->totalAmount ?></td>


            <td><?= $this->tag->linkTo(['record/expendituredel/' . $page->id, 'Delete']) ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td></td><td>Total</td><td><?= $total ?></td><td></td></tr>

        </tbody>
    </table>
</div>

