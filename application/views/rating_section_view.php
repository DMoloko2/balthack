<section class="rating container mb-5">
  <h3 class="text-center pb-2">Секции</h3>
  <?php foreach ($section as $section): ?>
    <a href="#<?= $section->id; ?>">
      <div class="card">
        <div class="card-body pb-0 my_-_mb25">
          <div class="container list-group-flush">
            <div class="list-group-item">
              <p class="chool">Центр : <?= $section->club_name; ?></p>
              <p class="mb-0"><img src="http://www.remontbp.com/wp-content/uploads/2016/02/family-house_111215_01.jpg" class="mr-3 img_bulding_rating">Секция : <?= $section->section_name; ?><br></p>
              <p class="img_text_rating">адрес : <?= $section->address; ?></p>
              <p class="my_float">Рейтинг : <?= $section->rating; ?></p>
            </div>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</section>
