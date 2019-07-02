<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="header"><img src="images/logo.png" alt="ChatHub">
      <button type="button" id="light">Light theme</button>
      <button type="button" id="dark">Dark theme</button>
    </div>
    <div class="wrapper">
      <div id="allmessagesbruh"></div>
      <form action="insert.php" id="frmBox" method="post" onsubmit="return formSubmit();">
        <input type="text" name="message" placeholder="message" id="message" required>
      </form>
      <h3 id="success"></h3>
    </div>
    <script src="node_modules/jquery/dist/jquery.js" charset="utf-8"></script>
    <script>
      function formSubmit(){
        $.ajax({
          type: 'POST',
          url: 'insert.php',
          data: $('#frmBox').serialize(),
          success: function(response){
            $('#success').html(response);
          }
        });
        var form = document.getElementById('frmBox').reset();
        setTimeout(function(){$('#allmessagesbruh').scrollTop($('#allmessagesbruh')[0].scrollHeight);}, 1000);
        return false;
      }

      function getMessages() {
        $.ajax({
          type: 'POST',
          url: 'getAllMessages.php',
          success: function(response) {
            $('#allmessagesbruh').html(response);

          }
        });
      }

      t = setInterval(getMessages, 1000);

      $('#light').click(function() {
        $('body').css({
            'background': 'white'
        });
        $('.header').css({
          'color': 'black'
        });
        $('#allmessagesbruh').css({
          'background': 'rgba(0,0,0,.1)',
          'color': 'black'
        });

        // <style>body{background: white;}.header{color:black;}#allmessagesbruh{background: rgba(0,0,0,.1); color: black;}.message{border-bottom: 1px solid rgba(0,0,0,.2);}</style>
      });

      $('#dark').click(function() {
        $('body').css({
            'background-color': 'rgba(0,0,0,.8)'
        });
        $('.header').css({
          'color': 'white'
        });
        $('#allmessagesbruh').css({
          'color': 'white'
        });

        // "<style>body{background:rgba(0,0,0,.8);}.header{color: white;}#allmessagesbruh{color: white;}.message{border-bottom: 1px solid rgba(255,255,255,.2);}</style>"
      });

    </script>
  </body>
</html>
