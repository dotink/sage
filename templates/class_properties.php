<?php foreach ($properties as $property) { ?>
#### $<?= $property->getReflection()->getName() ?>

<?php if ($property->getDescription()) { ?>
<?= $property->getDescription() ?>


<?php } ?>
<?php if ($property->getDetails()) { ?>
##### Details

<?= $property->getDetails() ?>


<?php } ?>
<?php } ?>
