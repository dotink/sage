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
				<?= array_shift($details['types']) ?>

			</td>
			<td rowspan="<?= $span ?>">
				<?= $details['details'] ?>

			</td>
		</tr>
			<?php foreach($details['types'] as $type) { ?>

		<tr>
			<td>
				<?= $type ?>

			</td>
		</tr>
			<?php } ?>
		<?php } else { ?>

		<tr>
			<td>
				<?= $details['name'] ?>

			</td>
			<td>
				<?= $details['types'][0] ?>

			</td>
			<td>
				<?= $details['details'] ?>

			</td>
		</tr>
		<?php } ?>
	<?php } ?>

	</tbody>
</table>
