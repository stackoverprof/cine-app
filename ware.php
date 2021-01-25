//
// function booktick($data)
// {
// global $conn;
// //ngambil masing masing data dr form
// $seatnum = htmlspecialchars($data["seatnum"]);
// $bookingcode = htmlspecialchars($data["bookingcode"]);
// $showid = htmlspecialchars($data["showid"]);
// $pemesan = htmlspecialchars($data["pemesan"]);
//
// //query insert Data
// $query = "INSERT INTO reserved
// VALUES
// ('', upper('$bookingcode'), '$showid', '$seatnum', '$pemesan' )";
// mysqli_query($conn, $query);
//
// return mysqli_affected_rows($conn);
// }
//
// if (isset($_POST["booktick"])) {
// if (booktick($_POST)>0){
// echo "
// <script>
  //           alert('data berhasil diubah!');
  //
</script>";
// }else{
// echo "
// <script>
  //           alert('data gagal diubah!');
  //
</script> ";
// }
// }

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js" charset="utf-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" charset="utf-8"></script> -->


<!-- <div class="container">
	<div class="row">
		<div class="col-xs-11 col-md-10 col-centered">

			<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
				<div class="carousel-inner">
					<div class="item active">
						<div class="carousel-col">
							<div class="block red img-responsive"></div>
						</div>
					</div>
					<div class="item">
						<div class="carousel-col">
							<div class="block green img-responsive"></div>
						</div>
					</div>
					<div class="item">
						<div class="carousel-col">
							<div class="block blue img-responsive"></div>
						</div>
					</div>
					<div class="item">
						<div class="carousel-col">
							<div class="block yellow img-responsive"></div>
						</div>
					</div>
				</div>-->


<!--
<div class="container">
<div class="row  containingcarou">
  <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
          <div class="MultiCarousel-inner">

            <div class="item" style="width: 290px !important">
                <div class="pad16" style="background-image: url('https:/id.bmscdn.com/showcaseimage/eventimage/one-infinity-1-26-02-2020-11-28-01-693.jpg') !important;">
                </div>
            </div>
            <div class="item" style="width: 290px !important">
                <div class="pad16" style="background-image: url('https://id.bmscdn.com/showcaseimage/eventimage/formula-1-singapore-airlines-singapore-grand-prix-2020-18-02-2020-02-42-04-514.jpg') !important;">
                </div>
            </div>
              <div class="item" style="width: 290px !important">
                  <div class="pad16" style="background-image: url('https://id.bmscdn.com/showcaseimage/eventimage/lalala-festival-2020-29-01-2020-05-14-52-747.jpg') !important;">
                  </div>
              </div>
          </div>
          <button class="btn btn-primary leftLst"><</button>
          <button class="btn btn-primary rightLst">></button>
      </div>
</div> -->

.col-centered {
float: none;
margin: 0 auto;
}

.carousel-control {
width: 8%;
width: 0px;
}
.carousel-control.left,
.carousel-control.right {
margin-right: 40px;
margin-left: 32px;
background-image: none;
opacity: 1;
}
.carousel-control > a > span {
color: white;
font-size: 29px !important;
}

.carousel-col {
position: relative;
min-height: 1px;
padding: 5px;
float: left;
}

.active > div { display:none; }
.active > div:first-child { display:block; }

/*xs*/
@media (max-width: 767px) {
.carousel-inner .active.left { left: -50%; }
.carousel-inner .active.right { left: 50%; }
.carousel-inner .next { left: 50%; }
.carousel-inner .prev { left: -50%; }
.carousel-col { width: 50%; }
.active > div:first-child + div { display:block; }
}

/*sm*/
@media (min-width: 768px) and (max-width: 991px) {
.carousel-inner .active.left { left: -50%; }
.carousel-inner .active.right { left: 50%; }
.carousel-inner .next { left: 50%; }
.carousel-inner .prev { left: -50%; }
.carousel-col { width: 50%; }
.active > div:first-child + div { display:block; }
}

/*md*/
@media (min-width: 992px) and (max-width: 1199px) {
.carousel-inner .active.left { left: -33%; }
.carousel-inner .active.right { left: 33%; }
.carousel-inner .next { left: 33%; }
.carousel-inner .prev { left: -33%; }
.carousel-col { width: 33%; }
.active > div:first-child + div { display:block; }
.active > div:first-child + div + div { display:block; }
}

