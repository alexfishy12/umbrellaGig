$(document).ready(function(){
    console.log("Javascript ready.");
    $("#register").on("submit", function(e){
        console.log("test");
        e.preventDefault();
        e.stopPropagation();
        var formData = getFormData();

        registerVenue(formData).done(function(response){
            console.log("Register Venue done. Response: " + response);

            sleep(2).then(window.location.href = "landingPage.html");
        })
    })
});

function getFormData(){
    var username        = $("#username").val();
    var password        = $("#password").val();
    var email           = $("#email").val();
    var businessName    = $("#businessName").val();
    var phone           = $("#phone").val();
    var street          = $("#street").val();
    var city            = $("#city").val();
    var state           = $("#state").val();
    var zipcode         = $("#zipcode").val();
    var type            = $("#type").val();
    var priceRange      = $("#priceRange").val();

    return {username: username, password: password, email: email, businessName: businessName, phone: phone, street: street, city: city, state: state, zipcode: zipcode, type: type, priceRange: priceRange};
}

function registerVenue(formData){
    return $.ajax({
        url: "registerVenue.php",
        dataType: 'text',
        type: 'POST',
        data: formData,
        success: function(response, status) {
            console.log('AJAX Success.');
            return response;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            console.log("AJAX Error: " + textStatus);
            return "ERROR: " + textStatus;
        }
    });
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}