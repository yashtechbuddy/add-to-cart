<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Bootstrap Form Example</title>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type=""> 
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDWdBYR2vm2WQ1s04wtX-IlpmE8bwQsw-A",
    authDomain: "trading-98e9f.firebaseapp.com",
    databaseURL: "https://trading-98e9f-default-rtdb.firebaseio.com",
    projectId: "trading-98e9f",
    storageBucket: "trading-98e9f.appspot.com",
    messagingSenderId: "412838338055",
    appId: "1:412838338055:web:b825fd0eda62c1e0f814a2",
    measurementId: "G-8P6BKJWJ7F"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</head>
<body>

<div class="container mt-5">
  <h2>Sample Form with Bootstrap</h2>
  <form>
    <div class="form-group">
      <label for="name">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="number">
    </div>
    <button type="button" class="btn btn-primary" onclick="phoneAuth();">send otp</button>
  </form>

  <form>
    <div class="form-group">
      <label for="name">code:</label>
      <input type="text" class="form-control" id="verificationCode" placeholder="verification">
    </div>
    <button type="button" class="btn btn-primary" onclick="codeverify();">verified</button>
  </form>
</div>

<!-- Add Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
//     window.onload = function() {
//     render();
// };

// function render() {
//     window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
//     recaptchaVerifier.render();
// }

function phoneAuth() {
    //get the number
    var number = document.getElementById('phone').value;
    // alert(number);
    //it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number).then(function(confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        alert("Message sent");
    }).catch(function(error) {
        alert(error.message);
    });
}

function codeverify() {
    var code = document.getElementById('verificationCode').value;


    coderesult.confirm(code).then(function(result) {
        alert("Successfully registered");
        var user = result.user;
        console.log(user);
    }).catch(function(error) {
        alert(error.message);
    });
}
</script>


</body>
</html>
