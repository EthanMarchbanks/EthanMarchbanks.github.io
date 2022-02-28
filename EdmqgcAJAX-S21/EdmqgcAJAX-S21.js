var key = "cq1Y3uPQNBQzXfccHhQoclTuCvopWeRb80NnBIqt";
var slideshowButtons = "<a class=\"prev\" onclick=\"plusSlides(-1)\">&#10094;</a><a class=\"next\" onclick=\"plusSlides(1)\">&#10095;</a>";
var slideshowButtonsAPOD = "<a class=\"prev\" onclick=\"prevAPOD()\">&#10094;</a><a class=\"next\" onclick=\"nextAPOD()\">&#10095;</a>";
var slideIndex = 1;
var manifest;
var manifestPhotos;
var manifestCameras;
getManifest();
var currentDate = new Date();
currentDate.setHours(1);
var loader = "<div class=\"loader\"></div>"

function getManifest() {
    $("body").append(loader);

    $.getJSON("https://api.nasa.gov/mars-photos/api/v1/manifests/opportunity?api_key=" + key, function(data){

        manifest = data;
        var array = manifest.photo_manifest.photos;
        var photos = array.map(function(photos) { return photos.sol; });
        var cameras = array.map(function(photos) { return photos.cameras; });
        manifestPhotos = photos;
        manifestCameras = cameras;
        
        $("body.loader").remove();
        
    });    
    
    $("#wrapper").show();
}



function getAllRoverPhotos(sol) {
    
    var photos = new Array();   
    
    $("#photoContainer").append(loader);
    
    $.getJSON("https://api.nasa.gov/mars-photos/api/v1/rovers/opportunity/photos?sol=" + sol + "&api_key=" + key, function(data){
        if(manifestPhotos.indexOf(parseInt(sol)) != -1) {
            
            $("#slideshow-container").append(slideshowButtons);
            
            for(var i = 0; i < data.photos.length; i++) {
                
                photos[i] = "<img src=\"" + data.photos[i].img_src + "\" alt=\"photo on sol " + sol + "\">";
                $("#slideshow-container").append("<div class=\"mySlides fade\">" + "<div class=\"numbertext\">" + (i+1) + " / " + data.photos.length + "</div>" + photos[i] + "</div>")
                
            }              

            slideIndex = 1;
            showSlides(slideIndex); 
            setupCamera($("#sol").val());
            $("#camera").val("all");
            infoRover();
            
        }
        
        else {
            
            $("#slideshow-container").hide();
            createAlert("Sol Error", "No photos were found for the given sol: " + sol + "! Please enter a value for a different sol."); 
            $("#camera").attr("disabled", true);
            $("#cameraDefault").html("-- Please first select a sol --");
            $("#photoType").html("Use the inputs on the left to display a photo below!");
            infoDefault();
            
        }
        
        $("#photoContainer .loader").remove();
        
    });
}

function getRoverPhotos(sol, camera) {
    
    var photos = new Array();  
    
    $("#photoContainer").append(loader);
    
    $.getJSON("https://api.nasa.gov/mars-photos/api/v1/rovers/opportunity/photos?sol=" + sol + "&camera=" + camera + "&api_key=" + key, function(data){
            
        $("#slideshow-container").append(slideshowButtons);

        for(var i = 0; i < data.photos.length; i++) {

            photos[i] = "<img src=\"" + data.photos[i].img_src + "\" alt=\"photo on sol " + sol + "\">";
            $("#slideshow-container").append("<div class=\"mySlides fade\">" + "<div class=\"numbertext\">" + (i+1) + " / " + data.photos.length + "</div>" + photos[i] + "</div>")

        }              

        slideIndex = 1;
        showSlides(slideIndex);
        
        $("#photoContainer .loader").remove();
        
    });
}

