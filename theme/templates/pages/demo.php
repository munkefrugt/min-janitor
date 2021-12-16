<?php
global $action;
global $IC;
global $itemtype;


$items = $IC->getItems(array("itemtype" => $itemtype, "status" => 1, "extend" => array("tags" => true, "user" => true, "mediae" => true)));

?>

<div class="scene posts i:scene">
	<h1>Demo</h1>
	<h2>
		This is the demo items page. It's here to demonstrate a custom item type.
	</h2>


<? if($items): ?>
	<ul class="items articles">
		<? foreach($items as $item):
			$media = $IC->sliceMediae($item); ?>
		<li class="item article id:<?= $item["item_id"] ?>" itemscope itemtype="http://schema.org/NewsArticle">

			<ul class="tags">
				<? if($item["tags"]): ?>
					<? foreach($item["tags"] as $item_tag): ?>
						<? if($item_tag["context"] == $itemtype): ?>
				<li itemprop="articleSection"><?= $item_tag["value"] ?></li>
						<? endif; ?>
					<? endforeach; ?>
				<? endif; ?>
			</ul>

			<h3 itemprop="headline"><?= $item["name"] ?></h3>


			<ul class="info">
				<li class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", strtotime($item["published_at"])) ?>"><?= date("Y-m-d, H:i", strtotime($item["published_at"])) ?></li>
				<li class="modified_at" itemprop="dateModified" content="<?= date("Y-m-d", strtotime($item["modified_at"])) ?>"></li>
				<li class="author" itemprop="author"><?= $item["user_nickname"] ?></li>
				<li class="main_entity share" itemprop="mainEntityOfPage" content="<?= SITE_URL ?>/demo"></li>
				<li class="publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<ul class="publisher_info">
						<li class="name" itemprop="name" content="parentnode.dk"></li>
						<li class="logo" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
							<span class="image_url" itemprop="url" content="<?= SITE_URL ?>/img/logo-large.png"></span>
							<span class="image_width" itemprop="width" content="720"></span>
							<span class="image_height" itemprop="height" content="405"></span>
						</li>
					</ul>
				</li>
				<li class="image_info" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<span class="image_url" itemprop="url" content="<?= SITE_URL ?>/img/logo-large.png"></span>
					<span class="image_width" itemprop="width" content="720"></span>
					<span class="image_height" itemprop="height" content="405"></span>
				</li>
			</ul>


			<? if($item["v_text"]): ?>
			<div class="description" itemprop="description">
				<p><?= nl2br($item["v_text"]) ?></p>
			</div>
			<? endif; ?>

			<? if($item["v_html"]): ?>
			<div class="articlebody" itemprop="articleBody">
				<?= $item["v_html"] ?>
			</div>
			<? endif; ?>

		</li>
		<? endforeach; ?>
	</ul>
	
<? else: ?>
	<p>No demo items</p>
<? endif; ?>

</div>
