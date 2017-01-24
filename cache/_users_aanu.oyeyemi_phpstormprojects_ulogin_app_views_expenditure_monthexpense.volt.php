<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['expenditure/month', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Weekly Expenditure on <?= $expense_name ?>
    </h1>
</div>

<?= $this->getContent() ?>


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Week</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody><?php $index = 0; ?><?php $amount = 0; ?>
        <?php foreach ($weeks as $name => $week) { ?><?php $index = $index + 1; ?><?php $amount = $amount + $week['total']; ?>
        <tr>
            <td><?= $index ?></td>
            <td> <?= $this->tag->linkTo(['expenditure/weekrecord/' . $expense_name . -$week['weekId'], 'Week ' . $index]) ?> </td>
            <td><?= $week['total'] ?></td>
        </tr>
        <?php } ?>
        <tr><td></td>
            <td> Total </td>
            <td><?= $amount ?></td>
            <td></td></tr>



        </tbody>
    </table>
</div>

