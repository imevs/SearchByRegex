<?= render('errors', array('errors' => $errors)); ?>

<? if (isset($results)): ?>
    <h2>Searched results (<?= count($results)?>)</h2>
    <dl>
        <? $i = 0; ?>
        <?foreach ($results as $result): ?>
            <dt><?= $i++ ?></dt>
            <dd><?= $result ?></dd>
        <?endforeach;?>
    </dl>
<? endif; ?>