let isSignup = localStorage.getItem('signup');
let allJson = localStorage.getItem("project");
if (isSignup) {
    console.log(isSignup)
    isSignup = JSON.parse(isSignup)
    console.log(isSignup)
    if (isSignup['bool']) {
        let template = `
    <a href="/user.html" class="nav_link">Profile</a>
    <a class="nav_link" onclick="signout()">Sign out</a>
    <img onclick="home()" class="icon" src="images/globe.png" alt="" />
    `;
        document.querySelector(".header span").innerHTML = template;
    }
} else {
    isSignup = {'bool':false, 'index':-1};
    localStorage.setItem("signup",'{"bool":false, "index":-1}');
}

function signout() {
    localStorage.setItem("signup", JSON.stringify("{'bool':false, 'index':-1}"))
    window.location.href = "/index.html";
}

function home() {
    window.location.href = "/index.html";
}

document.getElementById('davaToday').valueAsDate = new Date();
$('.carousel').carousel()

function open_to_signup() {
    closeLogin();
    openSignup();
}

function open_to_login() {
    close_signup();
    openLogin();
}

function openSignup() {
    document.querySelector(".sign_up").classList.remove("display_none");

    $("body").css({ "overflow": "hidden" });
}

function close_signup() {
    document.querySelector(".sign_up").classList.add("display_none");

    $("body").css({ "overflow": "visible" });
}

function openLogin() {
    document.querySelector(".log_in").classList.remove("display_none");

    $("body").css({ "overflow": "hidden" });
}

function closeLogin() {
    document.querySelector(".log_in").classList.add("display_none");

    $("body").css({ "overflow": "visible" });
}

function registration() {
    let json = localStorage.getItem('project');
    if (json) {
        json = JSON.parse(json);
    } else {
        json = [];
    }

    let isEmailIncludes = false;
    let isLoginIncludes = false;
    for (let i = 0; i < json.length; i++) {
        if (json[i]['email'] == document.querySelector("#email").value) {
            isEmailIncludes = true;
        }

        if (json[i]['login'] == document.querySelector("#login1").value) {
            isLoginIncludes = true;
        }
    }

    let jsonElement = { 'name': document.querySelector("#name").value, 'surname': document.querySelector("#surname").value, 'email': document.querySelector("#email").value, 'login': document.querySelector("#login1").value, 'password': document.querySelector("#password1").value };

    if (jsonElement['password'] != document.querySelector('#repeat1').value) {
        alert("Passwords do not match");

    } else if (isEmailIncludes) {
        alert("A user with this email already exists");
    } else if (isLoginIncludes) {
        alert("A user with this login already exists");
    } else {
        json[json.length] = jsonElement;
        localStorage.setItem("project", JSON.stringify(json));
        alert("You have successfully registered!");
        closeLogin();
    }
}

setInterval(isValidLogin, 100)
function isValidLogin() {
    if (document.querySelector("#name").value != "" && document.querySelector("#surname").value != "" && document.querySelector("#email").value != "" && document.querySelector("#login1").value != "" && document.querySelector("#password1").value != "" && document.querySelector("#repeat1").value != "") {
        document.querySelector("#yes").classList.remove("display_none");
        document.querySelector("#no").classList.add("display_none");
    } else {
        document.querySelector("#yes").classList.add("display_none");
        document.querySelector("#no").classList.remove("display_none");
    }
}

function signup() {
    let json = localStorage.getItem('project');
    let isSignup = localStorage.getItem('signup');
    if (json) {
        json = JSON.parse(json);
    } else {
        json = [];
    }

    if (!isSignup) {
        isSignup = { 'bool': false, 'index': -1 };
    }

    let isFound = false;
    let incorrectPass = false;
    let index = -1;

    for (let i = 0; i < json.length; i++) {
        if (json[i]['login'] == document.querySelector("#login").value) {
            if (json[i]['password'] == document.querySelector("#password").value) {

                index = i;
            } else {
                alert("Incorrect password");
                incorrectPass = true;
                break;
            }
            isFound = true;
            break;
        }
    }
    if (!incorrectPass) {
        if (!isFound) {
            alert("A user with this login don't exists")
        } else {
            window.location.href = "/user.html"
            close_signup();

            isSignup = { 'bool': true, 'index': index };
            localStorage.setItem('signup', JSON.stringify(isSignup));
        }
    }
}

