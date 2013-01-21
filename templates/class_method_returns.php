###### Returns

<dl>
<?php while ($return = $method->getInfo('return')) { ?>
	<?php if ($return['type']) { ?>
		<dt>
			<?= $return['type'] ?>

		</dt>
		<dd>
			<?= $return['note'] ?>

		</dd>
	<?php } else { ?>
		<dt>
			void
		</td>
		<dd>
			Provides no return value.
		</dd>
	<?php } ?>
<?php } ?>
</dl>
