<?php
if ($_SESSION==NULL) {

    if( isset($_POST["login"]) ) {
     if( ($_SESSION)==NULL ) {


          $username = $_POST["username"];
          $password = $_POST["password"];

          $this->db = new Database;
          $this->db->query("SELECT * FROM auths WHERE username = '$username'");
          $authing = $this->db->resultSet();


          // cek username
          if( $authing != NULL ) {
            //
            // var_dump($authing);

            // cek password
            if( password_verify($password, $authing[0]["password"]) ) {
              // set session

              $_SESSION["login"] = true;
              $_SESSION['username'] = $username;
                echo '<script> alert("selamat datang"); </script>';
            }else {
              echo '<script> alert("password salah"); </script>';
              }
          }else {
          //
            echo '<script> alert("belum terdaftar"); </script>';
          //   $error = true;
          //
        }}
        else {
          echo '<script> alert("logged out"); </script>';
        $_SESSION = [];
        session_unset();
        session_destroy();
      }

    }
  }

  else {
    if( isset($_POST["logout"]) ) {
    echo '<script> alert("logged out"); </script>';
  $_SESSION = [];
  session_unset();
  session_destroy();
}
}





 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['judul']; ?></title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/carou.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/flickity.css"  media="screen">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">

        <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASEURL; ?>fontawesome/css/all.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container navbarcontainer">
      <a class="navbar-brand" id="judull" href="<?= BASEURL; ?>">Cinéapps</a>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-secondary btnlogin" data-toggle="modal" data-target="#exampleModalCenter">
        <img class="imglogin" src="https://image.flaticon.com/icons/svg/1000/1000997.svg" width="28px" height="28 px" alt="">
      </button>

  </div>
</nav>

<div class="linkatas">
  <a class="alink" href="#">Home</a>
  <a class="alink" href="#">About</a>
  <a class="alink" href="#">Contact</a>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <?php if ($_SESSION == NULL): ?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Get into your account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="" method="post">
              <div class="form-group">


            			<label for="username">Username :</label>
            			<input class="form-control" type="text" name="username" id="username"><br>

            			<label for="password">Password :</label>
            			<input class="form-control" type="password" name="password" id="password">

            			<input class="form-check-input checkcookie" type="checkbox" name="remember" id="remember">
            			<label for="remember">Remember me</label>

            </div>

        </div>
        <div class="modal-footer">
          <a href="#" style="padding-right:5px;">Sign Up</a>
          <button type="submit" class="btn btn-primary" name="login">Log In</button>
        </div>
      </form>
      <?php else: ?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Account Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3><?= $_SESSION['username'] ?></h3>
          <form class="" action="index.html" method="post">
            <button type="submit" class="btn btn-primary" name="logout">Log Out</button>
          </form>
        </div>

      <?php endif; ?>
    </div>
  </div>
</div>


<script type="text/javascript">
  window.addEventListener('scroll', scrollFunc);

  function scrollFunc() {
    var judull = document.getElementById('judull');
    var scrolled = window.pageYOffset;
    if (scrolled > 56) {
      scrolled = 56;
    }

    var rate3 = -1.8035 * scrolled;
    var rate2 = -2.8035 * scrolled;
    var rate = -0.0071428 * scrolled + 1;
    judull.style.transform = 'scale(' + rate + ') translateY(' + rate2 + 'px) translateX(' + rate3   + 'px)';
  }

</script>
