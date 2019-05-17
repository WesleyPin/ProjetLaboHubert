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
        $("#submitCo").css("background-color", "rgba(0, 59, 140s, 0.5)");
    })
    $("#submitCo").mouseout(function () {
        $("#submitCo").css("background-color", "rgba(0, 81, 192, 1)");
    })
})