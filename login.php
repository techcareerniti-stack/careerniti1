<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'student' && $password === '1234') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'student';
        header('Location: dashboard.php');
        exit();
    } elseif ($username === 'teacher' && $password === '1234') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'teacher';
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Premium Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f0f2f5;
}

/* Container */
.container{
    width:820px;
    max-width:95%;
    display:flex;
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,0.2);
}

/* RIGHT IMAGE */
.left{
    flex:1;
    background-image:url("./assets/images/login1.png");
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center;
    min-height:500px;
    position:relative;
}
.left::after{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.2);
}

/* LEFT FORM */
.right{
    flex:1;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:30px 10px;
}

.login-card{
    width:100%;
    max-width:350px;
}

.toggle{
    display:flex;
    justify-content:center;
    margin-bottom:25px;
}

.toggle button{
    padding:10px 25px;
    border:none;
    background:#e0e0e0;
    cursor:pointer;
    font-weight:600;
    border-radius:50px;
    margin:0 5px;
}

.toggle button.active{
    background:linear-gradient(to right,#6a11cb,#2575fc);
    color:#fff;
}

h2{
    text-align:center;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:14px;
    border-radius:50px;
    border:1px solid #ccc;
    margin:10px 0;
    outline:none;
}

.submit{
    width:100%;
    padding:14px;
    border:none;
    border-radius:50px;
    background:linear-gradient(to right,#6a11cb,#2575fc);
    color:#fff;
    font-size:16px;
    cursor:pointer;
    margin-top:15px;
}

.submit:hover{
    opacity:0.9;
}

.error{
    text-align:center;
    color:red;
    margin-bottom:10px;
}

/* Mobile */
@media(max-width:768px){
    .container{
        flex-direction:column;
    }
    .left{
        height:250px;
    }
}
</style>
</head>

<body>

<div class="container">

    <!-- LOGIN FIRST -->
    <div class="right">
        <div class="login-card">

            <div class="toggle">
                <button class="active" id="studentBtn">Student</button>
                <button id="teacherBtn">Teacher</button>
            </div>

            <h2>LOGIN</h2>

            <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

            <form method="POST">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="submit">Log In</button>
            </form>

        </div>
    </div>

    <!-- IMAGE AFTER LOGIN -->
    <div class="left"></div>

</div>

<script>
const studentBtn = document.getElementById("studentBtn");
const teacherBtn = document.getElementById("teacherBtn");
const username = document.getElementById("username");

studentBtn.onclick = () => {
    studentBtn.classList.add("active");
    teacherBtn.classList.remove("active");
    username.value = "student";
}

teacherBtn.onclick = () => {
    teacherBtn.classList.add("active");
    studentBtn.classList.remove("active");
    username.value = "teacher";
}
</script>

</body>
</html>
