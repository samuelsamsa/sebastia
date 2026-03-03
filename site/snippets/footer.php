</main>

<?php
$assetVersion = function (string $asset): string {
  $path = kirby()->root('index') . '/' . ltrim($asset, '/');
  return is_file($path) ? (string)filemtime($path) : (string)time();
};
?>

<script src="<?= url('assets/js/site.js') ?>?v=<?= $assetVersion('assets/js/site.js') ?>" defer></script>
<?php if (!empty($pageScript)): ?>
  <script src="<?= url($pageScript) ?>?v=<?= $assetVersion($pageScript) ?>" defer></script>
<?php endif ?>

</body>
</html>
