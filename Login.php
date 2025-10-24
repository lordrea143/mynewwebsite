<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cuber Ace - Login</title>
  <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    font-family: Roboto;
    background: url(image/rubiks.jpg) no-repeat top center/cover;
}
form{
    display: flex;
    justify-content: center;
}
.container{
    display: flex;
    justify-content: center;
    flex-direction: column;
    width: 450px;
    height: 500px;
    margin-top: 9%;
    background: rgba(1, 1, 1, 0.7);
    text-align: center;
    align-items: center;
}
.container h1{
    margin-top: -10px;
    margin-bottom: 50px;
    font-size: 40px;
    background: linear-gradient(to top,grey,white,white);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
}
.container input{
    font-size: 20px;
    border: none;
    padding: 15px;
    width: 300px;
    height: 60px;
    border-radius: 29px;
    margin: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}
::placeholder{
    font-family: Roboto;
    font-size: 23px;
    text-align: left;
    margin-top: -100px;
}
.container button{
    padding: 20px;
    border-radius: 25px;
    border: none;
    font-size: 24px;
    margin-top: 30px;
}
.container button:hover{
    color: white;
    background-color: grey;
}
.container button:active{
    color: white;
    background-color: black;
}
.container a:active{
    color: white;
    background-color: black;
}
.container button a{
    text-decoration: none;
    color: black;
}
#forgot:hover{
    text-decoration: underline;
    cursor: pointer;
}
#register:hover{
  text-decoration: underline;
}
  </style>
</head>
<body>
  <form action="config.php" method="POST">
    <div class="container">
      <h1>Login</h1>
      <input type="text" placeholder="Username" name="username" id="username" required>
      <input type="password" placeholder="Password" name="password" id="password" required>
      <label id="forgot" style='color: #fff; margin-left: 110px;'>Forgot Password?</label>
      <button type="submit">Submit</button>
      <p style='margin-top: 60px; color: #fff;'>Don't have an account.<a href='register.php' 
      style='color: white; text-decoration: none; a:hover{color: blue;}' id="register"> Register Here</a></p>
    </div>
  </form>
</body>
</html>
