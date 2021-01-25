<?php echo $_POST['bookingcode'] . " <br>";
echo $_POST['showid'] . " <br>" . " <br>";
 foreach ($_POST['seatnum'] as $key) {
  echo $key . "&emsp;";
}
echo "<br>" . $_POST['pemesan'] . " <br>";
