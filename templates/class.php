# `<?= $document->getReflection()->getShortName() ?>`
<?= $document->getDescription() ? '##' . $document->getDescription() : NULL ?>


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
<?php if ($document->getDetails()) { ?>

### Details

<?= $document->getDetails() ?>

<?php } ?>
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


