<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php $view->component('start') ?>
<h1>Register</h1>
<form action="/register" method="post">
    <?php if ($session->has('errors')) { ?>
        <ul>
            <?php foreach ($session->getFlash('errors') as $error) { ?>
                <li style="color: red;"><?php echo $error ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <div>
        <input type="email" name="email" placeholder="Email">
    </div>
    <div>
        <input type="password" name="password" placeholder="Password">
    </div>
    <button>Register</button>
</form>
<?php $view->component('end') ?>
