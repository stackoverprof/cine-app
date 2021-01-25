<?php
session_start();
  $conn = mysqli_connect("localhost","root", "", "cinedb");

function query($query)  {
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[]=$row;
  }
  return $rows;
}

$id = $_GET["key"];


$updateseat = query("SELECT seat FROM reserved WHERE showid = '$id' ORDER BY seat ASC");

if ($updateseat != NULL) {
  $i=0;
  foreach ($updateseat as $ups) {
    $arrseat[$i] = $ups['seat'];
    $i++;
  }
} else {
  $arrseat = [ ];
}



function availability($coord)
{
  global $arrseat;
  $reserved = false;
  foreach ($arrseat as $ars) {
    if ($coord == $ars) {
      $reserved = true;
    }
  }
  return $reserved;
};



?>
<?php $seatcol=[1,1,1,1,1,1,0,1,1,1,1] ?>
<?php $seatrow=[1,1,0,1,1,1,1,1,0,1,1] ?>

<?php $huruf=["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"] ?>
<?php $i=0; ?>
<form action="http://localhost/cine/public/reservation/payment" method="post">
  <div class="container justify-content-center seatkecildiv">

    <div class="btn-group-toggle seatkecildiv2" data-toggle="buttons">
      <?php foreach ($seatcol as $seatc): ?>
        <?php if ($seatc==1): ?>
          <?php $angka = 1; ?>
          <?php foreach ($seatrow as $seatr): ?>
            <?php if ($seatr==1): ?>
              <label id="<?= $huruf[$i] . $angka ?>" class="<?php if ( availability($huruf[$i] . $angka) == true){echo "unavailable";} ?> btn btn-secondary seats"  onclick="totalan('<?= $huruf[$i] . $angka ?>');">
                <input <?php if ( availability($huruf[$i] . $angka) == true){echo "disabled";} ?> value="<?= $huruf[$i] . $angka; $angka++;?>" name="seatnum[]" type="checkbox"  autocomplete="off">
              </label>
            <?php else:?>
              <label class="btn btn-secondary seats jalan">
                <input disabled type="checkbox" autocomplete="off">
              </label>
            <?php endif; ?>
          <?php endforeach; ?>


          <?php $i++ ?>
        <?php else: ?>
          <?php foreach ($seatrow as $seatr): ?>
              <label class="btn btn-secondary seats  jalan">
                <input disabled type="checkbox"  autocomplete="off">
              </label>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endforeach; ?>



      <input type="hidden" name="showid" value="<?= $id ?>">
      <input type="hidden" name="pemesan" value="<?= $_SESSION['username'] ?>">

    </div>
  </div>
  <div class="justify-content-center align-item-center divbtnreserve">
    <button type="submit" class="reservebtn btn btn-primary" name="booktick">BOOK TICKETS</button>
  </div>
</form>
