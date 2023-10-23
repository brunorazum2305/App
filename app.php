<?php 


if (empty($_FILES['file'])) {
    die('Niste odabrali datoteku!');
}

$file = $_FILES['file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    die('Došlo je do greške prilikom prijenosa datoteke!');
}

if ($file['type'] !== 'text/plain') {
    die('Datoteka nije txt!');
}

$uploadDirectory = __DIR__ . '/uploads/';
$uploadFileName = $uploadDirectory . basename($file['name']);

if (file_exists($uploadFileName)) {
    die('Datoteka već postoji!');
}

if (!move_uploaded_file($file['tmp_name'], $uploadFileName)) {
    die('Došlo je do greške prilikom spremanja datoteke!');
}

echo 'Datoteka je uspješno spremljena!';