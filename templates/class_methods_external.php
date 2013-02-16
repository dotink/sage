<?php foreach ($methods as $item) { ?>
<?php if ($this->getLink($item->getReflection()->getPrettyName())) { ?>
<?= '[`' .  $item->getReflection()->getPrettyName() . '`](' . $this->getLink($item->getReflection()->getPrettyName(), TRUE) . ') ' ?>
<?php } else { ?>
<?= '`' .  $item->getReflection()->getPrettyName() . '` ' ?>
<?php } ?>
<?php } ?>

