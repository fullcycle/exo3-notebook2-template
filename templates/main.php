<?php

$display = $_GET['display'] ?? null;
$update = $_GET['update'] ?? null;

if (isset($_GET['id'])) {
  $my_note = getNote($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

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
          <a href="/?action=delete&id=<?= $note['id'] ?>" class="btn <?= ($display === 'delete') ? 'display' : 'display-none' ?>">
            <div class="del">
              <span class="material-symbols-outlined"><!--- delete --->
                delete
              </span>
            </div>
          </a>
          <a href="/?update=true&id=<?= $note['id'] ?>" class="btn <?= ($display === 'update') ? 'display' : 'display-none' ?>">
            <div class="del">
              <span class="material-symbols-outlined"><!--- update --->
                edit
              </span>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </main>

  <section>
    <a class="btn" href="/?action=create">
      <div>
        <span class="material-symbols-outlined"><!--- create --->
          add
        </span>
      </div>
    </a>
    <a class="btn" href="<?= ($display === 'update') ? '/' : '/?display=update' ?>">
      <div>
        <span class="material-symbols-outlined"><!--- update --->
          edit
        </span>
      </div>
    </a>
    <a class="btn" href="<?= ($display === 'delete') ? '/' : '/?display=delete' ?>">
      <div class="del">
        <span class="material-symbols-outlined"><!--- delete --->
          delete
        </span>
      </div>
    </a>
    <a class="btn" href="/">
      <div>
        <span class="material-symbols-outlined"><!--- cancel --->
          cancel
        </span>
      </div>
    </a>
  </section>

  <a href="/" class="modal-background <?= ($update === 'true') ? 'display' : 'display-none' ?>"></a>
  <div class="modal <?= ($update === 'true') ? 'display' : 'display-none' ?>">

    <form action="/?action=update&id=<?= $_GET['id'] ?>" method="post">
      <input type="text" name="title" value="<?= $my_note[0]['title'] ?>">
      <input type="text" name="note" value="<?= getNote($_GET['id'])[0]['note'] ?>">
      <button type="submit">Update</button>
    </form>
  </div>

</body>

</html>