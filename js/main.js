function eateregg(){
    setTimeout(function(){
    var the_box = document.getElementById("eateregg");
    var the_blc = document.getElementById("eastteregg");
    var the_but = document.getElementById("eateregb");
    if (the_box.classList.contains("easteregg")) {
      the_box.classList.remove("easteregg");
      the_but.classList.remove("easteregg");
      the_blc.classList.remove("easteregg");
    } else {
      the_box.classList.add("easteregg");
      the_but.classList.add("easteregg");
      the_blc.classList.add("easteregg");
    }}, 180);
}