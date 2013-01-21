###### Returns

<dl>
<?php while ($return = $method->getInfo('return')) { ?>
	<dt markdown="1">
		`<?= $return['type'] ?>`
	</dt>
	<dd>
		<?= $return['note'] ?>

	</dd>
<?php } ?>
</dl>
