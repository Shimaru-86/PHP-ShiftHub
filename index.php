<?php
session_start();
require_once __DIR__ . '/src/routes/Routes.php';
Route::dispatch();
?>