$(document).ready(function () {
    $("#inputLogin").mouseover(function () {
        $("#inputLogin").css("background-color", "rgba(193, 193, 193, 0.3)");
    })
    $("#inputLogin").mouseout(function () {
        $("#inputLogin").css("background-color", "white");
    })
    $("#inputPassword").mouseover(function () {
        $("#inputPassword").css("background-color", "rgba(193, 193, 193, 0.3)");
    })
    $("#inputPassword").mouseout(function () {
        $("#inputPassword").css("background-color", "white");
    })
    $("#submitCo").mouseover(function () {
        $("#submitCo").css("background-color", "rgba(39, 114, 188, 0.7)");
    })
    $("#submitCo").mouseout(function () {
        $("#submitCo").css("background-color", "rgba(51, 153, 255, 1)");
    })
    $("#menu").click(function () {
        console.log('test');
    })
})