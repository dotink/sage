<?php foreach ($methods as $item) { ?>
<?php if ($this->getLink($item->getReflection()->getPrettyName())) { ?>
<?= '[`' . $this->chopNamespace($item->getReflection()->getPrettyName()) . '`]' ?>
<?= '('  . $this->getLink($item->getReflection()->getPrettyName()) . ') ' ?>
<?php } else { ?>
<?= '`' .  $item->getReflection()->getPrettyName() . '` ' ?>
<?php } ?>
<?php } ?>

