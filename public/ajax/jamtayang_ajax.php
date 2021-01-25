<?php
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

$date = $_GET["date"];
$judul = $_GET["judul"];


$takelokasi = query("SELECT DISTINCT lokasi FROM nowshowing WHERE judul = '$judul' AND datetime  LIKE '$date%' ORDER BY datetime ASC");

if ($takelokasi != NULL) {
  $i=0; foreach ($takelokasi as $tkl) {
    $gruplokasi[$i] = $tkl['lokasi'];
    $i++;
  }

  $i=0; foreach ($gruplokasi as $grl) {
  $nstgruplokasi[$i] = query("SELECT * FROM nowshowing WHERE judul = '$judul' AND datetime  LIKE '$date%' AND lokasi ='$grl' ORDER BY datetime ASC");
  $i++;
  }
}else {
  $nstgruplokasi = NULL;
}
?>




  <div class="" style="max-width:300px;">
    <h5 class="fcol-gray h5-pickshow">Pick Show</h5>
    <?php if ($takelokasi != NULL || $nstgruplokasi != NULL): ?>
    <div class="" data-toggle="buttons">




      <?php $i=0; foreach ($nstgruplokasi as $ngl): ?>
        <hr style="border-width:2px;">

      <?= '<h3 class="lokbioskop">' . $takelokasi[$i]['lokasi'] . "</h3>" ?>
      <?php $i++ ?>

      <div class="btn-group-toggle time-list lokbioskop">

        <?php foreach ($ngl as $nst): ?>


        <label style="margin:5px;" class="btn btn-secondary" onclick="getchair('<?= $nst['id'] ?>','<?= $nst['studio'] ?>','<?= $nst['lokasi'] ?>')">
          <input type="radio" name="showchosen" value="<?= $nst['id'] ?>">
          <?php $nstexplode  = $nst['datetime'];
                          $nstexploded = explode(" ", $nstexplode);

                          $nstexplode = $nstexploded[1];
                          $hhmmexploded = explode(":", $nstexplode);
                          $hhmm = $hhmmexploded[0] . ":" . $hhmmexploded[1];
                        ?>

          <?= $hhmm ?>
        </label>

        <?php endforeach; ?>
      </div>
      <?php endforeach; ?>

      <hr style="border-width:2px;">
    </div>
    <?php else: ?>
      <br>
    <?php echo '<p style="position:relative; left:-5px;">No Show for Today</p> <hr style="border-width:2px;">' ?>
    <?php endif; ?>
  </div>
