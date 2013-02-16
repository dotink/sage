<?php foreach ($methods as $item) { ?>
<?php if ($this->getLink($item->getReflection()->getPrettyName())) { ?>
<?= sprintf('[`%s`](%s) ',
	$this->reduce($item->getReflection()->getPrettyName(), $document->getContext()),
	$this->getLink($item->getReflection()->getPrettyName())
) ?>
<?php } else { ?>
<?= '`' .  $item->getReflection()->getPrettyName() . '` ' ?>
<?php } ?>
<?php } ?>