setInterval(isValidSignup, 100)
function isValidSignup() {
    if (document.querySelector("#login").value != "" && document.querySelector("#password").value != "") {
        document.querySelector("#yes1").classList.remove("display_none");
        document.querySelector("#no1").classList.add("display_none");
    } else {
        document.querySelector("#yes1").classList.add("display_none");
        document.querySelector("#no1").classList.remove("display_none");
    }
}

function opensearchresult() {
    let template = ``
    let city = document.querySelector(".inp").value;

    fetch("json/database.json").then(data => data.text()).then(data => {
        let json = JSON.parse(data);
        for (let i = 0; i < json.length; i++) {
            if (city == json[i]['city']) {
                template += `
            <div class="card">
            <div class="img_content">
              <img class="main_img" src="`+ json[i]['img_url'] + `">
            </div>
            <div class="about_content">
              <span class='col-1' style="width: 100%;  display: flex;justify-content: space-between; align-items: center;">
                <div>
                  <h1 class="title">`+ json[i]['title'] + `</h1>
                  <a href="">`+ json[i]['city'] + `</a>
                </div>
                <div>`

                if (parseInt(json[i]['rating']) >= 9) {
                    template += "Превосходно"
                } else if (parseInt(json[i]['rating']) >= 8) {
                    template += "Очень хорошо"
                } else {
                    template += "Хорошо"
                }

                template += `<span style="border: 1px solid darkblue; color: white; background-color: darkblue; padding: 5px; border-radius: 5px;">` + json[i]['rating'] + `</span>
                </div>
              </span>
              <span class='col-2' style="width: 100%; display: flex;justify-content: space-between; align-items: center;">
                <span style="width: 70%;"><a>`+ json[i]['about'] + `</a></span>
                <span style="width: 30%; display: flex; justify-content: flex-end;"><a style="color: green">KZT `+ json[i]['price'] + `</a></span>
              </span>
              <span class='col-3' style="width: 100%; display: flex;justify-content: flex-end; align-items: center;">
                <a href="#YMapsID" style="border: 1px solid darkblue; background-color: darkblue; color: white; padding: 5px 15px; border-radius: 5px; cursor: pointer;" onclick="openMap(this)">Show in map</a>
              </span>
            </div>
          </div>
            `}
        }
        document.querySelector(".search_result").innerHTML = template;
    })
}

function openMap(argument) {
    let text = argument.parentNode.parentNode.querySelector("h1").innerHTML
    fetch("json/database.json").then(data => data.text()).then(data => {
        data = JSON.parse(data);
        let index = 0;

        for (let i = 0; i < data.length; i++) {
            if (data[i]['title'] == text) {
                index = i;
                break;
            }
        }

        document.querySelector(".YMapsID").classList.remove("display_none")
        document.querySelector("#YMapsID").classList.remove("display_none")
        document.querySelector("#YMapsID").innerHTML = "";

        ymaps.ready(function () {

            var myMap = new ymaps.Map("YMapsID", {
                center: [data[index]['x'], data[index]['y']],
                zoom: 18,
            });

            var myPlacemark = new ymaps.Placemark([data[index]['x'], data[index]['y']], {
                content: 'название маркера',
                balloonContent: 'html-контент',
            });

            console.log(myPlacemark);

            // добавление маркера на карту
            myMap.geoObjects.add(myPlacemark);

        });
    });
}

function close_map() {
    document.querySelector(".YMapsID").classList.add("display_none")
    document.querySelector("#YMapsID").classList.add("display_none")
    document.querySelector("#YMapsID").innerHTML = "";
}