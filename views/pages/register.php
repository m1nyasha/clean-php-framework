<?php
/**
 * @var \App\Kernel\View\View $view
 */
?>

<?php $view->component('start') ?>
<h1>Register</h1>
<form action="/register" method="post">
    <div>
        <input type="email" name="email" placeholder="Email">
    </div>
    <div>
        <input type="password" name="password" placeholder="Password">
    </div>
    <button>Register</button>
</form>
<?php $view->component('end') ?>
