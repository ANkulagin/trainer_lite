<?php
/*
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>
<?php $view->component('start')?>
<h1>add trainer page</h1>
<form action="/admin/trainer/add" method="post">
    <p>Name</p>
    <div>
        <input type="text" name="name">
    </div>
    <?php if ($session->has('errors')): ?>
        <ul style="color: red;">
            <?php foreach ($session->getFlash('errors') as $field => $errors): ?>
                <li><?= ucfirst($field) ?>: <?= implode(', ', $errors) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div>
        <button>add</button>
    </div>
</form>
<?php $view->component('end')?>

