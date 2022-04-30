$(document).ready(function(){
    getEntertainers().done(function(response){
        console.log("Entertainers:");
        if (!response){
            console.log("Response error.");
            console.log(response);
        }
        else
        {
            console.log(response);
            loadEntertainerList(response);
        }
    })
});

//loads entertainer list onto website
function loadEntertainerList(entertainersList){
    jQuery.each(entertainersList, function(){
        var card = createEntertainerCard(this);
        loadEntertainerCard(card);
    })
}


//creates html for card
function createEntertainerCard(entertainer){
    console.log("Loading card for: " + entertainer.firstName + " " + entertainer.lastName + " with ID: ");
    console.log(entertainer._id.$oid);
    var cardHTML = 
        "<div class='col'>" +
            "<div class='card shadow-sm'>" +
                "<img src=";
    //ideally this will switch when
    if (true)
    {
        cardHTML += "'./pictures/stockProfileImg.png'";
    }
    else
    {
        //entertainer image hasn't been implemented
        cardHTML += entertainer.image;
    }
    cardHTML += " class='card-img-top' width='100%' height='225' role='img' aria-label='Placeholder Image' preserveAspectRatio='xMidYMid slice' focusable='false'></img>" +
                "<div class='card-body'>" +
                    "<h5 class='card-title'>" + entertainer.firstName + " " + entertainer.lastName + "</h5>" +
                    "<h6 class='card-title'>" + entertainer.type + "</h6>" +
                    "<p class='card-text' style='max-lines:5'>" + entertainer.bio + "</p>" +
                    "<div class='d-flex justify-content-between align-items-center'>" +
                    "<div class='btn-group'>" +
                        "<button type='button' class='btn btn-sm btn-outline-secondary' onclick='viewProfile(\"" + entertainer._id.$oid + "\")' value='" + entertainer._id.$oid + "'>View Profile</button>" +
                        "<button type='button' class='btn btn-sm btn-outline-secondary'>Message</button>" +
                    "</div>" +
                    "<small class='text-muted'>" + entertainer.city + ", " + entertainer.state + "</small>" +
                    "</div>" +
               "</div>" +
            "</div>" +
        "</div>";
            
    return cardHTML;
}
        
//loads card onto website
function loadEntertainerCard(cardHTML){
    $("#entertainerList").append(cardHTML);
}

//retrieves entertainer documents from mongodb
function getEntertainers(){
    return $.ajax({
        url: "getEntertainers.php",
        dataType: "json",
        type: "POST",
        success: function(response){
            console.log("getEntertainers AJAX Success.");
            return response;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            console.log("getEntertainers AJAX Error.");
            console.log("ERROR: " + errorThrown);
        }
    });
}

//redirects user to profile page of selected card
function viewProfile(id){
    console.log("view profile");
    setCookie("entertainerID", id);
    window.location.href = "profileEntertainer.html";
}

function setCookie(name, value){
    //expiration for cookie
    const d = new Date();
    d.setTime(d.getTime() + (60*60*1000));
    let expiration = d.toLocaleString();

    //set cookie
    document.cookie = name + "=" + value + "; expires=" + expiration + ";path=/";
}