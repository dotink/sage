<?php foreach ($properties as $item) { ?>
<?php if ($this->getLink($item->getReflection()->getPrettyName())) { ?>
<?= sprintf('[`%s`](%s %s) ',
	$this->chopNamespace($item->getReflection()->getPrettyName()),
	$this->getLink($item->getReflection()->getPrettyName()),
	'Namespace: ' . ($item->getReflection()->getDeclaringClass()->getNamespaceName() ?: '\\')
) ?>
<?php } else { ?>
<?= '`' .  $item->getReflection()->getPrettyName() . '` ' ?>
<?php } ?>
<?php } ?>
