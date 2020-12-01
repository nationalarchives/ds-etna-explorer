var refineButton = document.getElementById("refine-button");
refineButton.style.display = "inline-block"; // Show the button (hidden initially for progressive enhancement)

var refine = document.getElementById("refine-container");
refine.hidden = true; // Shown initially for progressive enhancement. Hidden with JS for a cleaner enhanced UI.


refineButton.addEventListener("click", function() {

    if(refine.hidden) {
        refine.hidden = false;
        refineButton.classList.add("tna-button--primary");
        refineButton.innerText = "Hide filters";
        window.setTimeout(function ()
    {
       const refine_year_from = document.getElementById('dateFrom');
       const refine_heading = document.getElementById('refine-heading');

       refine_year_from.focus();
       refine_heading.scrollIntoView();
    }, 0);
    }
    else {
        refine.hidden = true;
        refineButton.classList.remove("tna-button--primary");
        refineButton.innerText = "Show filters";

    }

});
