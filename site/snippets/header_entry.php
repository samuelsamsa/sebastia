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
<body class="page-scroll<?php if (!empty($bodyClass)): ?> <?= esc($bodyClass) ?><?php endif ?>">
<svg width="0" height="0" style="position:absolute">
  <filter id="duotone-blue">
    <feColorMatrix
      type="matrix"
      values="
        0.2126 0.7152 0.0722 0 0
        0.2126 0.7152 0.0722 0 0
        0.2126 0.7152 0.0722 0 0
        0      0      0      1 0"
    />
    <feComponentTransfer>
      <feFuncR type="table" tableValues="0.25 0.99" />
      <feFuncG type="table" tableValues="0.41 0.99" />
      <feFuncB type="table" tableValues="0.88 0.98" />
    </feComponentTransfer>
  </filter>
</svg>

  <header class="header not-home is-visible" data-fade>
    <h1>
      <a href="<?= $site->url() ?>"><?= $site->title()->esc() ?></a>
    </h1>

    <?php snippet('site-navigation') ?>
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
