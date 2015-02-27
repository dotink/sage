###### Examples

<?php
	$external_examples = array();

	while ($example = $method->getInfo('example')) {
		if (strpos($example, 'http://') === 0) {
			$external_examples[] = $example;
		} else {
			?>

```php
<?= trim(file_get_contents($this->get('example_root') . DIRECTORY_SEPARATOR . $example)) ?>


```
			<?php
		}
	}
?>


<?php
	if (count($external_examples)) {
		foreach ($external_examples as $example) {
			?>
- [<?= $example ?>](<?= $example ?>)
			<?php
		}
	}
?>
