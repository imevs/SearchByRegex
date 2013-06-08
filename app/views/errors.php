<? if ($errors): ?>
    <? foreach ($errors as $error):?>
        <div class="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error!</strong> <?= $error?>
        </div>
    <? endforeach;?>
<? endif; ?>