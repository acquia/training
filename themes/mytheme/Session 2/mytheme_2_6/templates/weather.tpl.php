<div class="weather">
  <p><strong><?php print $weather->real_name; ?></strong></p>
  <div style="text-align:center;">
    <img src="<?php print $weather->image_filename; ?>" <?php print $weather->image_size; ?> alt="<?php print $weather->condition; ?>" title="<?php print $weather->condition; ?>" />
  </div>
  <ul>
    <li><?php print $weather->condition; ?></li>
    <?php if (isset($weather->temperature)): ?>
      <?php if (isset($weather->windchill)): ?>
        <li><?php print t("Temperature: !temperature1, feels like !temperature2", array(
          '!temperature1' => $weather->temperature,
          '!temperature2' => $weather->windchill
        )); ?></li>
      <?php else: ?>
        <li><?php print t("Temperature: !temperature",
          array('!temperature' => $weather->temperature)); ?></li>
      <?php endif ?>
    <?php endif ?>
    <?php if (isset($weather->wind)): ?>
      <li><?php print t('Wind: !wind',
        array('!wind' => $weather->wind)); ?></li>
    <?php endif ?>
    <?php if (isset($weather->pressure)): ?>
      <li><?php print t('Pressure: !pressure',
        array('!pressure' => $weather->pressure)); ?></li>
    <?php endif ?>
    <?php if (isset($weather->rel_humidity)): ?>
      <li><?php print t('Rel. Humidity: !rel_humidity',
        array('!rel_humidity' => $weather->rel_humidity)); ?></li>
    <?php endif ?>
    <?php if (isset($weather->visibility)): ?>
      <li><?php print t('Visibility: !visibility',
        array('!visibility' => $weather->visibility)); ?></li>
    <?php endif ?>
    <?php if (isset($weather->sunrise)): ?>
      <li><?php print $weather->sunrise; ?></li>
    <?php endif ?>
    <?php if (isset($weather->sunset)): ?>
      <li><?php print $weather->sunset; ?></li>
    <?php endif ?>
    <?php if (isset($weather->metar)): ?>
      <li><?php print t('METAR data: !metar',
        array('!metar' => '<pre>'. wordwrap($weather->metar, 20) .'</pre>')); ?></li>
    <?php endif ?>
  </ul>
  <?php if (isset($weather->station)): ?>
    <small>
      <?php print t('Location of this weather station:'); ?><br />
      <?php print $weather->station; ?>
    </small>
    <br />
  <?php endif ?>
  <?php if (isset($weather->legal)): ?>
    <small>
      <?php print $weather->legal; ?>
    </small>
    <br />
  <?php endif ?>
  <?php if (isset($weather->reported_on)): ?>
    <small>
      <?php print t('Reported on:'); ?><br />
      <?php print $weather->reported_on; ?>
    </small>
  <?php endif ?>
</div>
