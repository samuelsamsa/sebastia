<?php $mobile = $mobile ?? false; ?>
<nav<?= $mobile ? '' : ' id="page-menu"' ?> class="page-menu">
  <ul>
    <li class="<?= e($site->homePage()->isOpen(), 'is-active') ?>">
      <a href="<?= $site->url() ?>"><?= t('map') ?></a>
    </li>
    <?php foreach ($site->children()->listed()->not('entries') as $item): ?>
      <li class="<?= e($item->isOpen(), 'is-active') ?>">
        <a href="<?= $item->url() ?>"><?= $item->title()->esc() ?></a>
      </li>
    <?php endforeach ?>
  </ul>
</nav>

<nav class="languages">
  <ul>
    <?php foreach ($kirby->languages() as $language): ?>
      <li<?php e($kirby->language() == $language, ' class="active"') ?>>
        <a href="<?= $page->url($language->code()) ?>" hreflang="<?= $language->code() ?>">
          <?= html($language->code()) ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</nav>

