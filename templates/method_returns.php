###### Returns

<dl>
<?php while ($return = $method->getInfo('return')) { ?>
	<?php if ($return['type'] == 'self') { ?>

		<dt>
			<?= $document->getReflection()->getShortName() ?>

		</dt>
		<dd>
			<?= $return['note'] ?>

		</dd>
	<?php } elseif ($return['type']) { ?>

		<dt>
			<?= $return['type'] ?>

		</dt>
		<dd>
			<?= $return['note'] ?>

		</dd>
	<?php } else { ?>

		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	<?php } ?>
<?php } ?>

</dl>
