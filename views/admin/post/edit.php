<?php
use App\{Attachment\PostAttachment,
    Auth,
    Connection,
    HTML\Form,
    Table\CategoryTable,
    Table\FileTable,
    Table\ImageTable,
    Table\PostTable,
    Validators\PostValidator};

Auth::check();
$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$post = $postTable->find($params['id']);

// Files
$FileTable = new FileTable($pdo);
$files = $FileTable->list();
$FileTable->hydratePosts([$post]);
// Images
$imageTable = new ImageTable($pdo);
$images = $imageTable->list();
$imageTable->hydratePosts([$post]);
// Categories
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$categoryTable->hydratePosts([$post]);

$errors = [];
if (!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    $v = new PostValidator($data, $postTable, $post->getID(), $categories, $images, $files);
    (new App\ObjectHelper)->hydrate($post, $data, ['name', 'content', 'slug', 'created_at', 'image']);

    if ($v->validate()) {
        $pdo->beginTransaction();
        (new PostAttachment())->upload($post);
        $postTable->updatePC($post);
        $postTable->attachAll($pdo, $post); // Attach categories | Images | Files
        $categoryTable->hydratePosts([$post]);
        $pdo->commit();
        $success = true;
        header('Location: ' . $router->url('admin_posts') . '?modified=1');
    } else {
        $errors = $v->errors();
    }

}

$form = new Form($post, $errors);
?>
<h2 class="mt4 medium-title">
    <svg class="svg-big">
        <use xlink:href="/img/svg/sprite.svg#edit"></use>
    </svg>
    Editer l'article "<?= e($post->getName()) ?>"
</h2>
<hr>
<?php if (isset($_GET['delete_thumbnail'])): ?>
    <p class="alert alert-success">L'image à la une à bien été supprimée</p>
<?php endif ?>
<?php require '_form.php' ?>

<?php ob_start() ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
<?php $beforeBodyContent = ob_get_clean();
 ob_start() ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
<script src="/js/datePicker.js"></script>
<?php $afterBodyContent = ob_get_clean() ?>

