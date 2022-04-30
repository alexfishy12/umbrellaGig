$(document).ready(function(){
    $("#body").on('unload', function(){
        deleteCookie("entertainerID");
    });

    console.log("ProfilePage.js ready");

    if (getCookie("entertainerID") == "")
    {
       //load logged in user's profile 
    }
    else
    {
        var entertainerID = getCookie("entertainerID");
        getProfile(entertainerID).done(function(response){
            console.log("Profile:");
            if (!response){
                console.log("Response error.");
                console.log(response);
            }
            else
            {
                console.log(response);
                loadProfile(response);
            }
        })
    }
});

function loadProfile(entertainer){
    console.log("Load profile for: " + entertainer.firstName);
    $("#name").text(entertainer.firstName + " " + entertainer.lastName);
    $("#type").text(entertainer.type);
    $("#bio").text(entertainer.bio);
}

function getProfile(entertainerID){
    return $.ajax({
        url: "getProfile.php",
        dataType: "json",
        type: "POST",
        data: {id: entertainerID},
        success: function(response){
            console.log("getEntertainers AJAX Success.");
            return response;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            console.log("getEntertainers AJAX Error.");
            console.log(errorThrown);
        }
    });
}

function deleteCookie(cookieName) {
    if (getCookie(cookieName) != "")
    {
        document.cookie = cookieName + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i <ca.length; i++) {
      	let c = ca[i];
      	while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
    return "";
}