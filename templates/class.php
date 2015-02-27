<?php include 'header.php'; ?>
<?php if ($parent = $document->getReflection()->getParentClass()) { ?>
<?= PHP_EOL ?><?php include 'extends.php'; ?><?= PHP_EOL ?>
<?php } ?>

<?php include 'details.php'; ?>

<?php if (count($entity_properties = $document->query('property'))) { ?>
## Properties
<?php if (count($declared_properties = $entity_properties->query('!external'))) { ?>
<?php if (count($properties = $declared_properties->query('static'))) { ?>
### Static Properties
<?php include 'properties.php'; ?>

<?php } // END STATIC ?>

<?php if (count($properties = $declared_properties->query('instance'))) { ?>
### Instance Properties
<?php include 'properties.php'; ?>

<?php } // END INSTANCE ?>
<?php } // END DECLARED ?>

<?php if (count($properties = $entity_properties->query('external'))) { ?>
### Inherited Properties

<?php include 'properties_external.php'; ?>

<?php } // END EXTERNAL ?>
<?php } // END PROPERTIES ?>

<?php if (count($entity_methods = $document->query('method'))) { ?>
## Methods
<?php if (count($declared_methods = $entity_methods->query('!external'))) { ?>
<?php if (count($methods = $declared_methods->query('static'))) { ?>
### Static Methods
<?php include 'methods.php'; ?>

<?php } // END STATIC ?>

<?php if (count($methods = $declared_methods->query('instance'))) { ?>
### Instance Methods
<?php include 'methods.php'; ?>

<?php } // END INSTANCE ?>
<?php } // END DECLARED ?>

<?php if (count($methods = $entity_methods->query('external'))) { ?>
### Inherited Methods

<?php include 'methods_external.php'; ?>

<?php } // END EXTERNAL ?>
<?php } // END PROPERTIES ?>
