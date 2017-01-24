<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['expenditure/week', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Daily Expenditure on <?= $expense_name ?>
    </h1>
</div>

<?= $this->getContent() ?>


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Day</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody><?php $index = 0; ?><?php $amount = 0; ?>
        <?php foreach ($records as $name => $record) { ?><?php $index = $index + 1; ?><?php $amount = $amount + $record['amount']; ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $record['day'] ?></td>
            <td><?= $record['amount'] ?></td>
        </tr>
        <?php } ?>
        <tr><td></td>
            <td> Total </td>
            <td><?= $amount ?></td>
            <td></td></tr>



        </tbody>
    </table>
</div>

