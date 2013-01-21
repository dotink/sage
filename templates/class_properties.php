<?php foreach ($properties as $property) { ?>
#### <span style="color:#6a6e3d;">$<?= $property->getReflection()->getName() ?></span>

<?php if ($property->getDescription()) { ?>
<?= $property->getDescription() ?>


<?php } ?>
<?php if ($property->getDetails()) { ?>
##### Details

<?= $property->getDetails() ?>


<?php } ?>
<?php } ?>
