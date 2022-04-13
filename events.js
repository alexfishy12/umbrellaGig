$(document).ready(function(){
    generateEventList();

    $("#searchForm").on("change", function(){
        alert("Hi.");
    });
});

function generateEventList()
{
    for(var i=0; i<3; i++)
    {
        $("#eventList").append("<div class='col'>" +
            "<div class='card shadow-sm'>" +
                "<img class='card-img-top' src='pictures/bar.jpg' alt='Bar' height='225'>" +
                "<div class='card-body'>" +
                    "<p class='card-text'>J.T. is performing his newly released album live from 8pm-10pm</p>" +
                    "<div class='d-flex justify-content-between align-items-center'>" +
                    "<div class='btn-group'>" +
                        "<button type='button' class='btn btn-sm btn-outline-secondary'>View Entertainer</button>" +
                        "<button type='button' class='btn btn-sm btn-outline-secondary'>View Venue</button>" +
                    "</div>" +
                    "<small class='text-muted'>New York, NY</small>" +
                    "</div>" +
                "</div>" +
                "</div>" +
            "</div>");
    }
}