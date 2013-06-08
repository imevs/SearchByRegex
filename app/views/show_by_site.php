<h2>Results for <?= $url ?></h2>
<ul>
    <? foreach ($items as $item) :?>
        <li>
            <?= $item?>
        </li>
    <? endforeach; ?>
</ul>