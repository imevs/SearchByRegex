<ul>
    <? foreach ($items as $item) :?>
        <li>
            <a href="?action=show_by_site&id=<?= $item['id']?>">
                Url: <?= $item['url']?><br>
                Type: <?= $item['search_types']?><br>
                Results count: <?= $item['count']?>
            </a>
        </li>
    <? endforeach; ?>
</ul>