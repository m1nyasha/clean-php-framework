<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
$user = $auth->user();
?>

<?php if ($auth->check()) { ?>
    <header>
        <p>User: <?php echo $user->email() ?></p>
        <form action="/logout" method="post">
            <button>Logout</button>
        </form>
    </header>
<?php } ?>
