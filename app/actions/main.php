<?php
echo render('form');

if ($_POST) {
    require_once 'process.php';
}
