<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("{{ asset('dummy.png') }}") no-repeat center;
    background-size: contain;   
    background-attachment: fixed;  
    opacity: 0.8;
    z-index: -1;
}
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            width: 350px;
            text-align: center;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #333;
            margin-bottom: 15px;
        }
        .message {
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .success {
            background: #d4edda;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
        }
        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin: 10px 0 5px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.1);
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        h2 {
       text-align: center;
       color: #fff;
       margin-bottom: 20px;
       font-size: 28px;
       animation: flickerTitle 3s infinite alternate ease-in-out;
     }
     @keyframes flickerTitle {
       0%, 100% {
         text-shadow: 0 0 10px rgba(255, 170, 85, 0.5), 0 0 20px rgba(255, 136, 0, 0.7);
       }
       50% {
         text-shadow: 0 0 20px rgba(255, 170, 85, 0.7), 0 0 40px rgba(255, 136, 0, 0.9);
       }
     }
    </style>
</head>
<body>

    <div class="container">
        <h2>Reset Password</h2>

        @if(session('success'))
            <p class="message success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
            <p class="message error">{{ $errors->first() }}</p>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>New Password:</label>
            <input type="password" name="password" placeholder="Enter new password" required>

            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" placeholder="Confirm new password" required>

            <button type="submit">Reset Password</button>
        </form>
    </div>

</body>
</html>
