<?php

class NowShowing_model {
    private $table = 'nowshowing';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //methods

    public function getAllShow()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();

    }

    public function getAllShowUnique()
    {
      $this->db->query('SELECT DISTINCT judul, subjudul, imageurl, genre, umur FROM ' . $this->table . ' ORDER BY judul ASC');
      $unique = $this->db->resultSet();
        $i=0;
        foreach ($unique as $key) {
          $genreexplode = explode(", ",$unique[$i]['genre']);
          $unique[$i]['genre'] = $genreexplode[0];
          $i++;
      }  return $unique;
    }

    public function takeLokasi($judul)
    {
      $judul = $judul;
      $lok = "lokasi";
      // $dateobj = new DateTime('today');
      $date = "2020-02-28";//$dateobj->format('Y-m-d');//defaultdate is today
      $this->db->query("SELECT DISTINCT $lok FROM $this->table WHERE judul = :judul AND datetime  LIKE :tanggal ORDER BY datetime ASC");
      $this->db->bind('judul', $judul);
      $this->db->bind('tanggal', $date . "%");

      $takelokasi = $this->db->resultSet();
      if ($takelokasi == NULL) {
        return NULL;
      }
      else{
        return $takelokasi;
      }
    }

    public function takeColumn($key,$judul)
    {
      $this->db->query("SELECT DISTINCT $key FROM $this->table WHERE judul = :judul");
      $this->db->bind('judul', $judul);
      $takecolumn = $this->db->resultSet();
      return $takecolumn;
    }

    public function getOneShow($judul)
    {

      $lok = "lokasi";
      // $dateobj = new DateTime('today');
      // $date = $dateobj->format('Y-m-d');//defaultdate is today
      $date = "2020-02-28";
      $takelokasi =  $this->takeLokasi($judul);

      if ($takelokasi!=NULL) {
        $i=0; foreach ($takelokasi as $tkl) {
          $gruplokasi[$i] = $tkl['lokasi'];
          $i++;
        }

        $i=0; foreach ($gruplokasi as $grl) {
          $this->db->query("SELECT * FROM $this->table WHERE judul = :judul AND datetime  LIKE :tanggal AND lokasi =:grl ORDER BY datetime ASC");
          $this->db->bind('judul', $judul);
          $this->db->bind('tanggal', $date . "%");
          $this->db->bind('grl', $grl);


          $nstgruplokasi[$i] = $this->db->resultSet();
          $i++;
        }
          return $nstgruplokasi;
      }else {
        return NULL;
      }
    }

    public function get7Days($judul)
    {
      //$dateobj = new DateTime('today');
      $day7[0] = "2020-02-28-Friday";//$dateobj->format('Y-m-d-l');
      //$dateobj = new DateTime('tomorrow');
      $day7[1] = "2020-02-29-Saturday";//$dateobj->format('Y-m-d-l');
      //$dateobj = new DateTime('+2 day');
      $day7[2] = "2020-03-01-Sunday";//$dateobj->format('Y-m-d-l');
      //$dateobj = new DateTime('+3 day');
      $day7[3] = "2020-03-02-Monday";//$dateobj->format('Y-m-d-l');
      //$dateobj = new DateTime('+4 day');
      $day7[4] = "2020-03-03-Tuesday";//$dateobj->format('Y-m-d-l');
      //$dateobj = new DateTime('+5 day');
      $day7[5] = "2020-03-04-Wednesday";//$dateobj->format('Y-m-d-l');
      //$dateobj = new DateTime('+6 day');
      $day7[6] = "2020-03-05-Thursday";//$dateobj->format('Y-m-d-l');

      for ($i=0; $i < 7; $i++) {
        $day7exploded[$i] = explode("-",$day7[$i]);
        $dayseven[$i]['Y'] =  $day7exploded[$i][0];
        $dayseven[$i]['value'] =  $day7exploded[$i][0] . "-" . $day7exploded[$i][1] . "-" . $day7exploded[$i][2];
        switch ($day7exploded[$i][1]) {
          case '01':  $day7exploded[$i][1] = "JAN";
            break;
          case '02':  $day7exploded[$i][1] = "FEB";
            break;
          case '03':  $day7exploded[$i][1] = "MAR";
            break;
          case '04':  $day7exploded[$i][1] = "APR";
            break;
          case '05':  $day7exploded[$i][1] = "MAY";
            break;
          case '06':  $day7exploded[$i][1] = "JUN";
            break;
          case '07':  $day7exploded[$i][1] = "JUL";
            break;
          case '08':  $day7exploded[$i][1] = "AUG";
            break;
          case '09':  $day7exploded[$i][1] = "SEP";
            break;
          case '10':  $day7exploded[$i][1] = "OCT";
            break;
          case '11':  $day7exploded[$i][1] = "NOV";
            break;
          case '12':  $day7exploded[$i][1] = "DES";
            break;
        }

        $dayseven[$i]['m'] =  $day7exploded[$i][1];
        $dayseven[$i]['d'] =  $day7exploded[$i][2];
        $dayseven[$i]['l'] =  $day7exploded[$i][3];

          $dayseven[$i]['judul'] = $judul;
      }


      return $dayseven;
    }
    public function tambahreservasi($data, $bkcdhash)
    {
      var_dump($data);
        $query = "INSERT INTO reserved
                    VALUES
                  ('', :bookingcode, :showid, :seat, :pemesan)";

        $this->db->query($query);


        foreach ($data['seatnum'] as $stn) {
          $this->db->bind('bookingcode', $bkcdhash);
          $this->db->bind('showid', $data['showid']);
          $this->db->bind('seat', $stn);
          $this->db->bind('pemesan', $data['pemesan']);
          $this->db->execute();
        }


        return $this->db->rowCount();
    }

}
