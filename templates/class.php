# `<?= $document->getReflection()->getShortName() ?>` (<?= $document->getDescription() ?: '_No Description_' ?>)


<?php if ($document->hasInfo('copyright')) { ?>
_<?= $document->getInfo('copyright') ?>_

<? } ?>
## Details

<?= $document->getDetails() ?>


<?php if ($document->hasInfo('author')) { ?>
<?php include 'authors.php'; ?>
<?php } ?>

<?php if (count($class_properties = $document->query('property'))) { ?>
## Properties

<?php if (count($properties = $class_properties->query('static'))) { ?>
### Static Properties

<?php include 'class_properties.php'; ?>
<?php } ?>

<?php if (count($properties = $class_properties->query('instance'))) { ?>
### Instance Properties
<?php include 'class_properties.php'; ?>

<?php } ?>
<?php } ?>

<?php if (count($class_methods = $document->query('method'))) { ?>
## Methods

<?php if (count($methods = $class_methods->query('static'))) { ?>
### Static Methods

<?php include 'class_methods.php'; ?>
<?php } ?>

<?php if (count($methods = $class_methods->query('instance'))) { ?>
### Instance Methods

<?php include 'class_methods.php'; ?>
<?php } ?>
<?php } ?>


