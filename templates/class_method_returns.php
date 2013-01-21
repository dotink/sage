###### Returns

<dl>
<?php while ($return = $method->getInfo('return')) { ?>
	<dt>
		`<?= $return['type'] ?>`
	</dt>
	<dd>
		<?= $return['note'] ?>

	</dd>
<?php } ?>
</dl>
