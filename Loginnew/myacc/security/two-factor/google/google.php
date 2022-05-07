<php






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
 body {
        font-family: Arial, Helvetica, sans-serif;
    }
    /* Split the screen in half */
    
    .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
    }
    /* Control the left side */
    
    .left {
        left: 0;
        background-color: #111;
    }
    /* Control the right side */
    
    .right {
        right: 0;
        background-color: red;
    }
    /* If you want the content centered horizontally and vertically */
    
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    /* Style the image inside the centered container, if needed */
    
    .centered img {
        width: 150px;
        border-radius: 50%;
    }
    
    * {
        box-sizing: border-box;
    }
    /* Full-width input fields */
    
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    /* Add a background color when the inputs get focus */
    
    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    /* Set a style for all buttons */
    
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    
    button:hover {
        opacity: 1;
    }
    /* Extra styles for the cancel button */
    
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }
    /* Float cancel and signup buttons and add an equal width */
    
    .cancelbtn,
    .signupbtn {
        float: left;
        width: 50%;
    }
    /* Add padding to container elements */
    
    .container {
        padding: 16px;
    }
    /* The Modal (background) */
    
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: #474e5d;
        padding-top: 50px;
    }
    /* Modal Content/Box */
    
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }
    /* Style the horizontal ruler */
    
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    /* The Close Button (x) */
    
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }
    
    .close:hover,
    .close:focus {
        color: #f44336;
        cursor: pointer;
    }
    /* Clear floats */
    
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    /* Change styles for cancel button and signup button on extra small screens */
    
    @media screen and (max-width: 300px) {
        .cancelbtn,
        .signupbtn {
            width: 100%;
        }
    }
    
    .sub-entry {
        float: left;
        width: 50%;
    }
    
    .or {
        display: flex;
        flex-direction: row;
        /* margin-bottom: 1.2rem; */
        align-items: center;
        border-left: 1px solid #ccc;
        height: 500px;
        margin-top: 70px;
        position: absolute;
        left: 50%;
    }
    
    .or .bar {
        flex: auto;
        border: none;
        height: 1px;
        background: #aaa;
    }
    
    .or span {
        color: #ccc;
        padding: 0 0.8rem;
    }



</style>
</head>
<body>
    <!-- Email Authentication -->
    <div class="sub-entry">
    
    <form class="modal-content" action="/action_page.php">
    
        <div class="container">
            <h2>Google Authenticator</h2>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
    
            <label for="psw"><b>OTP</b></label>
            <input type="password" placeholder="Enter OTP received" name="psw" required>
    
            <div class="clearfix">
                <button type="submit" class="signupbtn">Submit</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>