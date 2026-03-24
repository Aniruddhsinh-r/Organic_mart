const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");
const registerationform = document.getElementById("registerationform");
const loginform = document.getElementById("loginform");
const registerationsection = document.getElementById("registerationsection");
const loginsection = document.getElementById("loginsection");


registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});

function toggleForms(show, hide) {
    if (show.classList.contains("hidden")) {
        show.classList.remove("hidden");
        hide.classList.add("hidden");
    } else {
        show.classList.add("hidden");
        hide.classList.remove("hidden");
    }
}

registerationform.addEventListener("click", () => {
    toggleForms(registerationsection, loginsection);
});

loginform.addEventListener("click", () => {
    toggleForms(loginsection, registerationsection);
});