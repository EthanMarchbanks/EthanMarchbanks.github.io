$(function(){
    $("#functions").on("change", function() {
        if($("#functions").val() == "Name") {
            $("#nameForm").show();

            $("#nameForm").siblings("form").hide();
        }
        if($("#functions").val() == "HammingNumber") {
            $("#hammingNumberForm").show();
            $("#hammingNumberForm").siblings("form").hide();
        }
        if($("#functions").val() == "PasswordSimulation") {
            $("#passwordSimulationForm").show();
            $("#passwordSimulationForm").siblings("form").hide();
        }
        if($("#functions").val() == "ListCreator") {
            $("#listCreatorForm").show();
            $("#listCreatorForm").siblings("form").hide();
        }
        if($("#functions").val() == "CylinderSurfaceArea") {
            $("#cylinderSurfaceAreaForm").show();
            $("#cylinderSurfaceAreaForm").siblings("form").hide();
        }
    });
    
    $(".clear").click(function(){
        $(this).parent().trigger("reset");
        $(this).siblings("div").children("p").hide();
    });
    
    if($("#functions").val() == "Name") {
        $("#nameForm").show();
        $("#nameForm").siblings("form").hide();
    }
    if($("#functions").val() == "HammingNumber") {
        $("#hammingNumberForm").show();
        $("#hammingNumberForm").siblings("form").hide();
    }
    if($("#functions").val() == "PasswordSimulation") {
        $("#passwordSimulationForm").show();
        $("#passwordSimulationForm").siblings("form").hide();
    }
    if($("#functions").val() == "ListCreator") {
        $("#listCreatorForm").show();
        $("#listCreatorForm").siblings("form").hide();
    }
    if($("#functions").val() == "CylinderSurfaceArea") {
        $("#cylinderSurfaceAreaForm").show();
        $("#cylinderSurfaceAreaForm").siblings("form").hide();
    }
    
    $('#nameForm').submit(function(event) {
        var validInput = /^[a-z]+$/i;
        if(!validInput.test($("#firstname").val()) || !validInput.test($("#lastname").val())) {
            event.preventDefault();
            $("#nameFunction p").show();
        }
    });
    
    $('#hammingNumberForm').submit(function(event) {
        if(isNaN($("#number").val()) || $("#number").val() < 1) {
            event.preventDefault();
            $("#hammingNumberFunction p").show();
        }
    });
    
    $('#passwordSimulationForm').submit(function(event) {
        if(typeof $("#username").val() != "string" || typeof $("#password").val() != "string") {
            event.preventDefault();
            $("#passwordSimulationFunction p").show();
        }
    });
    
    $('#listCreatorForm').submit(function(event) {
        if($("#a").val().length > 1 || $("#b").val().length > 1) {
            event.preventDefault();
            $("#listCreatorFunction p").show();
        }
    });
    
    $('#cylinderSurfaceAreaForm').submit(function(event) {
        if(isNaN($("#height").val()) || isNaN($("#radius").val())) {
            event.preventDefault();
            $("#cylinderSurfaceAreaFunction p").show();
        }
    });
});