let isSignup = localStorage.getItem('signup');
if (isSignup) {
    isSignup = JSON.parse(isSignup)
    if (isSignup['bool']) {
        let template = `
    <a href="/user.html" class="nav_link">Profile</a>
    <a class="nav_link" onclick="signout()">Sign out</a>
    <img onclick="home()" class="icon" src="images/globe.png" alt="" />
    `;
        document.querySelector(".header span").innerHTML = template;
    }
}

let index = localStorage.getItem('signup');
index = JSON.parse(index);
index = index['index']
let json = localStorage.getItem('project');
json = JSON.parse(json);
console.log(index, json)
let template = `
    <div>Name: `+ json[index]['name'] + `</div>
    <div>Surname: `+ json[index]['surname'] + `</div>
    <div>E-mail: `+ json[index]['email'] + `</div>
    <div>Login: `+ json[index]['login'] + `</div>
    <div>Password: `+ json[index]['password'] + `</div>
`;

document.querySelector(".main").innerHTML = template;

function home () {
    window.location.href = "/index.html";
}

function signout() {
    localStorage.setItem("signup",JSON.stringify("{'bool':false, 'index':-1}"))
    window.location.href = "/index.html";
}