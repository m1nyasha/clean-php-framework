<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
?>

<?php if ($auth->check()) { ?>
    <header>
        <p>User: <?php echo $auth->user()['email'] ?></p>
        <button>Logout</button>
    </header>
<?php } ?>
