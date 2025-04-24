<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #DDE6ED;
}
.login-box{
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: #9DB2BF;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    width: 400px;
    height: 480px;
    padding: 30px;
}
.login-header{
    text-align: center;
    margin: 0px 0 40px 0;
}
.login-header header{
    color: #333;
    font-size: 30px;
    font-weight: 600;
}

.input-box .input-field{
    width: 100%;
    height: 60px;
    font-size: 17px;
    padding: 0 25px;
    margin-bottom: 15px;
    border-radius: 30px;
    border: none;
    box-shadow: 0px 5px 10px 1px rgba(0,0,0, 0.05);
    outline: none;
    transition: .3s;
}

::placeholder{
    font-weight: 500;
    color: #222;
}

.input-field:focus{
    width: 105%;
}

.input-submit{
    position: relative;
}
.submit-btn{
    width: 100%;
    height: 60px;
    background: #222;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: .3s;
}
.input-submit label{
    position: absolute;
    top: 45%;
    left: 50%;
    color: #fff;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    cursor: pointer;
}
.submit-btn:hover{
    background: #000;
    transform: scale(1.05,1);
}
    </style>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('admin.login') }}">
        <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        @csrf
        <div class="input-box">
            <input type="email" name="email" id="" class="input-field" placeholder="Masukkan email" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" class="input-field" id="" placeholder="Masukkan password" autocomplete="off" required>
        </div>
        <div class="input-submit">
            <button class="submit-btn" id="submit">
            </button>
            <label for="submit">Login</label>
        </div>
    </div>
    </form> 
</body>
</html>