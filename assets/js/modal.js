var dialog = document.querySelector("dialog")
var btn = document.querySelector("dialog + button");
var span = document.querySelector(".close");

btn.addEventListener("click", ()=>{
    dialog.showModal();
});

span.addEventListener("click", () => {
    dialog.close(); 
});

window.onclick = function(event) {
    if (event.target == dialog) {
        dialog.close();
    }
};
