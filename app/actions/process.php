<?php
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'searchType', FILTER_SANITIZE_STRING);
$text_value = filter_input(INPUT_POST, 'text_value', FILTER_SANITIZE_STRING);

$parser = new Parser();
$results = $parser->parse($url, $type, $text_value);

if ($url && !$results['errors']) {
    DB::getInstance()->processResults($url, $results['results'], $type);
}
echo render('results', $results);