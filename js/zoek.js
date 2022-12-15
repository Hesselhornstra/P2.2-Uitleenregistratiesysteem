$(document).ready(function(){
    $("#zoekinput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".alleartikelen .artikel").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
function categorie(cate){
    location.href = `?categorie=`+cate;
}
function locatie(cate, loc){
    location.href = `?categorie=`+cate+`&zoek=`+loc;
}
function terug(){
    location.href = `/`;
}