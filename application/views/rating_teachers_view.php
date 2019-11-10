<section class="rating container mb-5 ">
  <h3 class="text-center pb-2">Преподаватели (тренера)</h3>
  <?php foreach ($trainers as $ticher): ?>
    <a href="#<?= $ticher->id; ?>">
      <div class="card wow fadeInUp">
        <div class="card-body pb-0 my_-_mb25">
          <div class="container list-group-flush">
            <div class="list-group-item">
              <p class="chool"> <?= $ticher->sername.' '.$ticher->name.' '.$ticher->otch; ?></p>
              <p class="mb-0"><img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0 mr-3 img_bulding_rating"
            alt="avatar image">Центр : <?= $ticher->club_name; ?><br></p>
              <p class="section_rating">Секция: <?= $ticher->section_name; ?></p>
              <p class="img_text_rating">адрес : <?= $ticher->address; ?></p>
              <div class="rating_star" id='rateyo-readonly-widg<?= $ticher->id; ?>'></div>
              <p class="rating_star_int"><?= $ticher->rating; ?></p>
            </div>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</section>

<script>
  <?php foreach ($trainers as $key): ?>
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
