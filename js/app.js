$(".timespan").click(function(event) {

    var state = $(this).attr("id");

    $("#"+state+"_description").slideToggle("slow");

    $.ajax({
            type: "POST",
            url: "/wikipedia_descriptions",
            data: { "state_identifier" : state },
            success: function(text) { 

                // Enject the results received from process.php into the results div
                $("#"+state+"_description").html(text);
            }
            
        });

});