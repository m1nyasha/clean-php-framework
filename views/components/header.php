<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
$user = $auth->user();
?>

<?php if ($auth->check()) { ?>
    <header>
        <p>User: <?php echo $user->email() ?></p>
        <button>Logout</button>
    </header>
<?php } ?>
