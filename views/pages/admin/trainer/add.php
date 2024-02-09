<?php
/*
 * @var \App\Kernel\View\View $view
 */
?>
<?php $view->component('start')?>
<h1>add trainer page</h1>
<form action="/admin/trainer/add" method="post">
    <p>Name</p>
    <div>
        <input type="text" name="name">
    </div>
    <div>
        <button>add</button>
    </div>
</form>
<?php $view->component('end')?>

