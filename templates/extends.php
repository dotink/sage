### Extends

<?php if ($link = $this->getLink($parent->getName())) { ?>
<?= sprintf('[`%s`](%s)', $this->reduce($parent->getName(), $document->getContext()), $link) ?>
<?php } else { ?>
<?= '`' . $this->reduce($parent->getName(), $document->getContext()) . '`' ?>
<?php } ?>
