<?php snippet('header') ?>
<div class="mosaic-wrapper">
  <div class="mosaic-rotated">
    <img
      src="assets/images/mapping_14_2_drone.jpg"
      alt=""
      loading="eager"
      fetchpriority="high"
      decoding="async"
    >
    <?php snippet('new_backg.svg') ?>
    <?php snippet('new_mosaic.svg') ?>
    <?php snippet('c.svg') ?>
  </div>

  <div class="mosaic-street-markers" aria-hidden="true">
    <span class="street-marker marker-left marker-desktop">Høyblokka</span>
    <span class="street-marker marker-right marker-desktop">Akersgata</span>
    <span class="street-marker marker-bottom marker-desktop">Hospitalsgata</span>

    <span class="street-marker marker-left marker-mobile">Hospitalsgata</span>
    <span class="street-marker marker-right marker-mobile">Johan Nygaardsvolds plass</span>
  </div>
</div>

<?php snippet('index') ?>

<div id="stone-panel-wrapper">
  <button class="entry-close" aria-label="Close entry">
    <svg viewBox="0 0 24 24" width="40" height="40" aria-hidden="true">
      <path d="M4 4l16 16M20 4L4 20" stroke="black" stroke-width="0.8" stroke-linecap="round"/>
    </svg>
  </button>
  <div id="stone-panel"></div>
</div>

<?php snippet('footer', ['pageScript' => 'assets/js/home.js']) ?>
