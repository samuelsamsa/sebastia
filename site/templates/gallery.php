<?php snippet('header_entry') ?>

<div class="gallery-wrapper">
  <h1><?= t('gallery') ?></h1>

  <div class="gallery-entries-wrapper is-loading">
    <?php foreach (page('entries')->children()->listed()->shuffle() as $entry): ?>
      <div class="gallery-entry-item is-link">
        <a href="<?= $entry->url() ?>" class="gallery-entry-link">
          <div class="gallery-entry-image-wrapper">
            <?php if ($entry->images()->isNotEmpty()): ?>
              <?php $cover = $entry->images()->first(); ?>
              <img
                src="<?= $cover->thumb([
                  'width' => 300,
                  'height' => 300,
                  'crop' => true
                ])->url() ?>"
                srcset="<?= $cover->thumb(['width' => 300, 'height' => 300, 'crop' => true])->url() ?> 300w,
                        <?= $cover->thumb(['width' => 600, 'height' => 600, 'crop' => true])->url() ?> 600w"
                sizes="(max-width: 768px) 45vw, (max-width: 1024px) 30vw, 18vw"
                alt="<?= esc($entry->title()) ?>"
                width="300"
                height="300"
                loading="lazy"
                decoding="async"
                fetchpriority="low"
              >
            <?php else: ?>
              <div class="no-image-placeholder">
                <?= t('noimage') ?>
              </div>
            <?php endif ?>

            <div class="gallery-entry-title">
              <p><?= esc($entry->title()) ?></p>
              <p><?= esc($entry->municipality()) ?></p>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('footer', ['pageScript' => 'assets/js/gallery.js']) ?>