function getAPOD(date) {
    
    var xmlHttp = new XMLHttpRequest();
    
    $("#photoContainer").append(loader);
		
		xmlHttp.onload = function() {
			if (xmlHttp.status == 200) {
				
                var xmlDoc = xmlHttp.responseXML;
                
                var POTDimage = xmlDoc.getElementsByTagName("url");
                var POTDtitle = xmlDoc.getElementsByTagName("title");
                var POTDdate = xmlDoc.getElementsByTagName("date");
                var POTDexplanation = xmlDoc.getElementsByTagName("explanation");
                
                var i = 0;
                
                var POTDimageHTML = "<img src=\"" + POTDimage[i].childNodes[0].nodeValue + "\" alt=\"photo of the day on " + formatDate(currentDate) + "\">";
                
                $("#APODphoto").append(slideshowButtonsAPOD);

                $("#APODphoto").append("<div class=\"currentAPOD\">" + POTDimageHTML + "</div>");
                
                $("#infoTitle").html(POTDtitle[i].childNodes[0].nodeValue);
                $("#infoDate").html(POTDdate[i].childNodes[0].nodeValue);
                $("#infoDesc").html(POTDexplanation[i].childNodes[0].nodeValue);
                
                $("#photoContainer .loader").remove();
				
			}
		}
		
		xmlHttp.open("GET", "https://apod.treyshaw.com:5000/v1/apod/?date=" + formatDate(date) + "&api_key=" + key, true);
		xmlHttp.send();
}

function prevAPOD() {
    
    var selectedDate = new Date($("#date").val());
    selectedDate.setDate(selectedDate.getDate() + 1);
    selectedDate.setHours(0);    
    var newDate = new Date(selectedDate);
    newDate.setDate(newDate.getDate() - 1);
    
    $("#date").val(formatDate(newDate));
    
    eraseContent();
    
    getAPOD(newDate);
    
    $("#photoType").html("NASA APOD for " + formatDate(newDate));
    
}

function nextAPOD() {
    
    var selectedDate = new Date($("#date").val());
    selectedDate.setDate(selectedDate.getDate() + 1);
    selectedDate.setHours(0);    
    var newDate = new Date(selectedDate);
    newDate.setDate(newDate.getDate() + 1);
    
    if(newDate > currentDate) {
        
        createAlert("APOD Error", "No newer APODs!");
        
    }
    
    else {
        
        $("#date").val(formatDate(newDate));
    
        eraseContent();
        
        getAPOD(newDate);
        
        $("#photoType").html("NASA APOD for " + formatDate(newDate));
        
    }  
    
}

function setupCamera(sol) {
    var index = manifestPhotos.indexOf(parseInt(sol));
    var cameras = manifestCameras[index];
    
    if(cameras.length > 0) {
        
        $("#camera").removeAttr("disabled");
        $("#cameraDefault").html("All cameras");
        $("#FHAZ").attr("hidden", true);
        $("#RHAZ").attr("hidden", true);
        $("#NAVCAM").attr("hidden", true);
        $("#PANCAM").attr("hidden", true);
        $("#MINITES").attr("hidden", true); 
        
        for(var i = 0; i < cameras.length; i++) {
        
            if(cameras[i] == "FHAZ") {
                $("#FHAZ").removeAttr("hidden");
            }

            if(cameras[i] == "RHAZ") {
                $("#RHAZ").removeAttr("hidden");
            }

            if(cameras[i] == "NAVCAM") {
                $("#NAVCAM").removeAttr("hidden");
            }

            if(cameras[i] == "PANCAM") {
                $("#PANCAM").removeAttr("hidden");
            }

            if(cameras[i] == "MINITES") {
                $("#MINITES").removeAttr("hidden");
            }

            if(cameras[i] != "FHAZ" && cameras[i] != "RHAZ" && cameras[i] != "NAVCAM" && cameras[i] != "PANCAM" && cameras[i] != "MINITES" && cameras[i] != "ENTRY") {
                createAlert("Camera Error", "Unknown camera");
            }

        }
    }
    
    else {
        createAlert("Camera Error", "No cameras found");
    }
    
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

function eraseContent() {
    $("#slideshow-container").children().remove();
    $("#APODphoto").children().remove();
}

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    slides[slideIndex-1].style.display = "block";
}

function infoDefault() {
    $("#infoTitle").html("Title");
    $("#infoDate").html("Date");
    $("#infoDesc").html("Description");
}

