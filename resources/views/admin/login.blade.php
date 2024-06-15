<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MenFashion - Login</title>
</head>

<style>
    body {
        position: relative;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center
    }
    form {
        width: 250px;
        display: flex;
        flex-direction: column;
        padding: 30px 12px;
        background-color:deepskyblue;
        border-radius: 10px;
        justify-content: center;
        align-items: center

    }
    input {
       outline: none;
       width: 90%;
       height: 30px;
       border: none;
       margin-bottom: 12px;
       border-radius: 5px;
       padding: 0 12px
    }
    button {
        width: 150px;
        height: 35px;
        outline: none;
        border: none;
        background-color:brown;
        color: aliceblue;
        cursor: pointer;
    }
</style>

<body>

    <form action="/check_login" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mật Khẩu" id="">
        <button type="submit">Đăng Nhập</button>
        <input type="hidden" name="_token" value="EblMqdbNnvMeYmDkRiWRbH17fhcqCgrWu22c3igr" autocomplete="off">
        @csrf
    </form>
</body>
</html>
