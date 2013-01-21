<?php foreach ($methods as $method) { ?>

#### <span style="color:#3e6a6e;"><?= $method->getReflection()->getName() ?>()</span>
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
