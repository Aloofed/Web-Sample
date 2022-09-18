document.getElementById("opened").addEventListener("click", function(){
    document.getElementsByClassName("modals")[0].classList.add("actives");
});
document.getElementById("closed").addEventListener("click", function(){
    document.getElementsByClassName("modals")[0].classList.remove("actives");
});