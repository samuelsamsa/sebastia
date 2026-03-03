<?php
/** @var \Kirby\Cms\Block $block */

$image = $block->image()->toFile();
if (!$image) return;

$alt = $block->alt()->or($image->alt())->or($image->filename())->esc();
$caption = $block->caption()->or($image->caption());

$src720 = $image->thumb(['width' => 720, 'quality' => 78])->url();
$src1200 = $image->thumb(['width' => 1200, 'quality' => 76])->url();

$width = $image->width();
$height = $image->height();
?>
<figure class="about-media">
  <img
    src="<?= $src1200 ?>"
    srcset="<?= $src720 ?> 720w, <?= $src1200 ?> 1200w"
    sizes="(max-width: 768px) 94vw, (max-width: 1200px) 78vw, 62vw"
    alt="<?= $alt ?>"
    width="<?= $width ?>"
    height="<?= $height ?>"
    loading="lazy"
    decoding="async"
    fetchpriority="low"
  >
  <?php if ($caption->isNotEmpty()): ?>
    <figcaption><?= $caption->kt() ?></figcaption>
  <?php endif ?>
</figure>
