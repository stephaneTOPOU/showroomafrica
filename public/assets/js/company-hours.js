var days = document.querySelectorAll('.days');
var hours = document.querySelectorAll('.hours');
var currentDateTime = new Date();
var currentHour = currentDateTime.getHours();
var currentMinute = currentDateTime.getMinutes();
var currentDay = currentDateTime.getDay();

var open = document.querySelectorAll('.opened');
var close = document.querySelectorAll('.closed');

setInterval(horaire, 60000);

function horaire() {
  currentDateTime = new Date();
  currentHour = currentDateTime.getHours();
  currentMinute = currentDateTime.getMinutes();
  currentDay = currentDateTime.getDay();
}

// Monday to Saturday
for (let i = 1; i < 7; i++) {
  if (currentDay == i) {
    days[i-1].classList.add('font-bold');
    hours[i-1].classList.add('font-bold');
    var closeHour = hours[i-1].innerText.substr(8, 2);
    var closeMinute = hours[i-1].innerText.substr(11, 2);
    var openHour = hours[i-1].innerText.substr(0, 2);
    var openMinute = hours[i-1].innerText.substr(3, 2);
    var nextDayOpenHour = hours[i].innerText;
    var todayOpenHour = hours[i-1].innerText;
    //console.log(parseInt(closeMinute,10));
    console.log(todayOpenHour);

    function setClosed() {
      close[0].classList.add('show');
      close[1].classList.add('show');
      if (nextDayOpenHour != "Fermé") {
        close[0].innerHTML += " - <i style='font-size:12px;'>Ouvre demain à "+ nextDayOpenHour.substr(0, 5) +"</i>";
        close[1].innerHTML += " - <i style='font-size:12px;'>Ouvre demain à "+ nextDayOpenHour.substr(0, 5) +"</i>";
      }
    }

    function setOpened() {
      open[0].classList.add('show');
      open[1].classList.add('show');
    }

    function willOpen() {
      close[0].classList.add('show');
      close[1].classList.add('show');
      close[0].innerHTML += " - <i style='font-size:12px;'>Ouvre bientôt à "+ todayOpenHour.substr(0, 5) +"</i>";
      close[1].innerHTML += " - <i style='font-size:12px;'>Ouvre bientôt à "+ todayOpenHour.substr(0, 5) +"</i>";
    }

    if (currentHour > parseInt(closeHour,10)) {
      setClosed();
    }
    else {
      if (currentHour == parseInt(closeHour,10)) {
        if (currentMinute > parseInt(closeMinute,10)) {
          setClosed();
        } else {
          setOpened();
        }
      }
      else {
        setOpened();
      }
    }

    if (currentHour > parseInt(openHour)) {
      setOpened();
    }
    else {
      if (currentMinute > parseInt(openMinute,10)) {
        setOpened();
      }
      else {
        willOpen();
      }
    }

    if (hours[i-1].innerText == "Fermé") {
      setClosed();
    }

  }

}

// Sunday
if (currentDay == 0) {
  days[6].classList.add('font-bold');
  hours[6].classList.add('font-bold');
  if (hours[6].innerText == "Fermé") {
    close[0].classList.add('show');
    close[1].classList.add('show');
    var nextDay = hours[0].innerText;
    if (nextDay != "Fermé") {
      close[0].innerHTML += " - <i style='font-size:12px;'>Ouvre demain à "+ nextDay.substr(0, 5) +"</i>";
      close[1].innerHTML += " - <i style='font-size:12px;'>Ouvre demain à "+ nextDay.substr(0, 5) +"</i>";
    }
  }
}
