<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php $view->component('start') ?>
<h1>Create movie</h1>

<form action="/admin/movies/store" method="post">
    <?php if ($session->has('errors')) { ?>
        <ul>
            <?php foreach ($session->getFlash('errors') as $error) { ?>
                <li style="color: red;"><?php echo $error ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <div>
        <label for="name">
            Name
            <input type="text" id="name" name="name">
        </label>
    </div>
    <div>
        <button>Create</button>
    </div>
</form>
<?php $view->component('end') ?>
