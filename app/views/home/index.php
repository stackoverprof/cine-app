<script src="<?= BASEURL; ?>/js/carou.js"></script>
<script src="<?= BASEURL; ?>/js/flickity.pkgd.js"></script>

<div class="divjudul container-fluid">
  <p class="tagline" id="tagline">Ticketing made easier</p>
  <p class="hurufblkg">ciné</p>
</div>


<!-- Flickity HTML init -->
<div class="carousel " data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "freeScroll": true, "wrapAround": true }' style="
position: relative !important;
top: -24px !important;">
  <div class="carousel-cell">
    <div class="pad16" style="background-image: url('https://image.freepik.com/free-vector/people-watching-movie-cinema-hall-interior-cartoon-family-theater-vector-concept_53562-7915.jpg') !important;"> </div>
  </div>
  <div class="carousel-cell">
    <div class="pad16" style="background-image: url('https://cdn.dribbble.com/users/1627881/screenshots/8325636/2020_4x.jpg') !important;">
    </div>
  </div>
  <div class="carousel-cell">
    <div class="pad16" style="background-image: url('https://id.bmscdn.com/showcaseimage/eventimage/lalala-festival-2020-29-01-2020-05-14-52-747.jpg') !important;">
    </div>
  </div>
  <div class="carousel-cell">
    <div class="pad16" style="background-image: url('https://img.freepik.com/free-vector/one-day-flash-sale-concept-banner-flat-style_98396-1628.jpg?size=626&ext=jpg') !important;"> </div>
  </div>
  <div class="carousel-cell">
    <div class="pad16" style="background-image: url('https://image.freepik.com/free-vector/flat-food-background_23-2148051159.jpg') !important;"></div>
  </div>

</div>



<!-- Controls -->
<div class="left carousel-control">
  <a href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
</div>
<div class="right carousel-control">
  <a href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

</div>
</div>
</div> 
<div class="container nowshowdiv" style="background-image: url('')">
  <div class="geseratas">

    <div class="row" style="padding: 0 14px;">
      <div class="col-6">
        <h2>N O W <br> S H O W I N G</h2>
      </div>
      <div class="col-6">
        <select class="custom-select" name="">
          <option>Semarang</option>
          <option>Solo</option>
          <option>Yogyakarta</option>
        </select>
      </div>
    </div>
    <?php $i = 0; foreach( $data['nowshowingunique'] as $nsw ) : ?>
    <div class="card<?= $i ?> card glass card-bg-blur mb-3">
      <div class="row no-gutters no-gutters2">
        <div class="col-3 no-gutters2">
          <div class="card-img" style="background-image:url('<?= $nsw['imageurl'] ?>')">
          </div>
        </div>
        <div class="col-9 no-gutters2">
          <div class="card-body">
            <h4 class="card-title card-main-title"><?php
                  if (strlen($nsw['judul'])>15) {
                    echo substr($nsw['judul'],0,15) . "...";
                  }else {
                    echo $nsw['judul'];
                  }?></h5>
              <h6 class="card-title"><?php
                  if ($nsw['subjudul']) {
                    echo $nsw['subjudul'];
                  }else {
                    echo "&emsp;";
                  }

                  ?></h6>
              <p class="card-text card-text-genre"><small class="text-muted"><?= $nsw['genre'] ?></small></p>
              <p class="card-text card-text-umur"><?= $nsw['umur'] ?></p>
              <?php
                    $paramjudul = str_replace(' ', '_', $nsw['judul']); ?>
              <form method="post" class="card-form" action="<?= BASEURL; ?>/reservation/<?= $paramjudul ?>">
                <div onclick="this.parentNode.submit();" class="buytick">
                  <input type="hidden" name="judul" value="<?= $nsw['judul'] ?>" />
                  <button type="submit" name="button" class="btnbuy">BOOK NOW! </button>
                </div>
              </form>

          </div>
        </div>
      </div>
    </div> <?php if ($i == 4) {
            break;
          } ?>
    <?php $i++; endforeach; ?>



  </div>
</div>

<script type="text/javascript">
  window.addEventListener('scroll', scrollFunc);

  function scrollFunc() {
    var tagline = document.getElementById('tagline');
    var scrolled = window.pageYOffset;
    if (scrolled != 0) {
      tagline.style.transform = 'translateY( 200px)';
      tagline.style.color = 'white';
    } else {
      tagline.style.transform = 'translateY( 0px)';
      tagline.style.color = 'gray';
    }
  }
</script>
