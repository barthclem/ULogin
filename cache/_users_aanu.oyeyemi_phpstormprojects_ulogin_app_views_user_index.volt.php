<div class="page-header">
    <h1>List Of Registered Users</h1>
</div>

<?= $this->getContent() ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>

            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $user) { ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->email ?></td>


            <td><?= $this->tag->linkTo(['user/edit/' . $user->id, 'Edit']) ?></td>
            <td><?= $this->tag->linkTo(['user/delete/' . $user->id, 'Delete']) ?></td>
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
                <li><?= $this->tag->linkTo(['user/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['user/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['user/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['user/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
