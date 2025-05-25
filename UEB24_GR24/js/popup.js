window.addEventListener("load", () => {
    const body = document.body;
    const popup = document.querySelector(".popup");
    const container = document.querySelector(".container");
    const login = document.getElementById("log-in");
    const signup = document.getElementById("sign-up");
    const btnLogin = document.getElementById("button-login");
    const btnSignup = document.getElementById("button-signup");
    const spanLogin = document.querySelector(".button-login-span");
    const spanSignup = document.querySelector(".button-signup-span");

    // Open popup automatically if #log-in is in the URL
    if (window.location.hash === "#log-in" && popup) {
        popup.style.display = "flex";
        body.classList.add("body-special");
        login.style.display = "flex";
        signup.style.display = "none";
        btnLogin.classList.add("active");
        btnSignup.classList.remove("active");
    }

    // Open popup for any element with open-popup class
    document.querySelectorAll(".open-popup").forEach(element => {
        element.addEventListener("click", (e) => {
            e.preventDefault();
            popup.style.display = "flex";
            body.classList.add("body-special");
            login.style.display = "flex";
            signup.style.display = "none";
            btnLogin.classList.add("active");
            btnSignup.classList.remove("active");
            history.pushState(null, "", "#log-in");
        });
    });

    // Close popup when clicking outside container
    popup?.addEventListener("click", (e) => {
        if (!container.contains(e.target)) {
            popup.style.display = "none";
            body.classList.remove("body-special");
            history.pushState(null, "", window.location.pathname);
        }
    });

    // Toggle between login and signup forms
    const toggleForm = (showForm, hideForm, activeBtn, inactiveBtn) => {
        showForm.style.display = "flex";
        hideForm.style.display = "none";
        activeBtn.classList.add("active");
        inactiveBtn.classList.remove("active");
    };

    btnLogin?.addEventListener("click", () => toggleForm(login, signup, btnLogin, btnSignup));
    btnSignup?.addEventListener("click", () => toggleForm(signup, login, btnSignup, btnLogin));
    spanLogin?.addEventListener("click", () => toggleForm(login, signup, btnLogin, btnSignup));
    spanSignup?.addEventListener("click", () => toggleForm(signup, login, btnSignup, btnLogin));

    // Password visibility toggle
    const togglePassword = (input, showEye, hideEye, hideClass) => {
        showEye.addEventListener("click", () => {
            input.type = "text";
            hideEye.classList.remove(hideClass);
            showEye.classList.add(hideClass);
        });
        hideEye.addEventListener("click", () => {
            input.type = "password";
            hideEye.classList.add(hideClass);
            showEye.classList.remove(hideClass);
        });
    };

    const liInput = document.querySelector("#li-password");
    const liShow = document.querySelector(".li-eye");
    const liHide = document.querySelector(".li-eye-slash");
    if (liInput && liShow && liHide) {
        togglePassword(liInput, liShow, liHide, "hide");
    }

    const suInput = document.querySelector("#su-password");
    const suShow = document.querySelectorAll(".su-eye")[0];
    const suHide = document.querySelectorAll(".su-eye-slash")[0];
    if (suInput && suShow && suHide) {
        togglePassword(suInput, suShow, suHide, "su-hide");
    }

    const suConfirmInput = document.querySelector("#su-confirm-password");
    const suConfirmShow = document.querySelectorAll(".su-toggle-password .su-eye")[1];
    const suConfirmHide = document.querySelectorAll(".su-toggle-password .su-eye-slash")[1];
    if (suConfirmInput && suConfirmShow && suConfirmHide) {
        togglePassword(suConfirmInput, suConfirmShow, suConfirmHide, "su-hide");
    }
});