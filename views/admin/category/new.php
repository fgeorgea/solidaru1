<?php

use App\{Auth, Connection, HTML\Form, Model\Category, Table\CategoryTable, Validators\CategoryValidator};

Auth::check();
$success = false;
$errors = [];
$item = new Category();
if (!empty($_POST)) {
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    $v = new CategoryValidator($_POST, $table);
    (new App\ObjectHelper)->hydrate($item, $_POST, ['name', 'slug', 'content']);

    if ($v->validate()) {
        $table->create([
            'name' => $item->getName(),
            'slug' => $item->getSlug(),
            "content" => $item->getContent()
        ]);
        header('Location: ' . $router->url('admin_categories') . '?created=1');
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($item, $errors);
?>
<h2 class="container mt4 medium-title">Créer une catégorie</h2>
<hr>

<?php require('_form.php'); ?>