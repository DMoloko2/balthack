<section class="rating container mb-5 ">
  <h3 class="text-center pb-2">Преподаватели (тренера)</h3>
  <?php foreach ($trainers as $trainers): ?>
    <a href="#<?= $trainers->id; ?>">
      <div class="card wow fadeInUp">
        <div class="card-body pb-0 my_-_mb25">
          <div class="container list-group-flush">
            <div class="list-group-item">
              <p class="chool"> <?= $trainers->name.' '.$trainers->sername.' '.$trainers->otch; ?></p>
              <p class="mb-0"><img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0 mr-3 img_bulding_rating"
            alt="avatar image">Центр : <?= $trainers->club_name; ?><br></p>
              <p class="section_rating">Секция: <?= $trainers->section_name; ?></p>
              <p class="img_text_rating">адрес : <?= $trainers->address; ?></p>
              <p class="my_float">Рейтинг : <?= $trainers->rating; ?></p>
            </div>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</section>
