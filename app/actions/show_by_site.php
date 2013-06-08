<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$result = DB::getInstance()->getSearchResultsByID($id);
echo render('show_by_site', array(
    'url' => $result['url'],
    'items' => $result['items']
));