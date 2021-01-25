<?php echo " <br>";
$data = $_POST;
// $i = 0;
// foreach ($data['seatnum'] as $stn) {
//
//   $dataeach[$i] = $data;
//   $dataeach[$i]['seatnum'] = $stn;
//   $i++;
// }
//
// var_dump($dataeach[0]);
 ?>
 <div class="container">
   <form action="<?= BASEURL; ?>/reservation/order" method="post">
       <input  type="text" name="showid" value="<?= $data['showid'] ?>">

       <?php $i =0; foreach ($data['seatnum'] as $stn): ?>
          <input  type="text" name="seatnum[<?php echo $i; $i++; ?>]" value="<?= $stn ?>">
       <?php endforeach; ?>
       <input  type="text" name="pemesan" value="<?= $_SESSION['username'] ?>">

       <button type="submit" name="button">submit</button>

  </form>
</div>
<!--
   echo $data['bookingcode'] . " <br>";
   echo $data['showid'] . " <br>" ;
   echo $stn;
   echo "<br>" . $data['pemesan'] . "<br>"  . "<br>" ; -->
