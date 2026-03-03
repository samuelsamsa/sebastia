<?php snippet('header_entry') ?>

<?php
$entries = page('entries')->children()->listed();

$parsed = $entries->map(function ($p) {
    $raw = trim((string)$p->year()->value());
    if ($raw === '' || strcasecmp($raw, 'n/a') === 0) return null;

    $events = [];
    $segments = preg_split('/,|\n/', $raw);

    foreach ($segments as $segment) {
        $segment = trim($segment);

        preg_match_all('/(\d{4})\s*\/\s*(\d{4})/', $segment, $matches, PREG_SET_ORDER);
        foreach ($matches as $m) {
            $events[] = ['type' => 'dot', 'year' => intval($m[1]), 'approx' => false];
            $events[] = ['type' => 'dot', 'year' => intval($m[2]), 'approx' => false];
        }

        preg_match_all('/(\d{4})\s*[-–]\s*(\d{4})/', $segment, $matches, PREG_SET_ORDER);
        foreach ($matches as $m) {
            $events[] = ['type' => 'range', 'start' => intval($m[1]), 'end' => intval($m[2])];
        }

        preg_match_all('/\b(Ca|Ca.|ca|Circa|Trolig|Etter|Approx.|about)?\s*(\d{4})\b/i', $segment, $matches, PREG_SET_ORDER);
        foreach ($matches as $m) {
            $approx = !empty($m[1]);
            $year = intval($m[2]);
            $events[] = ['type' => 'dot', 'year' => $year, 'approx' => $approx];
        }
    }

    if (empty($events)) return null;

    return ['page' => $p, 'events' => $events];
})->filter(fn($item) => $item !== null);

$yearArray = [];
foreach ($parsed as $item) {
    foreach ($item['events'] as $event) {
        if ($event['type'] === 'dot') {
            $yearArray[] = $event['year'];
        } elseif ($event['type'] === 'range') {
            $yearArray[] = $event['start'];
            $yearArray[] = $event['end'];
        }
    }
}

$yearArray = array_values(array_unique($yearArray));
sort($yearArray);
$yearCount = count($yearArray);

$yearToCol = [];
foreach ($yearArray as $i => $year) {
    $yearToCol[$year] = $i + 1;
}
?>

<section class="timeline">
  <div class="timeline-grid"
       style="
           --year-count: <?= $yearCount ?>;
           grid-template-columns: 10rem repeat(<?= $yearCount ?>, 3rem);
       " data-fade>

    <div class="timeline-controls" style="grid-column: 1 / 2;">
      <button id="sortYearButton" data-order="asc">Year ↑</button>
      <button id="sortAlphaButton" data-order="asc">A-Z ↑</button>
    </div>

    <?php foreach ($yearArray as $year): ?>
      <div class="year" data-year="<?= $year ?>"><?= $year ?></div>
    <?php endforeach ?>

    <?php foreach ($parsed as $item): ?>
      <?php
      $firstYear = null;
      foreach ($item['events'] as $event) {
          if ($event['type'] === 'dot') {
              $firstYear = $event['year'];
              break;
          }
          if ($event['type'] === 'range') {
              $firstYear = $event['start'];
              break;
          }
      }

      $rowYears = [];
      foreach ($item['events'] as $event) {
          if ($event['type'] === 'dot') {
              $rowYears[] = $event['year'];
          } elseif ($event['type'] === 'range') {
              $rowYears[] = $event['start'];
              $rowYears[] = $event['end'];
          }
      }
      $rowYears = array_unique($rowYears);
      ?>

      <a href="<?= $item['page']->url() ?>" class="timeline-row" data-years="<?= implode(',', $rowYears) ?>" data-fade>
        <div class="entry-title"><span><?= $item['page']->title() ?></span></div>

        <div class="entry-time" data-start="<?= $firstYear ?>">
          <?php foreach ($item['events'] as $event): ?>
            <?php
            if ($event['type'] === 'dot') {
                $colStart = $yearToCol[$event['year']] ?? 2;
                $colEnd = $colStart + 1;
                $class = !empty($event['approx']) ? 'dot approx' : 'dot';
            } else {
                $colStart = $yearToCol[$event['start']] ?? 2;
                $colEnd = ($yearToCol[$event['end']] ?? $colStart) + 1;
                $class = 'range';
            }
            ?>
            <span class="<?= $class ?>" style="grid-column: <?= $colStart ?> / <?= $colEnd ?>;"></span>
          <?php endforeach ?>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</section>

<?php snippet('footer', ['pageScript' => 'assets/js/timeline.js']) ?>
