# <?= $document->getReflection()->getShortName() ?>

<?= $document->getDescription() ? '## ' . $document->getDescription() : NULL ?>


<?php if ($document->hasInfo('copyright')) { ?>
_<?= $document->getInfo('copyright') ?>_.
<?php } ?>
<?php if ($license = $document->getInfo('license')) { ?>
<?php if (preg_match('#^http([s])?://(.*)#', $license)) { ?>
[<?= $license ?>](<?= $license ?>)
<?php } else { ?>
_<?= $license ?>_
<?php } ?>
<?php } ?>
