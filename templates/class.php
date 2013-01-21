# <?= $document->getReflection()->getShortName() ?>

<?php if (count($properties = $document->query('property'))) { ?>

## Properties

	<?php if (count($static_properties = $properties->query('static'))) { ?>

### Static Properties
		<?php foreach ($static_properties as $static_property) { ?>

#### $<?= $static_property->getReflection()->getName() ?>


<?= $static_property->getDescription() ?>

			<?php if ($static_property->getDetails()) { ?>
##### Details

<?= $static_property->getDetails() ?>

			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>


<?php if (count($methods = $document->query('method'))) { ?>

## Methods
	<?php if (count($static_methods = $methods->query('static'))) { ?>

### Static Methods
		<?php foreach ($static_methods as $method) { ?>

#### <?= $method->getReflection()->getName() ?>()

		<?php } ?>
	<?php } ?>
	<?php if (count($instance_methods = $methods->query('instance'))) { ?>

### Instance Methods
		<?php foreach ($instance_methods as $method) { ?>

#### <?= $method->getReflection()->getName() ?>()
			<?php if ($method->getDescription()) { ?>

<?= $method->getDescription() ?>

			<?php } ?>
			<?php if ($method->getDetails()) { ?>

##### Details

<?= $method->getDetails() ?>

			<?php } ?>
			<?php if ($method->hasInfo('param')) { ?>

###### Parameters

<table>
	<thead>
		<th>Type</th>
		<th>Param</th>
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

			<?php } ?>
		<?php } ?>
	<?php } ?>

<?php } ?>


