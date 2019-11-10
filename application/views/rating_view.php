<section class="rating container mb-5">
  <h3 class="text-center pb-2">Подростково - молодёжные центры</h3>
  <?php foreach ($club as $key): ?>
    <a href="#<?= $key->id; ?>">
      <div class="card wow fadeInUp">
        <div class="card-body pb-0 my_-_mb25">
          <div class="container list-group-flush">
            <div class="list-group-item">
              <p class="mb-0"><img src="http://www.remontbp.com/wp-content/uploads/2016/02/family-house_111215_01.jpg" class="mr-3 img_bulding_rating"><?= $key->name; ?></p>
              <p class="img_text_rating">адрес : <?= $key->address; ?></p>
              <p class="my_float">Рейтинг : <div id= 'rateyo-readonly-widg<?= $key->id; ?>'></div></p>
            </div>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
  <?php print_r($club); ?>
</section>

<script>

  <?php foreach ($club as $key){ ?>

    $("#rateyo-readonly-widg<?php echo $key->id; ?>").rateYo({
      rating: <?php echo $key->rating; ?>,
      numStars: 5,
      precision: 2,
      minValue: 1,
      maxValue: 5,
      readOnly: true
    });
  <?php } ?>
</script>