function infoRover() {
    $("#infoTitle").html("Rover: Opportunity");
    $("#infoDate").html("Launch Date: 6-7-2003");
    $("#infoDesc").html("Description: Opportunity, also known as MER-B (Mars Exploration Rover –B) or MER-1, and nicknamed \"Oppy\", is a robotic rover that was active on Mars from 2004 until the middle of 2018. Launched on July 7, 2003, as part of NASA's Mars Exploration Rover program, itlanded in Meridiani Planum on January 25, 2004, three weeks after its twin Spirit (MER-A) touched down on the other side of the planet. With a planned 90-sol duration of activity (slightly less than 92.5 Earth days), Spirit functioned until it got stuck in 2009 and ceased communications in 2010, while Opportunity was able to stay operational for 5111 sols after landing, maintaining its power and key systems through continual recharging of its batteries using solar power, and hibernating during events such as dust storms to save power. This careful operation allowed Opportunity to exceed its operating plan by 14 years, 46 days (in Earth time), 55 times its designed lifespan. By June 10, 2018, when it last contacted NASA, the rover had traveled a distance of 45.16 kilometers (28.06 miles).");
}

function createAlert(title, text) {
    $("#alertTitle").html("*** " + title + " ***");
    $("#alertText").html(text);
    $("#alert").show();
}

$("#alertClose").click(function(){
  $("#alert").hide();
});

$("#alert").click(function(){
  $("#alert").hide();
});

$("#sol").on("change", function() {
    if($("#sol").val() < 1 || $("#sol").val() > 5111) {
        createAlert("Sol Error", "Please enter a value between 1 and 5111 for the sol!");
    }
    else {
        eraseContent();
        getAllRoverPhotos($("#sol").val());
        $("#APODphoto").hide();
        $("#photoType").html("Rover Photograph for Sol: " + $("#sol").val());
        $("#slideshow-container").show();
        $("#slideshow-container").css("display","flex");
        $("#slideshow-container").css("justify-content", "center");
        $("#slideshow-container").css("align-items", "center");
    }
});

$("#camera").on("change", function() {
    
    if($("#camera").val() == "all") {
        eraseContent();
        getAllRoverPhotos($("#sol").val());
        $("APODphoto").hide();
        $("#slideshow-container").show();
    }
    
    if($("#camera").val() == "FHAZ") {
        eraseContent();
        getRoverPhotos($("#sol").val(), "fhaz");
        $("APODphoto").hide();
        $("#slideshow-container").show();
    }
    
    if($("#camera").val() == "RHAZ") {
        eraseContent();
        getRoverPhotos($("#sol").val(), "rhaz");
        $("APODphoto").hide();
        $("#slideshow-container").show();
    }
    
    if($("#camera").val() == "NAVCAM") {
        eraseContent();
        getRoverPhotos($("#sol").val(), "navcam");
        $("APODphoto").hide();
        $("#slideshow-container").show();
    }
    
    if($("#camera").val() == "PANCAM") {
        eraseContent();
        getRoverPhotos($("#sol").val(), "pancam");
        $("APODphoto").hide();
        $("#slideshow-container").show();
    }
    
    if($("#camera").val() == "MINITES") {
        eraseContent();
        getRoverPhotos($("#sol").val(), "minites");
        $("APODphoto").hide();
        $("#slideshow-container").show();
    }
    
});

$("#date").on("change", function() {

    var selectedDate = new Date($("#date").val());
    selectedDate.setDate(selectedDate.getDate() + 1);
    selectedDate.setHours(0);    
    eraseContent(); 

    if(selectedDate > currentDate) {
        createAlert("APOD Error", "Selected date is after current date! Please select a different date.");
        $("#photoType").html("Use the inputs on the left to display a photo below!");
        infoDefault();
    }
    
    else {           
        getAPOD(selectedDate);
        $("#slideshow-container").hide();
        $("#photoType").html("NASA APOD for " + formatDate(selectedDate));
        $("#APODphoto").show();
        $("#APODphoto").css("display","flex");
        $("#APODphoto").css("justify-content", "center");
        $("#APODphoto").css("align-items", "center");
    }
    
});