/*lg*/
@media (min-width: 1200px) {
.carousel-inner .active.left { left: -25%; }
.carousel-inner .active.right{ left: 25%; }
.carousel-inner .next { left: 25%; }
.carousel-inner .prev { left: -25%; }
.carousel-col { width: 25%; }
.active > div:first-child + div { display:block; }
.active > div:first-child + div + div { display:block; }
.active > div:first-child + div + div + div { display:block; }
}

.block {
width: 306px;
height: 230px;
}

.red {background: red;}

.blue {background: blue;}

.green {background: green;}

.yellow {background: yellow;}





public function ajaxGetDay()
{
$judul = $_POST['judul'];
$dtme = $_POST['date'];
$dtme = explode(" ",$dtme);
$query = 'SELECT * FROM ' . $this->table . ' WHERE judul=:judul AND datetime=:dtme ORDER BY datetime ASC';
$this->db->query($query);
$this->db->bind('judul', $judul);
$this->db->bind('dtme', $dtme[0]);
echo $dtme[0];
return $this->db->resultSet();
}



// $day = "2020-02-28";
// $query = 'SELECT * FROM ' . $this->table . ' WHERE judul=:judul AND datetime LIKE :date ORDER BY datetime ASC';
// $this->db->query($query);
// $this->db->bind('judul', $judul);
// $this->db->bind('date', $day."%");


<!-- <?php foreach ($takelokasi as $tkl): ?>
  <?php if ($tkl['lokasi'] == $nst['lokasi']){
    echo "<h2>" . $nst['lokasi'] . "</h2>";
    unset($tkl['lokasi']);
    break;
  }?>
<?php endforeach; ?> -->





//
// $i=0;
// foreach ($takelokasi as $key) {
// unset($takelokasi[$i]['id']);
// unset($takelokasi[$i]['judul']);
// unset($takelokasi[$i]['subjudul']);
// unset($takelokasi[$i]['studio']);
// unset($takelokasi[$i]['datetime']);
// unset($takelokasi[$i]['genre']);
// unset($takelokasi[$i]['imageurl']);
// unset($takelokasi[$i]['umur']);
//
// $i++;
// // remains = lokasi
// }
//
//
// $i=0;
// $j=0;
// error_reporting(0);
// foreach ($takelokasi as $key)
// {
// if($takelokasi[$i]!=$takelokasi[$i+1]){
// $takenlokasi[$j]=$takelokasi[$i];
// $j++;
// }
// $i++;
// }


// call_user_func_array(['Reservation'->controller, 'index'->method], $this->params);

// require_once 'http://localhost/cine/app/core/App.php';
// $app = new App;
// $haha = $app->forajax();










<!-- <label style="margin:5px;" class="btn btn-secondary btn-hari-tanggal">
  <input type="radio" name="options" id="option1" value="" onclick="getval(this)">
  <p class="phari">
    <?php echo substr($svd['l'],0,3);
    ?>
  </p>
  <p class="ptanggal">
    <?= $svd['d'] ?>
  </p>

</label> -->







<!-- <div class="container-fluid">
  <div class="btn-group btn-group-toggle time-list" data-toggle="buttons">
  <?php $test = array_column($data['nowshowingchosen'],'judul');

  ?>

  <?php foreach ($data['nowshowingchosen'] as $nsc) :?>

    <label style="margin:5px;" class="btn btn-secondary">
      <input type="radio" name="options" id="option1" value="<?= $nsc['datetime'] ?>" onclick="getval(this)">

        <?php $nscexplode  = $nsc['datetime'];
          $nscexploded = explode(" ", $nscexplode);

          $nscexplode = $nscexploded[1];
          $hhmmexploded = explode(":", $nscexplode);
          $hhmm = $hhmmexploded[0] . ":" . $hhmmexploded[1];
        ?>

          <?= "$hhmm" ?>
    </label>
  <?php endforeach; ?>
  </div>

</div> -->









