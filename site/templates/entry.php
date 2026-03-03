<?php snippet('header_entry') ?>
<?php
$isMobileClient = preg_match(
  '/Mobile|Android|iP(hone|od|ad)|IEMobile|Opera Mini/i',
  $_SERVER['HTTP_USER_AGENT'] ?? ''
);

$entryTitles = [];
foreach ($pages->find('entries')->children() as $entryPage) {
  $entryTitles[$entryPage->slug()] = (string)$entryPage->title();
}

$entryConfig = [
  'slug' => (string)$page->slug(),
  'titles' => $entryTitles,
];
?>

<div class="entry-background">
  <article class="entry-card entry">
    <div class="section1 entry-main-panel" data-fade>
      <div class="space"><?= $page->num() ?>a</div>
      <header>
        <h2><?= esc($page->title()) ?></h2>
      </header>

      <div class="space"><?= $page->num() ?>b</div>
      <ul class="meta">
        <li>
          <span class="entry-label"><?= t('donor') ?></span>
          <span><?= esc($page->donor()) ?></span>
        </li>
        <li>
          <span class="entry-label"><?= t('year') ?></span>
          <span><?= esc($page->year()) ?></span>
        </li>
        <li>
          <span class="entry-label"><?= t('type') ?></span>
          <span><?= esc($page->type()) ?></span>
        </li>
        <li>
          <span class="entry-label"><?= t('stone') ?></span>
          <span><?= esc($page->stone()) ?></span>
        </li>
        <li>
          <span class="entry-label"><?= t('municipality') ?></span>
          <span><?= esc($page->municipality()) ?></span>
        </li>
        <li>
          <span class="entry-label"><?= t('origin') ?></span>
          <span><?= esc($page->origin()) ?></span>
        </li>
        <li>
          <span class="entry-label"><?= t('county') ?></span>
          <span><?= esc($page->county()) ?></span>
        </li>
        <li>
          <span class="entry-label"><?= t('sizequantity') ?></span>
          <span><?= esc($page->sizequantity()) ?></span>
        </li>
      </ul>

      <div class="space"><?= $page->num() ?>c</div>
      <div class="entry-mosaic lightbox-trigger" data-stone="<?= esc($page->stone()) ?>">
        <?php snippet($isMobileClient ? 'mosaic_entry_mobile.svg' : 'mosaic_entry.svg') ?>
      </div>

      <div class="space"><?= $page->num() ?>d</div>
      <?php if ($page->notes()->isNotEmpty()): ?>
        <section class="notes">
          <?= $page->notes()->kt() ?>
        </section>
      <?php endif ?>

      <div class="space"><?= $page->num() ?>e</div>
      <div class="entry-mosaic lightbox-trigger" data-stone="<?= esc($page->stone()) ?>">
        <?php snippet('norway.svg') ?>
      </div>
    </div>

    <div class="section2 entry-media-panel" data-fade>
      <?php if ($page->images()->isNotEmpty()): ?>
        <section class="gallery entry-gallery">
          <?php foreach ($page->images() as $img): ?>
            <figure class="gallery-entry-item">
              <img
                src="<?= $img->thumb(['width' => 600])->url() ?>"
                srcset="<?= $img->thumb(['width' => 600])->url() ?> 600w,
                        <?= $img->thumb(['width' => 1000])->url() ?> 1000w,
                        <?= $img->thumb(['width' => 1400])->url() ?> 1400w"
                sizes="(max-width: 768px) 48vw, (max-width: 1024px) 32vw, 24vw"
                alt="<?= esc($img->alt()->or($page->title())) ?>"
                loading="lazy"
                decoding="async"
                fetchpriority="low"
              >
              <?php if ($img->caption()->isNotEmpty()): ?>
                <figcaption><?= esc($img->caption()) ?></figcaption>
              <?php endif ?>
            </figure>
          <?php endforeach ?>
        </section>
      <?php endif ?>

      <div class="space-right"><?= $page->num() ?>f</div>
    </div>
  </article>
</div>

<div class="lightbox" hidden>
  <button class="lightbox-close" aria-label="Close">
    <svg viewBox="0 0 24 24" width="40" height="40">
      <path d="M4 4l16 16M20 4L4 20" stroke="black" stroke-width="0.8" stroke-linecap="round"/>
    </svg>
  </button>
  <div class="lightbox-media"></div>
  <div class="lightbox-caption"></div>
</div>

<script id="entry-page-config" type="application/json"><?= json_encode($entryConfig, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>

<?php snippet('footer', ['pageScript' => 'assets/js/entry.js']) ?>
