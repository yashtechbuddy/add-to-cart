<script type='text/javascript' src='<?php echo $path ?>assets/js/jquery-3.6.0.min.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/jquery.fancybox.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/jQuery.style.switcher.min.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/color-scheme.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/owl.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/swiper.min.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/isotope.min.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/countdown.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/simpleParallax.min.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/appear.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/jquery.countTo.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/sharer.js'></script>
<script type='text/javascript' src='<?php echo $path ?>assets/js/validation.js'></script>
<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="<?php echo $path ?>assets/js/gmaps.js"></script>
<script src="<?php echo $path ?>assets/js/map-helper.js"></script>
<!-- main-js -->
<script type='text/javascript' src='<?php echo $path ?>assets/js/creote-extension.js'></script>
<!-- <script type="text/javascript">
// Function to send an AJAX request to unset_all_session.php when the window is closed
function unsetAllSessionOnUnload() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'unset_all_session.php', true);
    xhr.send();
}

// Attach the event listener for window close
window.addEventListener('beforeunload', unsetAllSessionOnUnload);
</script> -->



<!-- <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script> -->

<script type="text/javascript">
// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
// const firebaseConfig = {
//   apiKey: "AIzaSyDWdBYR2vm2WQ1s04wtX-IlpmE8bwQsw-A",
//   authDomain: "trading-98e9f.firebaseapp.com",
//   projectId: "trading-98e9f",
//   storageBucket: "trading-98e9f.appspot.com",
//   messagingSenderId: "412838338055",
//   appId: "1:412838338055:web:b825fd0eda62c1e0f814a2",
//   measurementId: "G-8P6BKJWJ7F"
// };

// Initialize Firebase
//      firebase.initializeApp(firebaseConfig);

// 
</script>
<!-- // <script src="includes/
// firebase.js"></script> -->

<?php 
if(isset($_SESSION['login-customer'])){ ?>
<script>
let card = document.querySelector(".card-profile"); //declearing profile card element
let displayPicture = document.querySelector(".display-picture"); //declearing profile picture
document.addEventListener('click', function(event) {
    // Check if the clicked element is inside the dropdown or the display picture
    if (!card.contains(event.target) && !displayPicture.contains(event.target)) {
        card.classList.add('hidden');
    }
});


displayPicture.addEventListener("click", function() { //on click on profile picture toggle hidden class from css
    card.classList.toggle("hidden")
})
</script>

<?php }?>