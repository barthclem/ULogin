<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['record', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        The Expenses For <?= $weekId ?>
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
        <?php $v87136937779886881151iterator = $expenditures; $v87136937779886881151incr = 0; $v87136937779886881151loop = new stdClass(); $v87136937779886881151loop->self = &$v87136937779886881151loop; $v87136937779886881151loop->length = count($v87136937779886881151iterator); $v87136937779886881151loop->index = 1; $v87136937779886881151loop->index0 = 1; $v87136937779886881151loop->revindex = $v87136937779886881151loop->length; $v87136937779886881151loop->revindex0 = $v87136937779886881151loop->length - 1; ?><?php foreach ($v87136937779886881151iterator as $name => $expense) { ?><?php $v87136937779886881151loop->first = ($v87136937779886881151incr == 0); $v87136937779886881151loop->index = $v87136937779886881151incr + 1; $v87136937779886881151loop->index0 = $v87136937779886881151incr; $v87136937779886881151loop->revindex = $v87136937779886881151loop->length - $v87136937779886881151incr; $v87136937779886881151loop->revindex0 = $v87136937779886881151loop->length - ($v87136937779886881151incr + 1); $v87136937779886881151loop->last = ($v87136937779886881151incr == ($v87136937779886881151loop->length - 1)); ?><?php $index = $index + 1; ?>

        <tr>
            <?php if ($v87136937779886881151loop->last) { ?>
            <td></td>
            <td><?= $name ?></td>
            <td><?= $expense['total'] ?></td>
            <?php } else { ?>
            <td><?= $index ?></td>
            <td><?= $this->tag->linkTo(['expenditure/weekrecord/' . $name . -$expense['weekId'], $name]) ?></td>
            <td><?= $expense['total'] ?></td>
            <?php } ?>
        </tr>
        <?php $v87136937779886881151incr++; } ?>



        </tbody>
    </table>
</div>

