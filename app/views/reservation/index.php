<?php
$takelokasi = $data['takelokasi'];
$nstgruplokasi = $data['nowshowingchosen'];
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
<script src="<?= BASEURL ?>/js/moviedetail.js" charset="utf-8"></script>


<div class="infoo" style="background-image: url('<?= $data['coverimg'][0]['coverimg'] ?>')">
</div>

<div class="container" style="height:0; z-index:10">
  <div class="umur">
    <?php if ($data['umur'][0]['umur'] == "D17+") {
      echo '<p class="p-umurd">D</p><p class="p-umurdd">17+</p>';
    }else{
      echo '<p class="p-umur" >';
      echo $data['umur'][0]['umur'];
      echo '</p>';
    }  ?></p>
  </div>
  <p class="p-rating">8.5 IMDb  &nbsp;|&nbsp; 65 Tomato</p>
</div>

<div class="" style="z-index: 10;">
  <h2 class="judulpilm"><?= $data['judul'] ?></h2>
  <?php if ($data['subjudul'][0]['subjudul'] != NULL): ?>
      <h3 class="subjudulpilm"><?= $data['subjudul'][0]['subjudul'] ?></h3>
  <?php endif; ?>


</div>

<div style="z-index:10;" class="container-fluid div-pilih-tanggal row d-flex justify-content-center">
  <div class="" style="max-width:300px;">

    <div class="btn-group-toggle time-list" data-toggle="buttons">
      <label style="margin:5px;
        background-color: rgba(0,0,0,0) !important;" class="bg-white btn btn-secondary btn-hari-tanggal">
        <h5 class="fcol-gray">Pick <br> Date</h5>
      </label>
      <?php $i=0; ?>
      <?php foreach ($data['sevendays'] as $svd): ?>
      <?php

          if ($i == 0) {
            $activate = "active";
          }else{
            $activate = NULL;
          };
          $i++;
          ?>
      <label style="z-index:3;" class="btn btn-secondary btn-hari-tanggal <?= $activate ?>" onclick="getajxnst('<?= $svd['value'] ?>','<?= $svd['judul'] ?>'); getchair(0,0,0)">
        <input type="radio" name="options" id="option1" autocomplete="off">
        <p class="phari">
          <?php echo substr($svd['l'],0,3);
                ?>
        </p>
        <p class="ptanggal">
          <?= $svd['d'] ?>
        </p>
      </label>

      <?php endforeach; ?>
    </div>
  </div>


</div>


<div style="z-index:3; padding-left:50px; padding-top:40px;" id="showselecan" class="container-fluid div-pilih-tanggal row d-flex">

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
</div>




<div class="container">
  <h5 class="fcol-gray h5-pickseat" style="padding-top:30px;">Pick Seat</h5>
<div class="container" id="seatdiv">
  <p style="position:relative; left: 20px;">select showtime to view seat <br>availability</p>
</div>
</div>


<script type="text/javascript">
  var angka = 0;

  function totalan(hehe) {
    var hehehe = hehe;
    var kursi = document.getElementById(hehehe).classList.contains('active');
    if (document.getElementById(hehehe).classList.contains('unavailable') != true) {
      if (kursi == false) {
        angka = angka + 1;
      } else {
        angka = angka - 1;
      }
    }


    var harga = 50000 * angka;
    console.log(harga);
  }


  /* Jquery Disable Button if Textarea is empty */

  $(document).ready(function() {
    $('input[type="submit"]').attr('disabled', true);
    $('input[type="checkbox"]').on('keyup', function() {

      var text_value = $('input[name="seatnum"]').val();
      if (text_value != '') {
        $('input[type="submit"]').attr('disabled', false);
      } else {
        $('input[type="submit"]').attr('disabled', true);
      }
    });
  });
</script>
