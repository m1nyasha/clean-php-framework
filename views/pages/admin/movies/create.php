<?php
/**
 * @var \App\Kernel\View\View $view
 */
?>

<?php $view->component('start') ?>
<h1>Create movie</h1>

<form action="/admin/movies/store" method="post">
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
