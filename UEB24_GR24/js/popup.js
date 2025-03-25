type = "text/javascript";
window.addEventListener("load", function () {

    var body = document.querySelector("body");
    const popup = document.querySelector('.popup');
    const container = document.querySelector('.container');

    const logInOrSignUpBtn = document.getElementById('log-inOrsign-up');
    if (logInOrSignUpBtn) {
        logInOrSignUpBtn.addEventListener('click', function () {
            if (popup) {
                popup.style.display = 'flex';
            }
            body.classList.add('body-special');
        });
    }

    if (popup && container) {
        popup.addEventListener('click', function (e) {
            if (!container.contains(e.target)) {
                popup.style.display = 'none';
                body.classList.remove('body-special');
            }
        });
    }

    const btnLogin = document.getElementById("button-login");
    const btnSignup = document.getElementById("button-signup");
    const login = document.getElementById("log-in");
    const signup = document.getElementById("sign-up");

    const spanLogin = document.querySelector(".button-login-span");
    const spanSignup = document.querySelector(".button-signup-span");

    // function toggleActiveButton(activeButton, inactiveButton) {
    //     if (activeButton && inactiveButton) {
    //         activeButton.classList.add("active");
    //         inactiveButton.classList.remove("active");
    //     }
    // }
    function toggleActiveButton(activeButton, inactiveButton) {
        if (activeButton && inactiveButton) {
            $(activeButton).addClass("active");
            $(inactiveButton).removeClass("active");
        }
    }
    

    if (btnLogin && login && signup) {
        btnLogin.addEventListener("click", () => {
            login.style.display = "flex";
            signup.style.display = "none";
            toggleActiveButton(btnLogin, btnSignup);
        });
    }

    if (btnSignup && login && signup) {
        btnSignup.addEventListener("click", () => {
            signup.style.display = "flex";
            login.style.display = "none";
            toggleActiveButton(btnSignup, btnLogin);
        });
    }

    if (spanLogin && login && signup) {
        spanLogin.addEventListener("click", () => {
            login.style.display = "flex";
            signup.style.display = "none";
            toggleActiveButton(btnLogin, btnSignup);
        });
    }

    if (spanSignup && login && signup) {
        spanSignup.addEventListener("click", () => {
            signup.style.display = "flex";
            login.style.display = "none";
            toggleActiveButton(btnSignup, btnLogin);
        });
    }



    var inputEl = document.querySelector("#li-password");
    var showEl = document.querySelector(".li-eye");
    var hideEl = document.querySelector(".li-eye-slash");

    if (showEl && hideEl && inputEl) {
        showEl.addEventListener('click', () => {
            inputEl.type = "text";
            hideEl.classList.remove('hide');
            showEl.classList.add('hide');
        });

        hideEl.addEventListener('click', () => {
            inputEl.type = "password";
            hideEl.classList.add('hide');
            showEl.classList.remove('hide');
        });
    }


    var su_inputEl = document.querySelector("#su-password");
    var su_showEl = document.querySelector(".su-eye");
    var su_hideEl = document.querySelector(".su-eye-slash");

    if (su_showEl && su_hideEl && su_inputEl) {
        su_showEl.addEventListener('click', () => {
            su_inputEl.type = "text";
            su_hideEl.classList.remove('su-hide');
            su_showEl.classList.add('su-hide');
        });

        su_hideEl.addEventListener('click', () => {
            su_inputEl.type = "password";
            su_hideEl.classList.add('su-hide');
            su_showEl.classList.remove('su-hide');
        });
    }
});
