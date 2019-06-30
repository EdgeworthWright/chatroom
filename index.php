<?php
require 'private/functions.php';
$conn = dbConnect();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <div id="allmessagesbruh"></div>
      <form action="insert.php" id="frmBox" method="post" onsubmit="return formSubmit();">
        <input type="text" name="message" placeholder="message" required>
        <input type="submit" name="submit" value="Submit">
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
    </script>
  </body>
</html>
