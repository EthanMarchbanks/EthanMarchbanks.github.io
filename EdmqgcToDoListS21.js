$(function(){
    var slider = document.getElementById("priority");
    var output = document.getElementById("priorityOutput");
    var prior = $("#priority").val();
    output.innerHTML = getStars(prior);
    
    slider.oninput = function(){
    var prior = $("#priority").val();
    output.innerHTML = getStars(prior);
    }
                               
    $('#myForm').submit(function(event) {
        event.preventDefault();

        var currentDate = new Date();
        currentDate.setHours(0);

        var selectedDate = new Date(document.getElementById('date').value);
        selectedDate.setDate(selectedDate.getDate() + 1);
        selectedDate.setHours(1);

        if(selectedDate < currentDate) {
            alert("Selected date is before current date!");
        }
        else if($("#title").val() == "" || $("#type").val() == null || $("#date").val() == "" || $("#priority").val() == "") {
            $("#error").prop("hidden", false);
        }
        else {
            var title = $("#title").val();
            var type = $("#type").val(); 
            var date = $("#date").val();
            var prior = $("#priority").val();
            $('#addHere').append("<tr><td>" + title + "</td><td>" + type + "</td><td>" + getStars(prior) + "</td><td>" + date + "</td><td><img class=\"check\" src=\"EdmqgcToDoListS21check.png\"></td></tr>");
            $("#myForm").trigger("reset");
            output.innerHTML = "<img class=\"stars\" src=\"EdmqgcToDoListS213star.png\" alt=\"3star\">";
            $("#error").prop("hidden", true);
            // I had to put this here or it won't work?
            $(".check").click(function(){
                $(this).parents("tr").remove();
            });
        }                 
    });

    $("#clear").click(function(){
        $("#myForm").trigger("reset");
        output.innerHTML = "<img class=\"stars\" src=\"EdmqgcToDoListS213star.png\" alt=\"3star\">";
    });

    $(".check").click(function(){
        $(this).parents("tr").remove();
    });

    function getStars(x) {
        if(x == "0") {
            return "<img class=\"stars\" src=\"EdmqgcToDoListS210star.png\" alt=\"0star\">";
        }
        if(x == "1") {
            return "<img class=\"stars\" src=\"EdmqgcToDoListS211star.png\" alt=\"1star\">";
        }
        if(x == "2") {
            return "<img class=\"stars\" src=\"EdmqgcToDoListS212star.png\" alt=\"2star\">";
        }
        if(x == "3") {
            return "<img class=\"stars\" src=\"EdmqgcToDoListS213star.png\" alt=\"3star\">";
        }
        if(x == "4") {
            return "<img class=\"stars\" src=\"EdmqgcToDoListS214star.png\" alt=\"4star\">";
        }
        if(x == "5") {
            return "<img class=\"stars\" src=\"EdmqgcToDoListS215star.png\" alt=\"5star\">";
        }
        else {
            return "<img class=\"stars\" src=\"EdmqgcToDoListS216star.png\" alt=\"6star\">";
        }
    }

    $(".pageTitleContainer").dblclick(function(){
        var listTitle = prompt("Please enter title of To-Do List", "title");

        if (listTitle != null && listTitle != "") {
          $(".pageTitle").text(listTitle);
        }
        else {
            alert("Please enter a valid title");
        }
    });

    $("#theme").click(function(){
        if(document.getElementById("theme").innerHTML == "Light Mode") {
            $(".formLight").attr("id", "formDark");
            $(".lightBody").attr("id", "darkBody");
            $(".table").addClass("table-dark");
            $(".pageTitle").attr("id", "darkTitle");
            $(".aContainer").attr("id", "aContainerDark");
            $("a").attr("id", "aDark");
            $("#arrow").attr("src","EdmqgcToDoListS21backarrowdark.png");
            $(".pageTitleContainer").attr("id", "pageTitleContainerDark");
            $("#theme").css("background-color","darkgray");
            $("#theme").css("border","5px solid darkslategray");
            document.getElementById("theme").innerHTML = "Dark Mode";
        }
        else {
            $(".formLight").removeAttr("id");
            $(".lightBody").removeAttr("id");
            $(".table").removeClass("table-dark");
            $(".pageTitle").removeAttr("id");
            $(".aContainer").removeAttr("id");
            $("a").removeAttr("id");
            $("#arrow").attr("src","EdmqgcToDoListS21backarrowlight.png");
            $(".pageTitleContainer").removeAttr("id");
            $("#theme").css("background-color","lightcyan");
            $("#theme").css("border","5px solid beige");
            document.getElementById("theme").innerHTML = "Light Mode"
        }
    });
});