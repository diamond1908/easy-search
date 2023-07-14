<!DOCTYPE html>
<html>
<head>
  <title>Login Secretaria</title>
  <link rel="icon" type="image/png" href="../assets/img/Sem Título-1.png"/>
  <style>
    body {
      font-family: Arial, sans-serif;   
      background-repeat: no-repeat;
        background-size: 100%;
      background-color: #87CEFA;
    }
    li {
      list-style-type: none;
    }
    
    .container {
      
      width: 370px;
      height: 340px;
      padding: 20px;
      margin: 0 auto;
      margin-top: 130px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 30px;
    }
    
    .container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
   
    .container input[type="text"],
    .container input[type="password"] {
      width: 92%;
      padding: 15px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 15px;
    }

    .container input[type="text"]:hover
    .container input[type="password"]:hover {
        background-color: #3a50d7;
        color: #1E90FF;


    }
    
    .container input[type="submit"] {
      width: 100%;
      padding: 15px;
      background-color: #0A4FD8;
      color: #fff;
      border: solid;
      border-radius: 450px;
      cursor: pointer;
      
    }
    
    .container input[type="submit"]:hover {
      background-color: #0e83ca;
      color: #1E90FF;
      border: solid;
   
      border-radius: 450px;

    }

    .logo{
        margin-top: -80px;


    }

    
  </style>
</head>
<body>
<div class="logo"><a href="../index.html"><li><img src="../assets/img/Sem Título-1.png" alt="..." width="210"></a></div>
  <div class="container">
    <h2>Secretaria</h2>
    <form action="../model/valida-login-secretaria.php" method="post">
    <H4>Digite seu e-mail:</H4>
    <input type="text" placeholder="Digite seu e-mail..." name= 'email'>    
      <H4>Digite sua senha:</H4>
      <input type="password" placeholder="Digite sua senha..." name= 'senha'>
      <input type="submit" value="Logar">

    </form>
  </div>
</body>
</html>