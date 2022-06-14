const navToggle = document.querySelector("#nav-toogle"),
    navMenu = document.querySelector('#mobile-menu');
var menuActive = false;
var profileMenuActive = false;
navToggle.addEventListener('click', () => {
    if (profileMenuActive) {
        profileNav();
    }
    if (menuActive) {
        navToggle.innerHTML = '<i class="fa fa-bars"></i>';
        navMenu.style.display = "none";
        menuActive = false;
    } else {
        navToggle.innerHTML = '<i class="fa fa-close"></i>';
        navMenu.style.display = "block";
        menuActive = true;
    }
});
function profileNav() {
    let profileMenu = document.querySelector('#profile-menu');
    if (menuActive) {
        navToggle.click();
    }
    if (profileMenuActive) {
        profileMenu.style.display = "none";
        profileMenuActive = false;
    } else {
        profileMenu.style.display = "block";
        profileMenuActive = true;
    }
}

function dismissSession() {
    var sessionBody = document.querySelector('session-body');

    sessIOnBody.style.display = "none";
}