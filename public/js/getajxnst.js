function getajxnst(date,judul){
  var selectedDate = date;
  var selectedJudul = judul;

  var showselecan = document.getElementById('showselecan');
    var xhr = new XMLHttpRequest();


    xhr.onreadystatechange = function(){
      if( xhr.readyState == 4 && xhr.status == 200){
        showselecan.innerHTML = xhr.responseText;
      }
    }
    xhr.open('GET', 'http://localhost/cine/public/ajax/jamtayang_ajax.php?date=' + selectedDate + '&judul=' + selectedJudul, true);
    xhr.send();

}
