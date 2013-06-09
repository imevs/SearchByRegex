<?= render('errors', array('errors' => $errors)); ?>

<? if (isset($results)): ?>
    <h2>Searched results (<?= count($results)?>)</h2>
    <ol>
        <?foreach ($results as $result): ?>
            <li><?= $result ?></li>
        <?endforeach;?>
    </ol>
<? endif; ?>