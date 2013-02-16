<?php if ($document->getDetails()) { ?>
### Details

<?= $document->getDetails() ?>


<?php } ?>
<?php if ($namespace = $document->getReflection()->getNamespaceName()) { ?>
<?php include 'namespace.php'; ?><?= PHP_EOL ?>
<?php } ?>
<?php if (count($aliases = $document->getContext()->getNamespaceAliases())) { ?>
<?= PHP_EOL ?><?php include 'imports.php'; ?>
<?php } ?>
<?php if ($document->hasInfo('author')) { ?>
<?= PHP_EOL ?><?php include 'authors.php'; ?>
<?php } ?>
