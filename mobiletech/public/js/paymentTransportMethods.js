document.addEventListener("DOMContentLoaded", function() {
    let mySpan = document.getElementById("kurier");

    mySpan.addEventListener("click", function() {
        mySpan.classList.toggle("highlighted");
    });
});
