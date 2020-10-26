<?php
// Inicia  sessions
session_start();
// Destrueix qualsevol sessió de l'usuari 
session_destroy();
// Redirecciona a login.php
header('Location: login.php');
