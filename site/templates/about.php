<?php snippet('header_entry') ?>

<div class="entry-background">
  <article class="about-grid">
    <?php foreach ($page->layout()->toLayouts() as $layout): ?>
      <section class="column-grid" id="<?= $layout->id() ?>">
        <?php foreach ($layout->columns() as $column): ?>
          <div class="column" style="--span:<?= $column->span(6) ?>">
            <div class="blocks">
              <?= $column->blocks() ?>
            </div>
          </div>
        <?php endforeach ?>
      </section>
    <?php endforeach ?>
  </article>
</div>

<?php snippet('footer', ['pageScript' => 'assets/js/about.js']) ?>
