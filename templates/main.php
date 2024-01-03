<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $_GET = filter_input_array(INPUT_GET, [
    'page' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'mode' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'id' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
  ]);
}

$id = $_GET['id'] ?? null;
$page = $_GET['page'] ?? null;
$mode = $_GET['mode'] ?? null;

if ($id) $selectedNote = getNote($id);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FontNotes</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="./default.css">
</head>

<body>

  <nav>
    <h1>
      <p>FontNotes</p>
    </h1>
    <!--
    <div>
      <menu>
        <div>
          <span class="material-symbols-outlined">
            person
          </span> 
        </div>
      </menu>
      <p>User</p>
    </div>
    -->
  </nav>

  <main>
    <div>
      <!--- read --->
      <?php foreach ($notes as $note) : ?>
        <div class="notes">
          <h3><?= $note['title'] ?></h3>
          <p><?= $note['note'] ?></p>
          <div class="flex-row">
            <?php if ($mode === 'update') : ?>
              <a class="btn" href="/?page=update&id=<?= $note['id'] ?>">
                <div>
                  <span class="material-symbols-outlined"><!--- update --->
                    edit
                  </span>
                </div>
              </a>
            <?php endif ?>
            <?php if ($mode === 'delete') : ?>
              <a class="btn" href="/?action=delete&id=<?= $note['id'] ?>">
                <div>
                  <span class="material-symbols-outlined"><!--- delete --->
                    delete
                  </span>
                </div>
              </a>
            <?php endif ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </main>

  <section>
    <a class="btn" href="/?page=create">
      <div>
        <span class="material-symbols-outlined"><!--- create --->
          add
        </span>
      </div>
    </a>
    <a class="btn" href="<?= $mode === 'update' ? '/' : '/?mode=update' ?>">
      <div>
        <span class="material-symbols-outlined"><!--- update --->
          edit
        </span>
      </div>
    </a>
    <a class="btn" href="<?= $mode === 'delete' ? '/' : '/?mode=delete' ?>">
      <div class="del">
        <span class="material-symbols-outlined"><!--- delete --->
          delete
        </span>
      </div>
    </a>
  </section>

  <?php if ($page === 'create' || $page === 'update') : ?>

    <a href="<?= $page === 'create' ? '/' : '/?mode=update' ?>" class="overlay"></a>

    <form class="modale" action="<?= $page === 'create' ? '/?action=create' : '/?action=update' ?>" method="post">
      <h2><?= $page === 'create' ? 'Create a note' : 'Update selected note' ?></h2>
      <input type="text" name="title" placeholder="Title" value="<?= $page === 'update' ? $selectedNote[0]['title'] : null ?>" required>
      <textarea type="text" name="note" rows="6" placeholder="Note" required><?= $page === 'update' ? $selectedNote[0]['note'] : null ?></textarea>
      <div>
        <a href="<?= $page === 'create' ? '/' : '/?mode=update' ?>">Cancel</a>
        <button type="submit" name="id" value="<?= $page === 'update' ? $id : null ?>"><?= $page === 'create' ? 'Create' : 'Update' ?></button>
      </div>
    </form>
  <?php endif ?>

</body>

</html>