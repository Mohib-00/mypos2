<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logix 199</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('Investor Group on Climate Change_files/logix.png')}}">


    @include('css')
 
     
</head>
<body>
  
  <div class="container" id="loginContent" style="height:fit-content;">
    <div style="display: flex; align-items: center; justify-content: space-between;">
      <h2>Login</h2>
      <a href="/" ><svg class="userpage" width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" fill="currentColor"/>
      </svg>
      </a>
    </div>
    <form id="loginForm">
      <div class="input-box">
        <input type="email" id="loginEmail" name="email" required>
        <label for="loginEmail">Email</label>
        <span id="loginEmailError" class="text-danger"></span>
      </div>
      <div class="input-box">
        <input type="password" id="loginPassword" name="password" required>
        <label for="loginPassword">Password</label>
        <span id="loginPasswordError" class="text-danger"></span>
      </div>
      <div class="already-account">
        Don't have an account? <a href="/register" class="signUp">Sign Up</a>
      </div>
      <div class="already-account">
        <a href="/forgot-password" class="forgot-password">Forgot Password?</a>
    </div>
      <button type="button" id="login" class="btn mt-3">Login</button>
    </form>
  </div>
 @include('ajax')

</body>
 
