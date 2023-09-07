<?php
/**
 * @var \App\Kernel\View\View $view
 */
?>

<?php $view->component('start') ?>
<h1>Create movie</h1>

<form action="">
    <div>
        <label for="">
            Name
            <input type="text">
        </label>
    </div>
    <div>
        <button>Create</button>
    </div>
</form>
<?php $view->component('end') ?>
