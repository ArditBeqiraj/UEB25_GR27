<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .no-focus-outline:focus {
      outline: none;
      border-color: inherit;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="popup">
    <div class="container">
      <div class="buttons">
        <button class="button-login" id="button-login">Log In</button>
        <button class="button-signup" id="button-signup">Sign Up</button>
      </div>
      <div class="permbajtja">
        <div class="log-in" id="log-in">
          <div class="li-container">
            <div class="li-phrase">
              <h3>Back to the Skies</h3>
              <p>
                Access your account and continue exploring premium aircraft
                for sale and rental.
              </p>
              <h3>Log In</h3>
            </div>
            <form class="forma-login" action="member/validate_login.php" method="POST">
              <div class="li-inputet">
                <input class="li-email" type="email" name="email" placeholder="Email" required />
                <div class="li-password-container">
                  <input class="no-focus-outline" type="password" id="li-password" name="password" placeholder="Password" required minlength="8" />
                  <span class="li-toggle-password">
                    <i class="fa-solid fa-eye li-eye"></i>
                    <i class="fa-solid fa-eye-slash li-eye-slash hide"></i>
                  </span>
                </div>
              </div>
              <div class="li-remember-me">
                <input type="checkbox" name="remember" id="li-remember" />
                <label for="li-remember" class="li-checkbox-label">Remember me</label>
              </div>
              <button class="li-submit" type="submit">Log In</button>
              <a href="#" class="li-forgot-password">Forgot your password?</a>
            </form>
            <div class="social-login-options">
              <p>Or log in using:</p>
              <div class="social-login-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-apple"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-google"></i></a>
              </div>
            </div>
            <div class="li-suggestion">
              <p>
                Not a member? <span class="button-signup-span">Sign Up</span>
              </p>
            </div>
          </div>
        </div>
        <div class="sign-up" id="sign-up">
          <div class="su-container">
            <div class="su-phrase">
              <h3>Take Flight with Us</h3>
              <p>
                Join our community to unlock exclusive deals and elevate your
                aviation journey.
              </p>
              <h3>Sign Up</h3>
            </div>
            <form class="forma-signup" action="member/validate_signup.php" method="POST">
              <div class="su-inputet">
                <div class="su-name-surname">
                  <input class="su-name" type="text" name="name" placeholder="Name" required />
                  <input class="su-surname" type="text" name="surname" placeholder="Surname" required />
                </div>
                <input class="su-username" type="text" name="username" placeholder="Username" required />
                <input class="su-email" type="email" name="email" placeholder="Email" required />
                <div class="su-password-container">
                  <input class="no-focus-outline" type="password" id="su-password" name="password" placeholder="Password" required minlength="8" />
                  <span class="su-toggle-password">
                    <i class="fa-solid fa-eye su-eye"></i>
                    <i class="fa-solid fa-eye-slash su-eye-slash su-hide"></i>
                  </span>
                </div>
                <div class="su-password-container">
                  <input class="no-focus-outline" type="password" id="su-confirm-password" name="confirm-password" placeholder="Confirm password" required minlength="8" />
                  <span class="su-toggle-password">
                    <i class="fa-solid fa-eye su-eye"></i>
                    <i class="fa-solid fa-eye-slash su-eye-slash su-hide"></i>
                  </span>
                </div>
              </div>
              <button class="su-submit" type="submit">Sign Up</button>
            </form>
            <div class="social-signup-options">
              <p>Or sign up using:</p>
              <div class="social-signup-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-apple"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-google"></i></a>
              </div>
            </div>
            <div class="su-suggestion">
              <p>
                Already a member? <span class="button-login-span">Log In</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>