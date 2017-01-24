<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['record', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        The Expenses For <?= $monthName ?>
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

        </tr>
        </thead>
        <tbody><?php $index = 0; ?>
        <?php $v33006116594899310531iterator = $expenditures; $v33006116594899310531incr = 0; $v33006116594899310531loop = new stdClass(); $v33006116594899310531loop->self = &$v33006116594899310531loop; $v33006116594899310531loop->length = count($v33006116594899310531iterator); $v33006116594899310531loop->index = 1; $v33006116594899310531loop->index0 = 1; $v33006116594899310531loop->revindex = $v33006116594899310531loop->length; $v33006116594899310531loop->revindex0 = $v33006116594899310531loop->length - 1; ?><?php foreach ($v33006116594899310531iterator as $name => $expense) { ?><?php $v33006116594899310531loop->first = ($v33006116594899310531incr == 0); $v33006116594899310531loop->index = $v33006116594899310531incr + 1; $v33006116594899310531loop->index0 = $v33006116594899310531incr; $v33006116594899310531loop->revindex = $v33006116594899310531loop->length - $v33006116594899310531incr; $v33006116594899310531loop->revindex0 = $v33006116594899310531loop->length - ($v33006116594899310531incr + 1); $v33006116594899310531loop->last = ($v33006116594899310531incr == ($v33006116594899310531loop->length - 1)); ?><?php $index = $index + 1; ?>

        <tr>
            <?php if ($v33006116594899310531loop->last) { ?>
            <td></td>
            <td><?= $name ?></td>
            <td><?= $expense['total'] ?></td>
            <?php } else { ?>
            <td><?= $index ?></td>
            <td><?= $this->tag->linkTo(['expenditure/monthexpense/' . $name . -$expense['expense_id'] . -$expense['monthId'], $name]) ?></td>
            <td><?= $expense['total'] ?></td>
            <?php } ?>
        </tr>
        <?php $v33006116594899310531incr++; } ?>



        </tbody>
    </table>
</div>

