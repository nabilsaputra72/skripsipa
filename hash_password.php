<?php
$password_plaintext = 'admin123'; // Ganti dengan password yang ingin Anda gunakan
$password_hash = password_hash($password_plaintext, PASSWORD_DEFAULT);

echo $password_hash;