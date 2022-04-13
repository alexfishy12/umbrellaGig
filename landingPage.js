$(document).ready(function(){
    $("#upcomingEventsButton").on("click", function(){
        window.location.href = "events.html";
    });

    $("#signUpButton").on('click', function(){
        window.location.href = "registerEntertainer.html";
    });

    $("#listVenueButton").on('click', function(){
        window.location.href = "registerVenue.html";
    });

    $("#loginButton").on('click', function(){
        window.location.href = "LoginForm.php";
    });
});