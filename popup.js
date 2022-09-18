document.getElementById("open").addEventListener("click", function(){
    document.getElementsByClassName("model")[0].classList.add("active");
});
document.getElementById("close").addEventListener("click", function(){
    document.getElementsByClassName("model")[0].classList.remove("active");
});