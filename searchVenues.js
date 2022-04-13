$(document).ready(function(){
    getVenues().done(function(response){
        console.log("Venues:");
        if (!response){
            console.log("Response error.");
            console.log(response);
        }
        else
        {
            console.log(response);
            loadVenueList(response);
        }
    })
});

//loads entertainer list onto website
function loadVenueList(venuesList){
    jQuery.each(venuesList, function(){
        var card = createVenueCard(this);
        loadVenueCard(card);
    })
}


//creates html for card
function createVenueCard(venue){
    var imageSrc;
    console.log("Loading card for: " + venue.businessName + " with ID: ");
    console.log(venue._id.$oid);
    var cardHTML = 
        "<div class='col'>" +
            "<div class='card shadow-sm'>" +
                "<img src='";
    //check if venue has profile image (if it doesn't then first condition is true)
    if (true)
    {
        console.log(venue.type)
        switch(venue.type){
            case 'bar':
                imageSrc = 'pictures/stockBar.jpg';
                break;
            case 'restaurant':
                imageSrc = 'pictures/stockRestaurant.jpg';
                break;
            case 'club':
                imageSrc = 'pictures/stockComedyClub.jpg';
                break;
            case 'auditorium':
                imageSrc = 'pictures/stockAuditorium.jpg';
                break;
            case 'stadium/arena':
                imageSrc = 'pictures/stockStadium.jpg';
                break;
            case 'other' || typeof venue.type === undefined || venue.type == null:
                imageSrc = 'pictures/Stage.jpg';
        }
        if (typeof venue.type === undefined)
        {
            imageSrc = 'pictures/Stage.jpg';
        }
        cardHTML += imageSrc;
    }
    else
    {
        //entertainer image hasn't been implemented
        cardHTML += venue.image;
    }
    cardHTML += "' class='card-img-top' width='100%' height='225' role='img' aria-label='Placeholder Image' preserveAspectRatio='xMidYMid slice' focusable='false'></img>" +
                "<div class='card-body'>" +
                    "<h5 class='card-title'>" + venue.businessName + "</h5>" +
                    "<h6 class='card-title'>" + venue.type + " | " + venue.priceRange + " Price Range</h6>" +
                    "<p class='card-text' style='max-lines:5'>" + venue.bio + "</p>" +
                    "<div class='d-flex justify-content-between align-items-center'>" +
                    "<div class='btn-group'>" +
                        "<button type='button' class='btn btn-sm btn-outline-secondary' onclick='viewProfile(\"" + venue._id.$oid + "\")' value='" + venue._id.$oid + "'>View Profile</button>" +
                        "<button type='button' class='btn btn-sm btn-outline-secondary'>Message</button>" +
                    "</div>" +
                    "<small class='text-muted'>" + venue.city + ", " + venue.state + "</small>" +
                    "</div>" +
               "</div>" +
            "</div>" +
        "</div>";
            
    return cardHTML;
}
        
//loads card onto website
function loadVenueCard(cardHTML){
    $("#venueList").append(cardHTML);
}

//retrieves entertainer documents from mongodb
function getVenues(){
    return $.ajax({
        url: "getVenues.php",
        dataType: "json",
        type: "POST",
        success: function(response){
            console.log("getVenues AJAX Success.");
            return response;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            console.log("getVenues AJAX Error.");
            console.log("ERROR: " + errorThrown);
        }
    });
}

//redirects user to profile page of selected card
function viewProfile(id){
    console.log("view profile");
    setCookie("venueID", id);
    window.location.href = "profileVenue.html";
}

function setCookie(name, value){
    //expiration for cookie
    const d = new Date();
    d.setTime(d.getTime() + (60*60*1000));
    let expiration = d.toLocaleString();

    //set cookie
    document.cookie = name + "=" + value + "; expires=" + expiration + ";path=/";
}