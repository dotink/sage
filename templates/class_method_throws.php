###### Throws

<dl>
<?php while ($return = $method->getInfo('throws')) { ?>
	<dt>
		<?php if (strpos($return['type'], '\\') === FALSE) { ?>
			<?= $method->getReflection()->getDeclaringClass()->getNamespaceName() . '\\' . $return['type'] ?>
		<?php } else { ?>
			<?= $return['type'] ?>
		<?php } ?>

	</dt>
	<dd>
		<?= $return['note'] ?>

	</dd>
<?php } ?>
</dl>
