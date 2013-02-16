# <?= '`' . $document->getReflection()->getShortName() . '`' ?>

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
<?php if ($parent = $document->getReflection()->getParentClass()) { ?>

### Extends

<?php if ($link = $this->getLink($parent->getName())) { ?>
<?= sprintf('[`\\%s`](%s)', $parent->getName(), $link) ?>
<?php } else { ?>
<?= '`\\' . $parent->getName() . '`' ?>
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
<?php if (count($declared_properties = $class_properties->query('!external'))) { ?>
<?php if (count($properties = $declared_properties->query('static'))) { ?>
### Static Properties
<?php include 'class_properties.php'; ?>

<?php } // END STATIC ?>

<?php if (count($properties = $declared_properties->query('instance'))) { ?>
### Instance Properties
<?php include 'class_properties.php'; ?>

<?php } // END INSTANCE ?>
<?php } // END DECLARED ?>

<?php if (count($properties = $class_properties->query('external'))) { ?>
### Inherited Properties

<?php include 'class_properties_external.php'; ?>

<?php } // END EXTERNAL ?>
<?php } // END PROPERTIES ?>

<?php if (count($class_methods = $document->query('method'))) { ?>
## Methods
<?php if (count($declared_methods = $class_methods->query('!external'))) { ?>
<?php if (count($methods = $declared_methods->query('static'))) { ?>
### Static Methods
<?php include 'class_methods.php'; ?>

<?php } // END STATIC ?>

<?php if (count($methods = $declared_methods->query('instance'))) { ?>
### Instance Methods
<?php include 'class_methods.php'; ?>

<?php } // END INSTANCE ?>
<?php } // END DECLARED ?>

<?php if (count($methods = $class_methods->query('external'))) { ?>
### Inherited Methods

<?php include 'class_methods_external.php'; ?>

<?php } // END EXTERNAL ?>
<?php } // END PROPERTIES ?>


