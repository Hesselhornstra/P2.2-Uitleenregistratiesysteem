$(document).ready(function(){
    $("#zoekinput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".alleartikelen .artikel").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

function locatie(loc) {
    location.href = `?id=`+loc;
}