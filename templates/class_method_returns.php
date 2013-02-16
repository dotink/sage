###### Returns

<?php while ($return = $method->getInfo('return')) { ?>
<?php if ($return['type']) { ?>
<?= $return['type'] ?>

:    <?= $return['note'] ?>

<?php } else { ?>
void
:    Provides no return value.
<?php } ?>
<?php } ?>
