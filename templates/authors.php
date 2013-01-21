### Authors

<table>
	<thead>
		<th>Name</th>
		<th>Handle</th>
		<th>Email</th>
	</thead>
	<tbody>
	<?php while($author = $document->getInfo('author')) { ?>
		<tr>
			<td>
				<?= $author['name'] ?>

			</td>
			<td>
				<?= $author['handle'] ?>

			</td>
			<td>
				<?= $author['email'] ?>

			</td>
		</tr>
	<?php } ?>

	</tbody>
</table>
