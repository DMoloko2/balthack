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
        </ul>
      </li>
    </ul>
  </div>
<?php print_r($achiv[0]->description); ?>
</body>
</html>




  <script  type="text/javascript" charset="UTF-8" >
  // $(".btn_info").on('click', function(e){
  //   //alert(a);
  //   var text2 = $("#myTextArea").val();
  //   $.ajax({
  //     type: "GET",
  //     url: 'http://localhost/balthack/Personal_controllers/updateinfo?info='+text2,
  //     contentType: "application/json",
  //     success: function(e){
  //       $('#div').html(e);
  //
  //   }
  //
  // })
  //
  //  //  success: location.reload(),
  //  // dataType: dataType
  // });
$(document).ready(function() {

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


});


   //  success: location.reload(),
   // dataType: dataType
  });

</script>
