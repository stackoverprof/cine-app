function getchair(id,studio,lokasi){
  var selectedId = id;
  var selectedStudio = studio;
  var selectedLokasi = lokasi;
  var seatdiv = document.getElementById('seatdiv');

if (selectedId == 0 && selectedStudio == 0  && selectedLokasi == 0) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if( xhr.readyState == 4 && xhr.status == 200){
        seatdiv.innerHTML = xhr.responseText;
      }
    }
    xhr.open('GET', 'http://localhost/cine/public/ajax/seatingdefault.php', true);
    xhr.send();
}else {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if( xhr.readyState == 4 && xhr.status == 200){
        seatdiv.innerHTML = xhr.responseText;
      }
    }
    xhr.open('GET',  'http://localhost/cine/public/ajax/seating' + studio + '_ajax.php?key=' + selectedId, true);
    xhr.send();
}



}
