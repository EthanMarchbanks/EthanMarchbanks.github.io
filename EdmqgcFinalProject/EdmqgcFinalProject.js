/* Beginning of code from https://www.w3schools.com/js/js_cookies.asp */    
function getCookie(cname) {        
    var name = cname + "=";        
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    for(var i = 0; i <ca.length; i++) {           
        var c = ca[i];

        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
    }

    return "";
}   
/* End of code from https://www.w3schools.com/js/js_cookies.asp */

/* Beginning of code from https://www.w3schools.com/howto/howto_js_slideshow.asp */
var slideIndex = 0;

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000);
}
/* Beginning of code from https://www.w3schools.com/howto/howto_js_slideshow.asp */

function getAdminStatus() {
    if(getCookie("admin") === "true") {
        $("#banner").html("<h1>Ethan's Wedding Planner (Admin)</h1>");
        $("#rsvpButton").html("<a href=\"EdmqgcFinalProjectRSVPlist.php\">RSVP List</a>");
        $("#rsvpButton").css("width", "17%");
        $("#header").append("<div id=\"logout\"><a href=\"EdmqgcFinalProjectLogout.php\">Logout</a></div>");
    }
    else {
        $("#banner").html("<h1>Ethan's Wedding Planner (Guest)</h1>");
        $("#header").append("<div id=\"logout\"><a href=\"EdmqgcFinalProjectLogout.php\">Logout</a></div>");
    }
}

$(document).ready(function() {

    if(getCookie("username") != "") {
        $("#username").val(getCookie("username"));
    }
    
    if(getCookie("rsvp") === "success") {
        $("#rsvpButton").html("<a href=\"EdmqgcFinalProjectRSVPadd.php\">RSVP Again?</a>");
        $("#rsvpButton").css("width", "14%");
    }
   
    $("#tabs").tabs();    
    $("#tabs").tabs({collapsible: true});
    
    $("#plusOneChoice").on("change", function() {
        
        if($("#plusOneChoice").val() === "one") {
            $("#plusOne").prop("disabled", false);
            $("#plusOne").val("");
            $("#plusOne")[0].setCustomValidity("Please type in a name or select 'None'.");
        }
        
        else {
            $("#plusOne").val("none");
            $("#plusOne").prop("disabled", true);
            $("#plusOne")[0].setCustomValidity("");
        }

    });
    
    $("#plusOne").on("input", function() {
        if($("#plusOne").val() !== "") {
            $("#plusOne")[0].setCustomValidity("");
        }
    });
    
    $(".phoneNumber").on("input", function() {
        
        if(this.value.length > this.maxLength) {
            this.value = this.value.slice(0, this.maxLength);
        }
        
        if(this.value.length < this.maxLength) {
            $(this)[0].setCustomValidity("Invalid number of digits");
        }
        else {
            $(this)[0].setCustomValidity("");
        }

    });
    
    $("#rsvpClear").click(function() {
        $("#rsvpForm").trigger("reset");
        $("#plusOne").prop("disabled", true);
    });
    
    $(".x").click(function() {
        var xhttp = new XMLHttpRequest();

        $("#deleteMsg").show();
 
        var id = $(this).parent().siblings(".id").text();
        
        $(this).parent().parent().remove();
        
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#deleteMsg").hide();
            }
        };

        xhttp.open("POST", "EdmqgcFinalProjectDelete.php?id=" + id, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);          
    });
    
});