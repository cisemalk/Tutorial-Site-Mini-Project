<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css" type="text/css">
<body class="body">
    <h1 class="loginheader">
        Admin Login
    </h1>

    <div class="container">

    <form method="POST" action="login.php" name="myform" class="credentials">
        <table style="padding-bottom: 100px;" class="table">
            <tr id="username" class="row"> 
               
                <td class="credentialLabel">
                    Username
                    
                </td>
                <td>
                    <input type="text" name="usr" class="inputBox">
                </td>
            </tr>
            
            <tr id="password" class="row"> 
                <td class="credentialLabel">Password</td>
                <td><input type="password" name="pwd" class="inputBox" ></td>
            </tr>
            <br>
            <tr>
                <td class="submitArea"><input type="submit" id="submitButton" value="Log in"></td>
            </tr>
        </table>
    </form>
    </div>
    
</body>
</html>