<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Личный кабинет</title>
</head>
<body>
  <div class="container">
    <ul class="list-unstyled list-inline text-center py-2">
      <li class="list-inline-item">
        <ul class="developer">
          <h6 class="mb-1">Личный Кабинет</h6>
          <li><?php print_r($personal[0]->name); ?></li>
          <li><?php print_r($personal[0]->name); ?></li>
          <li><?php print_r($personal[0]->sername); ?></li>
          <li><?php print_r($personal[0]->year); ?></li>
          <li><textarea id='myTextArea'>
            <?php print_r($personal[0]->information); ?>
          </textarea></li>
          <div id='div'></div>
          <button class='btn_info'>Изменить информацию</button>
          <button type="button" class="btn btn-primary" id="button_scan">scan</button>
          <div id="good">Сканирование завершено</div>
        </ul>
      </li>
    </ul>
  </div>



<?php foreach ($achiv as $achiv): ?>
    <div class="col-lg-3 col-md-4 col-sm-12">
     <?= $achiv->description; ?>
    </div>
   <?php endforeach; ?>
<h1>Куда записан</h1>

   <?php foreach ($sections as $sections): ?>
       <div class='col-lg-3 col-md-4 col-sm-12 btn ttt' id='<?= $sections->id; ?>' >
        <?= $sections->name; ?> <?= $sections->address; ?>
       </div>
      <?php endforeach; ?>
<div class='rrr'></div>


   <canvas></canvas>


   <!-- <script type="text/javascript" src="../../MDB/js/jquery.js"></script> -->
<!-- <script type="text/javascript" src="http://localhost/balthack/MDB/js/DecoderWorker.js"></script> -->
   <script type="text/javascript" src="http://localhost/balthack/MDB/js/qrcodelib.js"></script>
   <script type="text/javascript" src="http://localhost/balthack/MDB/js/webcodecamjquery.js"></script>

   <script type="text/javascript">
      var scet = 0;

       var arg = {
           resultFunction: function(result) {

           var a=result.code;
           $.ajax({
             type: "GET",
             url: 'http://localhost/balthack/Personal_controllers/addvisit?id_section='+a+'&id='+<?php echo $_SESSION['id']?>,
             contentType: "application/json",
             success: function(e){
               $('#div').html(e);

           }

         });
         $('canvas').hide();
         $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.stop();

         scet = scet + 1;
           }
       };

       $("#button_scan").click(function(){
         if(scet%2==0){
           $("canvas").show();
           $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();
           scet=scet + 1;
         }
         else{
           $('canvas').hide();
           $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();
           scet = scet + 1;
         }

       });
        $('canvas').hide();

   </script>



</body>
</html>




  <script  type="text/javascript" charset="UTF-8" >



  $(".ttt").on('click', function(e){
    //alert(a);

    var text2 = $(this).attr('id');
    $.ajax({
      type: "GET",
      url: 'http://localhost/balthack/Personal_controllers/showvisit?info='+text2+'&id='+<?php echo $_SESSION['id']?>,
      contentType: "application/json",
      success: function(e){
        $('.rrr').html(e);

    }

  });


});

$(".btn_info").on('click', function(e){
  //alert(a);

  var text2 = $("#myTextArea").val();
  $.ajax({
    type: "GET",
    url: 'http://localhost/balthack/Personal_controllers/updateinfo?info='+text2+'&id='+<?php echo $_SESSION['id']?>,
    contentType: "application/json",
    success: function(e){
      $('#div').html(e);

  }

});

   //  success: location.reload(),
   // dataType: dataType
  });

</script>
