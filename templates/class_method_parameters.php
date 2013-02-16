###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
	<?php while($details = $method->getInfo('param')) { ?>
		<?php if (isset($details['types']) && count($details['types']) > 1) { ?>

		<tr>
			<td rowspan="<?= $span = count($details['types']) + 1 ?>">
				<?= $details['name'] ?>

			</td>
			<td>
				<?php if ($link = $this->getLink($this->expand($details['types'][0], $document->getContext()))) { ?>
					<a href="<?= $link ?>"><?= $details['types'][0] ?></a>
				<?php } else { ?>
					<?= $details['types'][0] ?>
				<?php } ?>

			</td>
			<td rowspan="<?= $span ?>">
				<?= $details['details'] ?>

			</td>
		</tr>
			<?php foreach(array_slice($details['types'], 1) as $type) { ?>

		<tr>
			<td>
				<?php if ($link = $this->getLink($this->expand($type, $document->getContext()))) { ?>
					<a href="<?= $link ?>"><?= $type ?></a>
				<?php } else { ?>
					<?= $type ?>
				<?php } ?>

			</td>
		</tr>
			<?php } ?>
		<?php } else { ?>

		<tr>
			<td>
				<?= $details['name'] ?>

			</td>
			<td>
				<?php if ($link = $this->getLink($this->expand($details['types'][0], $document->getContext()))) { ?>
					<a href="<?= $link ?>"><?= $details['types'][0] ?></a>
				<?php } else { ?>
					<?= $details['types'][0] ?>
				<?php } ?>

			</td>
			<td>
				<?= $details['details'] ?>

			</td>
		</tr>
		<?php } ?>
	<?php } ?>

	</tbody>
</table>
