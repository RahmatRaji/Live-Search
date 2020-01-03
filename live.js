function showResult() { //my onKeyUp listener
  var item = document.getElementById('search').value;

  if (item == "") {
    document.getElementById("results").innerHTML = "";
    return 0;
  }

  var x = new XMLHttpRequest();
  x.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("results").innerHTML=this.responseText;
      var results = JSON.parse(this.responseText);
      var product =" ";
      for (var i = results.length - 1; i >= 0; i--) {
        product = product+results[i].product_title +"  " +"<br>"+ "<br>";
      }
      document.getElementById("results").innerHTML = product;
    
  }

};
x.open("POST", "livesearch.php?item="+item, true);
x.send();
}