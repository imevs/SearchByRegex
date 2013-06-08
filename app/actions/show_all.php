<?php
$items = DB::getInstance()->getAllSearchResults();

echo render('show_all', array(
    'items' => $items
));