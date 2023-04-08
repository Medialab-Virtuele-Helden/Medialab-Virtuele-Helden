let timer = document.getElementById("timer");
// Set the date we're counting down to
let endDate = new Date(timer.dataset.enddate).getTime();

// Update the count down every 1 second
let x = setInterval(function() {

  // Get today's date and time
  let now = new Date().getTime();

  // Find the distance between now and the count down date
  let remainingTime = endDate - now;

  // Time calculations for days, hours, minutes and seconds
  let days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
  let hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

  // Output the result in an element with id="timer"
  timer.innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (remainingTime < 0) {
    clearInterval(x);
    timer.innerHTML = "Deze challenge is afgelopen";

    let leaderboard = document.getElementById("leaderboard");
    leaderboard.innerHTML += '<div class="d-flex justify-content-center my-3"><button class="btn btn-primary">Nodig winnaars uit</button></div>';
  }
}, 1000);
