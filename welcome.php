<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our typing test.</h1>
    </div>
    <p>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <div>
    <h1>text to copy:</h1>
    <p id="textHolder"></p>

    <form name="form">
      <textarea
        id="textarea"
        onkeyup="check(this.value)"
        name="message"
        rows="10"
        cols="30"
      onkeydown='return validateQty(event);'></textarea>
      <br /><br />
      <input type="submit" onclick="stopTimer()"?
    </form>

    <p id="errorInd" style="color: green;">Correct</p>
    <p id="timer">0</p>
  </div>
  <script>
    textarea = document.getElementById("textarea");
    errorInd = document.getElementById("errorInd");
    timer = document.getElementById("timer");
    var intervalID;
    var givenText =
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend nulla elit, eget luctus nunc hendrerit at. Aliquam laoreet lectus dui, et tempor enim pulvinar in. Aliquam sed aliquam felis";
    document.getElementById("textHolder").innerText = givenText;

    textarea.addEventListener("focus", function (ev) {
      if (timer.innerText != "0") return;
      intervalID = window.setInterval(function () {
        timer.innerText = 1 + parseInt(timer.innerText);
      }, 1000);
    });
    function check(ev) {
      console.log(ev);

      let length = ev.length;
      if (givenText.slice(0, length) === ev) {
        if (errorInd.style.color == "red") {
          errorInd.style.color = "green";
          errorInd.innerText = "Correct";
        }
      } else {
        errorInd.style.color = "red";
        errorInd.innerText = "Wrong";
      }
    }
    function stopTimer() {
      console.log("asdad");
      clearInterval(intervalID);
    }
    function validateQty(event) {
    var key = window.event ? event.keyCode : event.which;

if (event.key == 40 || event.keyCode == 38
 || event.keyCode == 37 || event.keyCode == 39) {
    return false;
}
else if ( event.keyCode == 8) {
    return false;
}
else return true;
};
  </script>
</body>
</html>