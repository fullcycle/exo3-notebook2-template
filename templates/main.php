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
    <a class="btn" href="/?action=update">
      <div>
        <span class="material-symbols-outlined"><!--- update --->
          edit
        </span>
      </div>
      </a>
      <a class="btn" href="/?action=delete">
        <div class="del">
          <span class="material-symbols-outlined"><!--- delete --->
            delete
          </span>
        </div>
      </a>
  </section>

</body>

</html>