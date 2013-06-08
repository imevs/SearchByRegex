<?php
include_once '../bootstrap.php';
$pageView = PageView::getInstance();
$pageView->initLayout();
echo $pageView->renderPage();