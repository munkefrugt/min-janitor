<?php
global $action;
global $IC;
global $model;
global $itemtype;

$items = $IC->getItems(array("itemtype" => $itemtype, "order" => "status DESC, published_at DESC", "extend" => array("tags" => true, "mediae" => true)));

?>

<div class="scene i:scene defaultList <?= $itemtype ?>List">
	<h1>Demo item</h1>

	<ul class="actions">
		<?= $JML->listNew(array("label" => "New demo item")) ?>
	</ul>

	<div class="all_items i:defaultList taggable filters images width:100"<?= $HTML->jsData() ?>>
<?		if($items): ?>
		<ul class="items">
<?			foreach($items as $item): ?>
			<li class="item item_id:<?= $item["id"] ?><?= $HTML->jsMedia($item) ?>">
				<h3><?= strip_tags($item["name"]) ?></h3>

				<?= $JML->tagList($item["tags"]) ?>

				<?= $JML->listActions($item) ?>
			 </li>
<?			endforeach; ?>
		</ul>
<?		else: ?>
		<p>No demo items.</p>
<?		endif; ?>
	</div>

</div>
