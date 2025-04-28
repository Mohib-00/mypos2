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
      <h2>Forgot Password</h2>
      <a href="/" ><svg class="userpage" width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" fill="currentColor"/>
      </svg>
      </a>
    </div>
    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    <p style="color: red;">{{ $errors->first() }}</p>
    @endif
    <form action="{{ route('password.email') }}" method="POST" style=" padding: 20px; border-radius: 8px; width: 300px;">
        @csrf
        <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px; color: #333; text-align: left;">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required 
            style="background: rgba(255, 255, 255, 0.1);width: 140%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
        
        <button type="submit" 
            style="width: fit-content; padding: 10px; border: none; border-radius: 5px; background-color: #007bff; color: white; font-size: 16px; cursor: pointer; transition: background 0.3s;">
            Send Reset Link
        </button>
    </form>
    
    <a style="text-align :center" href="{{ route('login') }}" class="back-link">Back to Login</a>
  </div>

</body>
 

