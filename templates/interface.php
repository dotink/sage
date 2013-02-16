<?php include 'header.php'; ?>
<?php if ($parent = $document->getReflection()->getParentClass()) { ?>
<?= PHP_EOL ?><?php include 'extends.php'; ?><?= PHP_EOL ?>
<?php } ?>

<?php include 'details.php'; ?>
