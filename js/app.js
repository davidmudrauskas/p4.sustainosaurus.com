$(".timespan").click(function(event) {
	
    state = $(this).attr("id");
	$("#"+state).css("height", "300px");
	$("#"+state).css("width", "300px");

	// $.ajax({
 //        type: 'POST',
 //        url: 'wikipedia_description.php',
 //        success: function(response) { 

 //            // Enject the results received from process.php into the results div
 //            $('#Turkic_Khaganate_description').html(response);
 //        },
 //    }); // end ajax setup

});