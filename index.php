<?php
session_start();

if (!isset($_SESSION['todos'])) {
    $_SESSION['todos'] = [];
}

if (isset($_POST['tambah'])) {
    $tugas = trim($_POST['tugas']);

    if ($tugas !== '') {
        $_SESSION['todos'][] = $tugas;
    }
}

if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    unset($_SESSION['todos'][$id]);
    $_SESSION['todos'] = array_values($_SESSION['todos']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
   <head>
    <meta charset="UTF-8">
    <title>Todo List Saya</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f0ff;
            padding: 40px;
        }

        .container {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 12px #ccc;
        }

        h1 {
            color: #6633cc;
            text-align: center;
        }

        input {
            padding: 12px;
            width: 65%;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            padding: 12px;
            background: #6633cc;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        li {
            padding: 12px;
            margin-top: 10px;
            background: #f3f0ff;
            border-radius: 8px;
        }

        a {
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
</head>
<body>
<div class="container">
</div>
<h1>Todo List Saya</h1>

<form method="POST">
    <input type="text" name="tugas"
           placeholder="Masukkan tugas...">
    <button type="submit" name="tambah">Tambah</button>
</form>

<h3>Daftar Tugas:</h3>

<ul>
<?php foreach ($_SESSION['todos'] as $id => $todo): ?>
    <li>
        <?= htmlspecialchars($todo) ?>
        <a href="?hapus=<?= $id ?>">Hapus</a>
    </li>
<?php endforeach; ?>
</ul>

</body>
</html>