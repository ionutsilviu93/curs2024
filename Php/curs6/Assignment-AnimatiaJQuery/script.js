$(document).ready(function() {
    // Animatie pentru mutarea celor patru obiecte
    $(".box").animate({
        left: "+=200px",
        top: "+=200px"
    }, 2000);

    // Modificare mărime la clic pe primul obiect
    $("#box1").click(function() {
        $(this).animate({
            width: "150px",
            height: "150px"
        }, 500);
    });

    // Modificare culoare la trecerea mouse-ului peste al treilea obiect
    $("#box3").hover(function() {
        $(this).css("background-color", "purple");
    }, function() {
        $(this).css("background-color", "blue");
    });
});
