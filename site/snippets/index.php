<div id="search-overlay" hidden>
  <div class="index-container">
    <div class="search-input-wrapper">
      <svg class="icon-search-small" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
    <path d="M11 4a7 7 0 1 1 0 14 7 7 0 0 1 0-14zm5 12l5 5"  stroke-width="0.8" fill="none" stroke-linecap="square"/>
  </svg>
      <input type="text" id="search-input" placeholder="" />
    </div>
  <div class="index-header-wrapper">
  <div class="index-header index-grid">
    <div class="header-filter" data-type="title">
      <?php echo t('title') ?>
      <span class="caret">[ ]</span>
      <div class="filter-dropdown" hidden></div>
    </div>
    <div class="header-filter" data-type="county">
      <?php echo t('county') ?>
      <span class="caret">[ ]</span>
      <div class="filter-dropdown" hidden></div>
    </div>
    <div class="header-filter" data-type="municipality">
      <?php echo t('municipality') ?>
      <span class="caret">[ ]</span>
      <div class="filter-dropdown" hidden></div>
    </div>
    <div class="header-filter" data-type="type">
      <?php echo t('type') ?>
      <span class="caret">[ ]</span>
      <div class="filter-dropdown" hidden></div>
    </div>
    <div class="header-filter" data-type="stone">
      <?php echo t('stone') ?>
      <span class="caret">[ ]</span>
      <div class="filter-dropdown" hidden></div>
    </div>
  </div>
</div>


  <div class="index-entries-wrapper">
    <?php foreach (page('entries')->children()->listed() as $entry): ?>
    <button class="entry-index-item index-grid" data-slug="<?= $entry->slug() ?>" data-texture="<?= $entry->texture()->toFile()?->url() ?>">
      <div><?= $entry->title() ?></div>
      <div><?= $entry->county() ?></div>
      <div><?= $entry->municipality() ?></div>
      <div><?= $entry->type() ?></div>
      <div><?= $entry->stone() ?></div>
    </button>
    <?php endforeach ?>
  </div>
</div>


</div>