<form class="" action="index.html" method="post">
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>

    <?php  $judul = array_column($data['nowshowing'],'judul');
        $judul = array_unique($judul);
        ?>

    <?php foreach( $judul as $jdl ) : ?>
    <label style="margin:5px;" class="btn btn-secondary">
      <input type="radio" name="options" checked>
      <?= $jdl ?>
    </label>
    <?php endforeach; ?>
  </div>



  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>

    <?php  $judul = array_column($data['nowshowing'],'jamtayang');
        $judul = array_unique($judul);
        ?>

    <div class="btn-group-toggle" data-toggle="buttons">
      <?php foreach( $judul as $jdl ) : ?>
      <label style="margin:5px;" class="btn btn-secondary">
        <input type="radio" name="options" checked>
        <?= $jdl ?>
      </label>
      <?php endforeach; ?>
    </div>



  </div>
</form>

</div>



<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="carousel123">
        <div class="carousel-inner">

          <div class="item">
            <div class="card" style="width: 18rem;">
              <img src="https://m.media-amazon.com/images/M/MV5BM2I0NDU0NzQtNTViMS00NDQxLWIxMzYtZmM0NDQ0YzUyN2I2XkEyXkFqcGdeQXVyNzEzNjU1NDg@._V1_UY268_CR2,0,182,268_AL_.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card" style="width: 18rem;">
              <img src="https://m.media-amazon.com/images/M/MV5BM2I0NDU0NzQtNTViMS00NDQxLWIxMzYtZmM0NDQ0YzUyN2I2XkEyXkFqcGdeQXVyNzEzNjU1NDg@._V1_UY268_CR2,0,182,268_AL_.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card" style="width: 18rem;">
              <img src="https://m.media-amazon.com/images/M/MV5BM2I0NDU0NzQtNTViMS00NDQxLWIxMzYtZmM0NDQ0YzUyN2I2XkEyXkFqcGdeQXVyNzEzNjU1NDg@._V1_UY268_CR2,0,182,268_AL_.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel123" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#carousel123" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
    </div>
  </div>

  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option1" value="<?= $nsc['datetime'] ?>">
    <?php $nscexplode  = $nsc['datetime'];
        $nscexploded = explode(" ", $nscexplode);

        $nscexplode = $nscexploded[1];
        $hhmmexploded = explode(":", $nscexplode);
        $hhmm = $hhmmexploded[0] . ":" . $hhmmexploded[1];
        ?>
    <?= $hhmm ?>
  </label>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
          <div class="MultiCarousel-inner">
            <?php  $judul = array_column($data['nowshowing'],'judul');
              $judul = array_unique($judul);
              ?>

            <?php foreach( $judul as $jdl ) : ?>
            <div class="item">
              <div class="pad15">
                <div class="imgwrp">
                  <img src="https://m.media-amazon.com/images/M/MV5BM2I0NDU0NzQtNTViMS00NDQxLWIxMzYtZmM0NDQ0YzUyN2I2XkEyXkFqcGdeQXVyNzEzNjU1NDg@._V1_UY268_CR2,0,182,268_AL_.jpg" class="card-img-top" alt="...">
                </div>
                <form method="post" action="<?= BASEURL; ?>/reservation">
                  <div onclick="this.parentNode.submit();" class="buytick">
                    <input type="hidden" name="judul" value="<?= $jdl ?>" />
                    <button type="submit" name="button" class="btnbuy">BUY TICKET</button>
                  </div>
                </form>
              </div>
              <p class="jdl text-center mt-2"><?= $jdl ?></p>
            </div>
            <?php endforeach; ?>
          </div>
          <button class="btn btn-primary leftLst">
            << /button>
              <button class="btn btn-primary rightLst">></button>
        </div>

      </div>
    </div>
  </div>
  .card-body{
  padding: 0.6rem;
  background-color: rgba(0,0,0,0);
  }
  .card-bg-blur-disabled {
  content: "";
  background-image: url("https://m.media-amazon.com/images/M/MV5BM2I0NDU0NzQtNTViMS00NDQxLWIxMzYtZmM0NDQ0YzUyN2I2XkEyXkFqcGdeQXVyNzEzNjU1NDg@._V1_UY268_CR2,0,182,268_AL_.jpg");
  background-size: cover;
  background-position: center;
  backdrop-filter: blur(10px);
  }
