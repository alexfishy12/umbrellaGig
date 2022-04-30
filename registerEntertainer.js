$(document).ready(function(){
    console.log("Javascript ready.");
    $("#register").on("submit", function(e){
        console.log("test");
        e.preventDefault();
        e.stopPropagation();
        var formData = getFormData();

        registerEntertainer(formData).done(function(response){
            console.log("Register Entertainer done. Response: " + response);
        })
    })
});

function getFormData(){
    var username   = $("#username").val();
    var password   = $("#password").val();
    var email      = $("#email").val();
    var firstName  = $("#firstName").val();
    var lastName   = $("#lastName").val();
    var phone      = $("#phone").val();
    var street     = $("#street").val();
    var city       = $("#city").val();
    var state      = $("#state").val();
    var zipcode    = $("#zipcode").val();
    var type       = $("#type").val();

    return {username: username, password: password, email: email, firstName: firstName, lastName: lastName, phone: phone, street: street, city: city, state: state, zipcode: zipcode, type: type};
}

function registerEntertainer(formData){
    return $.ajax({
        url: "registerEntertainer.php",
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