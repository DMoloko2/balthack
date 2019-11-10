<section class="rating container mb-5 ">
  <h3 class="text-center pb-2">Секции</h3>
  <?php foreach ($section as $section_key): ?>
    <a href="#<?= $section_key->id; ?>">
      <div class="card wow fadeInUp">
        <div class="card-body pb-0 my_-_mb25">
          <div class="container list-group-flush">
            <div class="list-group-item">
              <p class="chool">Центр : <?= $section_key->club_name; ?></p>
              <p class="mb-0"><img src="https://avatars.mds.yandex.net/get-pdb/916253/4bb994cd-e211-46f1-8860-d66098d0aadc/s1200?webp=false" class="mr-3 img_bulding_rating">Секция : <?= $section_key->section_name; ?><br></p>
              <p class="img_text_rating">адрес : <?= $section_key->address; ?></p>
              <div class="rating_star" id='rateyo-readonly-widg<?= $section_key->id; ?>'></div>
              <p class="rating_star_int"><?= $section_key->rating; ?></p>
            </div>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</section>

<script>
  <?php foreach ($section as $key): ?>
    $("#rateyo-readonly-widg<?php echo $key->id; ?>").rateYo({
      rating: <?php echo $key->rating; ?>,
      numStars: 5,
      precision: 2,
      minValue: 1,
      maxValue: 5,
      readOnly: true
    });
  <?php endforeach; ?>
</script>
