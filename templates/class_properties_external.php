<?php foreach ($properties as $item) { ?>
<?php if ($this->getLink($item->getReflection()->getPrettyName())) { ?>
<?= '`[' .  $item->getReflection()->getPrettyName() . '](' . $this->getLink($item->getReflection()->getPrettyName()) . ')` ' ?>
<?php } else { ?>
<?= '`' .  $item->getReflection()->getPrettyName() . '` ' ?>
<?php } ?>
<?php } ?>
