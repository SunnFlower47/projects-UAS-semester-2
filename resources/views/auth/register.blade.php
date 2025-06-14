<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Perpustakaan</title>

  <!-- REMIXICONS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="anonymous" />

  <!-- GOOGLE FONTS -->
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");
  </style>

  <!-- CSS Style -->
    <style>
    :root {
      --white-color: hsl(0, 0%, 100%);
      --black-color: hsl(0, 0%, 0%);
      --body-font: "Poppins", sans-serif;
      --h1-font-size: 2rem;
      --normal-font-size: 1rem;
      --small-font-size: .813rem;
    }

    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body,
    input,
    button {
      font-family: var(--body-font);
      font-size: var(--normal-font-size);
    }

    a {
      text-decoration: none;
    }

    img {
      display: block;
      max-width: 100%;
      height: auto;
    }

    .register {
      position: relative;
      height: 100vh;
      display: grid;
      align-items: center;
    }

    .register__bg {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    .register__form {
      position: relative;
      margin-inline: 1.5rem;
      background-color: hsla(0, 0%, 100%, .01);
      border: 2px solid hsla(0, 0%, 100%, .7);
      padding: 2.5rem 1rem;
      color: var(--white-color);
      border-radius: 1rem;
      backdrop-filter: blur(16px);
    }

    .register__title {
      text-align: center;
      font-size: var(--h1-font-size);
      margin-bottom: 1.25rem;
    }

    .register__inputs, 
    .register__box {
      display: grid;
    }

    .register__inputs {
      row-gap: 1.25rem;
      margin-bottom: 1rem;
    }

    .register__box {
      grid-template-columns: 1fr max-content;
      column-gap: .75rem;
      align-items: center;
      border: 2px solid hsla(0, 0%, 100%, .7);
      padding-inline: 1.25rem;
      border-radius: 4rem;
    }

    .register__input, 
    .register__button {
      border: none;
      outline: none;
    }

    .register__input {
      width: 100%;
      background: none;
      color: var(--white-color);
      padding-block: 1rem;
    }

    .register__input::placeholder {
      color: var(--white-color);
    }

    .register__box i {
      font-size: 1.25rem;
    }

    .register__terms {
      font-size: var(--small-font-size);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .register__terms input {
      width: 1rem;
      height: 1rem;
      accent-color: var(--white-color);
    }

    .register__button {
      width: 100%;
      padding: 1rem;
      margin-bottom: 1rem;
      background-color: var(--white-color);
      border-radius: 4rem;
      color: var(--black-color);
      font-weight: 500;
      cursor: pointer;
    }

    .register__login {
      font-size: var(--small-font-size);
      text-align: center;
    }

    .register__login a {
      color: var(--white-color);
      font-weight: 500;
    }

    .register__login a:hover {
      text-decoration: underline;
    }

    @media screen and (min-width: 576px) {
      .register {
        justify-content: center;
      }

      .register__form {
        width: 420px;
        padding-inline: 2.5rem;
      }

      .register__title {
        margin-bottom: 2rem;
      }
    }
  </style>
</head>
<body>
  <div class="register">
    <img src="{{ asset('images/login-bg.png') }}" alt="background" class="register__bg">

    <form method="POST" action="{{ route('register') }}" class="register__form">
      @csrf

      <h1 class="register__title">Register</h1>

      @if ($errors->any())
        <div class="text-sm text-red-400 mb-2 text-center">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="register__inputs">
        <div class="register__box">
          <input type="text" name="name" placeholder="Full Name" required class="register__input" value="{{ old('name') }}">
          <i class="ri-user-fill"></i>
        </div>

        <div class="register__box">
          <input type="email" name="email" placeholder="Email ID" required class="register__input" value="{{ old('email') }}">
          <i class="ri-mail-fill"></i>
        </div>

        <div class="register__box">
          <input type="password" name="password" placeholder="Password" required class="register__input">
          <i class="ri-lock-2-fill"></i>
        </div>

        <div class="register__box">
          <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="register__input">
          <i class="ri-lock-2-fill"></i>
        </div>
      </div>

      <label class="register__terms">
        <input type="checkbox" required>
        I agree to the Terms & Conditions
      </label>

      <button type="submit" class="register__button">Create Account</button>

      <div class="register__login">
        Already have an account?
        <a href="{{ route('login') }}">Login</a>
      </div>
    </form>
  </div>
</body>
</html>