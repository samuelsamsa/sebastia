<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>
  <?= css([
    'assets/css/index.css',
    '@auto'
  ]) ?>
  <link rel="icon" type="image/png" href="<?= url('assets/icons/favicon.png') ?>">
</head>
<body>
  <header class="header home is-visible" data-fade>
    <h1>
      <a href="<?= $site->url() ?>"><?= $site->title()->esc() ?></a>
    </h1>

    <?php snippet('site-navigation') ?>

    <div class="search-trigger" id="toggle-search" aria-label="Search">
      <svg id="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
        <path id="icon-path" d="M11 4a7 7 0 1 1 0 14 7 7 0 0 1 0-14zm5 12l5 5" stroke="black" stroke-width="0.8" fill="none" stroke-linecap="square"/>
      </svg>
    </div>
  </header>

  <div class="mobile-nav-panel" id="mobile-nav-panel">
    <?php snippet('site-navigation', ['mobile' => true]) ?>
  </div>

  <button class="hamburger" id="hamburger" aria-expanded="false" aria-label="Menu">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <main class="main">
