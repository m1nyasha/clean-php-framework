<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php $view->component('start') ?>
<h1>Login</h1>
<form action="/login" method="post">
    <?php if ($session->has('error')) { ?>
        <span style="color: red;">
            <?php echo $session->getFlash('error') ?>
        </span>
    <?php } ?>
    <div>
        <input type="email" name="email" placeholder="Email">
    </div>
    <div>
        <input type="password" name="password" placeholder="Password">
    </div>
    <button>Login</button>
</form>
<?php $view->component('end') ?>
