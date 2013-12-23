
$(".timespan").click(function(event) {

    var state = $(this).attr("id");

    $("#"+state+"_description").slideToggle("slow");

    $.ajax({
            type: "POST",
            url: "/wikipedia_description.php",
            data: { "state_identifier" : state },
            success: function(response) { 

                // Enject the results received from process.php into the results div
                $("#"+state+"_description").html(response);
            }
            
        });

});

$(".clickable_container").click(function(event) {

    $(this).css("background-color", "yellow");

});

// var timespan_clicked = 0;
// var timespan_height
// var timespan_width

// $(".timespan").click(function(event) {
//     var state = $(this).attr("id");

//     if (timespan_height != "301px") {
//     //if (timespan_clicked == 0) {

//         timespan_clicked = 1;
//         timespan_height = $(this).css("height");
//         timespan_width = $(this).css("width");

//     	if ($(this).width() < 300) { $(this).animate({width: "300px"}, "slow"); }
//         $(this).animate({height: "300.5px"}, "slow");    

//     	$.ajax({
//             type: "POST",
//             url: "/wikipedia_description.php",
//             data: { "state_identifier" : state },
//             success: function(response) { 

//                 // Enject the results received from process.php into the results div
//                 $("#"+state+"_description").html(timespan_height);//(response);
//             }
            
//         });

//     }

//     else {
//         timespan_clicked = 0;

//         $(this).css("height", timespan_height);
//         $(this).css("width", timespan_width);
//         $("#"+state+"_description").html(timespan_height);

//     }

// });

// var clicked = 0;

// $("#Turkic_Khaganate").click(function(event) {
    
//     var timespan_width = $(this).css("width");

//     if (clicked == 0) {
//         $(this).css("width", "300px");
//         clicked = 1;
//     }

//     else {
//         $(this).css("width", "192px");
//         clicked = 0;
//     }
    
// });
