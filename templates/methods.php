<?php foreach ($methods as $method) { ?>
<hr />

#### <span style="color:#3e6a6e;"><?= $method->getReflection()->getName() ?>()</span>

<?php if ($method->getDescription()) { ?>
<?= $method->getDescription() ?>


<?php } ?>
<?php if ($method->getDetails()) { ?>
##### Details

<?= $method->getDetails() ?>


<?php } ?>
<?php if ($method->hasInfo('param')) { ?>
<?php include 'method_parameters.php'; ?>

<?php } ?>
<?php if ($method->hasInfo('throws')) { ?>
<?php include 'method_throws.php'; ?>

<?php } ?>
<?php if ($method->hasInfo('return')) { ?>
<?php include 'method_returns.php'; ?>

<?php } ?>

<?php if ($method->hasInfo('example')) { ?>
<?php include 'method_examples.php'; ?>

<?php } ?>
<?php } ?>
