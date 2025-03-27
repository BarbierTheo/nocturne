document.addEventListener("click", function (element) {
  
  let closestButton = element.target.closest('button');
  let eventToLike = closestButton.dataset.like;
  
  fetch("controller-participate.php?event=" + eventToLike)
    .then((response) => response.text())
    .then((data) => {

      if (data == "participate") {
        closestButton.parentElement.innerHTML =
        `<button class="btn btn-danger" data-like="` + eventToLike +`">
            <i class="bi bi-heart-fill"></i>
        </button>`

      } else if (data == "dontParticipate") {
        closestButton.parentElement.innerHTML =
          `<button class="btn btn-outline-danger" data-like="` + eventToLike +`">
            <i class="bi bi-heart-fill"></i>
           </button>`;
      }
    });
    
});
