<?php foreach ($methods as $method) { ?>

#### <?= $method->getReflection()->getName() ?>()
	<?php if ($method->getDescription()) { ?>

<?= $method->getDescription() ?>

	<?php } ?>
	<?php if ($method->getDetails()) { ?>

##### Details

<?= $method->getDetails() ?>

	<?php } ?>
	<?php if ($method->hasInfo('param')) { ?>

###### Parameters

<?php include 'class_method_parameters.php'; ?>

	<?php } ?>
<?php } ?>
