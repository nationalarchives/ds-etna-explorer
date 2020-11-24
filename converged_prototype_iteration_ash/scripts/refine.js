var refineButton = document.getElementById("refine-button");
refineButton.style.display = "inline-block"; // Show the button (hidden initially for progressive enhancement)

var refine = document.getElementById("refine-container");
refine.hidden = true; // Shown initially for progressive enhancement. Hidden with JS for a cleaner enhanced UI.


refineButton.addEventListener("click", function() {

    if(refine.hidden) {
        refine.hidden = false;
        refineButton.classList.add("tna-button--primary");
        refineButton.innerText = "Hide refine options";
    }
    else {
        refine.hidden = true;
        refineButton.classList.remove("tna-button--primary");
        refineButton.innerText = "Show refine options";

    }

});
