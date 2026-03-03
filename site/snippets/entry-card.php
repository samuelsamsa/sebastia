<?php /** @var Kirby\Cms\Page $page */ ?>

<article class="entry-card entry-card-home">
  <div class="space"><?= $page->num() ?>a</div>
  <header>
    <h2><?= esc($page->title()) ?></h2>
    <p><a href="<?= esc($page->url()) ?>"><?= t('explore') ?></a></p>
  </header>

  <div class="space"><?= $page->num() ?>b</div>
  <ul class="meta">
    <li><span class="entry-label"><?= t('donor') ?></span><span><?= esc($page->donor()) ?></span></li>
    <li><span class="entry-label"><?= t('year') ?></span><span><?= esc($page->year()) ?></span></li>
    <li><span class="entry-label"><?= t('type') ?></span><span><?= esc($page->type()) ?></span></li>
    <li><span class="entry-label"><?= t('stone') ?></span><span><?= esc($page->stone()) ?></span></li>
    <li><span class="entry-label"><?= t('municipality') ?></span><span><?= esc($page->municipality()) ?></span></li>
    <li><span class="entry-label"><?= t('origin') ?></span><span><?= esc($page->origin()) ?></span></li>
    <li><span class="entry-label"><?= t('county') ?></span><span><?= esc($page->county()) ?></span></li>
    <li><span class="entry-label"><?= t('sizequantity') ?></span><span><?= esc($page->sizequantity()) ?></span></li>
  </ul>

  <div class="space"><?= $page->num() ?>c</div>
  <?php if ($page->notes()->isNotEmpty()): ?>
    <section class="notes">
      <?= $page->notes()->kt() ?>
    </section>
  <?php endif ?>
</article>
