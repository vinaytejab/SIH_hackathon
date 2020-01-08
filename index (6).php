<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <title>GOA</title>
<!-- Firebase -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAKd5xQtlYZLGU8Oc1O4-MhtR1N6fGx3M&callback"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js"></script>
       <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-storage.js"></script>

  <script>
  
  

 // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyBIHDt3IWtK7yw0fwIRmByz5AgLJ2pTm6M",
    authDomain: "jntuhat.firebaseapp.com",
    databaseURL: "https://jntuhat.firebaseio.com",
    projectId: "jntuhat",
    storageBucket: "gs://jntuhat.appspot.com/",
    messagingSenderId: "585431580345",
    appId: "1:585431580345:web:d606192627bee027"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  </script>
    
    <script src="https://www.gstatic.com/firebasejs/ui/4.3.0/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.3.0/firebase-ui-auth.css" />
    <script type="text/javascript">

    // Check State change (sign in and sign out)
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.

    var user = firebase.auth().currentUser;

    if(user != null){
// Display user Phone Number
    var phonenumber = user.phoneNumber;
    var pincode = localStorage.getItem("pincode");
    // Display Form for profile
    if(pincode == null)
    {
     document.getElementById("phonenumber").value = phonenumber;
     document.getElementById("profileform").style.display = "block";
     }
else
{    
   document.getElementById("pincode").value = pincode;
             if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
   document.getElementById("locationmessage").innerHTML = "Couldn't get Location. Ensure that GPS is turned On";
    document.getElementById("submitcomplain").style.display = "none";
    }
  function showPosition(position) {

  var userlat= position.coords.latitude; 
   var userlong = position.coords.longitude;
        document.getElementById("complainphonenumber").value = phonenumber;
   document.getElementById("latitude").value = userlat;
     document.getElementById("longitude").value = userlong;
 document.getElementById("complainform").style.display = "block";  
document.getElementById("locationmessage").innerHTML = "Current Location Obtained";
}

}
    }

  } else {
    // No user is signed in.
// Display Firebase form for authentication (Since no user is signed in)

   ui.start('#firebaseui-auth-container', uiConfig);
       
         
  }
});
      
    

      var ui = new firebaseui.auth.AuthUI(firebase.auth());
      // The start method will wait until the DOM is loaded.
         // FirebaseUI config.
      var uiConfig = {
        callbacks: {
          signInSuccessWithAuthResult: function(authResult, redirectUrl) {
            var user = authResult.user;
            var credential = authResult.credential;
            var isNewUser = authResult.additionalUserInfo.isNewUser;
            var providerId = authResult.additionalUserInfo.providerId;
            var operationType = authResult.operationType;
            // Do something with the returned AuthResult.
            // Return type determines whether we continue the redirect automatically
            // or whether we leave that to developer to handle.
            return false;
          },
          signInFailure: function(error) {
            // Some unrecoverable error occurred during sign-in.
            // Return a promise when error handling is completed and FirebaseUI
            // will reset, clearing any UI. This commonly occurs for error code
            // 'firebaseui/anonymous-upgrade-merge-conflict' when merge conflict
            // occurs. Check below for more details on this.
            return handleUIError(error);
          },
          uiShown: function() {
            // The widget is rendered.
            // Hide the loader.
            document.getElementById('loader').style.display = 'none';
          }
        },
        credentialHelper: firebaseui.auth.CredentialHelper.ACCOUNT_CHOOSER_COM,
        // Query parameter name for mode.
        queryParameterForWidgetMode: 'mode',
        // Query parameter name for sign in success url.
        queryParameterForSignInSuccessUrl: 'signInSuccessUrl',
        // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
        signInFlow: 'popup',
        signInSuccessUrl: 'custom.php',
        signInOptions: [
          // Leave the lines as is for the providers you want to offer your users.
          {
            provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
           
            // Invisible reCAPTCHA with image challenge and bottom left badge.
            recaptchaParameters: {
              type: 'image',
              size: 'invisible',
              badge: 'bottomleft'
            },
            whitelistedCountries: ['IND', '+91']
          },
         
        ],
        // Set to true if you only have a single federated provider like
        // firebase.auth.GoogleAuthProvider.PROVIDER_ID and you would like to
        // immediately redirect to the provider's site instead of showing a
        // 'Sign in with Provider' button first. In order for this to take
        // effect, the signInFlow option must also be set to 'redirect'.
        immediateFederatedRedirect: false,
        // tosUrl and privacyPolicyUrl accept eicther url string or a callback
        // function.
        // Terms of service url/callback.
        tosUrl: '<your-tos-url>',
        // Privacy policy url/callback.
        privacyPolicyUrl: function() {
          window.location.assign('<your-privacy-policy-url>');
        }
      };
   
    </script>
    <link rel="stylesheet" href="styles.css">
    
  </head>
  <body>
    <!-- The surrounding HTML is left untouched by FirebaseUI.
         Your app may use that space for branding, controls and other customizations.-->
 <br/>
<!-- Firebase Authentication Form -->
    <div id="firebaseui-auth-container"></div>
    
    
    <!-- Profile Form -->
    <form class="container" id="profileform" style="display:none" method="post" action="sql.php">

    <center><h4>PROFILE</h4></center>
    <br/>
        <br/>

<div class="form-group" style="display:none">
<input  type="text" name="phonenumber" id="phonenumber" value="" />
              <label for="input" class="control-label">NUMBER</label><i class="bar"></i>
            </div>  
            
            
            <div class="form-group">
<input  type="number" name="savepincode" id="savepincode" value=""/>
              <label for="input" class="control-label">PINCODE</label><i class="bar"></i>
            </div>  
                  <br/>
                  
              <div class="form-group">
<textarea  type="textarea" name="address" id="address" value=""></textarea>
              <label for="input" class="control-label">ADDRESS</label><i class="bar"></i>
            </div> 
                  <br/>
              <div class="form-group">
<select id="gender" name="gender">
  <option  value="male">Male</option>
  <option  value="female">Female</option>
</select>
              <label for="input" class="control-label">GENDER</label><i class="bar"></i>
            </div> 

<div id="profileerror"></div>

<center><button  class="button"  id="save"><span>SAVE</span></button></center>

</form>



<!-- Complain Form -->
 <form class="container" id="complainform" action="complain.php" method="post" style="display:none">
 
    <center><h4>COMPLAIN DETAILS</h4></center>
    <br/>
        <br/>

    <div class="form-group">
<input  type="number" name="pincode" id="pincode" value=""/>
              <label for="input" class="control-label">PINCODE</label><i class="bar"></i>
            </div>  
                  <br/>
                  
     
     <input id="complainimg" type="file" name="complainimg" style="width:100%;" accept=".png, .jpg, .jpeg">
        <progress value="0" max="100" id="uploader"></progress>
      <div>
            <div id="imagePreview">
            <img id="img" width="100%" src="../image/logo.png" style="display:none;">
            </div>
        </div>
     
            <br/>
             <div class="form-group" style="display:none;">
<input  type="text" name="phonenumber" id="complainphonenumber" value="" readonly/>
              <label for="input" class="control-label">PHONE NUMBER</label><i class="bar"></i>
            </div> 
            <br/>
              <div class="form-group" style="display:none;">
<input  type="text" name="latitude" id="latitude" value="" readonly/>
              <label for="input" class="control-label">LATITUDE</label><i class="bar"></i>
            </div>  
            
                  <br/>
            
                  <div class="form-group" style="display:none;">
<input  type="text" name="longitude" id="longitude" value="" readonly/>
              <label for="input" class="control-label">LONGITUDE</label><i class="bar"></i>
            </div>   
            <br/>
 
     <br/>

            <br>
            <div class="form-group" style="display:none;">
<input  type="text" name="imgurl" id="imgurl" value="" readonly/>
              <label for="input" class="control-label">imgurl</label><i class="bar"></i>
            </div>   

     
                  <div id="locationmessage"></div>
                  
                  <br/>
     <center><button  class="button"  id="submitcomplain" style="display:none;"><span>SUBMIT</span></button></center>
<br/>
</form>

<!-- Your Google API (key) -->

<script>
//for the image
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img').attr({ src: e.target.result});
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#complainimg").change(function() {
    readURL(this);
});


//to upload the image and get the download link for the image and display it in html
var artup = document.getElementById('complainimg');

var uploader = document.getElementById('uploader');
artup.addEventListener('change', function(e){
  var file = e.target.files[0];

  var upart = firebase.storage().ref('complainimg/' + file.name);
  // console.log(upart);
  var load = upart.put(file);
  load.on('state_changed',
  function progress(snapshot){
    var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
    uploader.value = percentage;
  },
  
  //runs if there is an error in uploading
    function error(err){
      alert("error");
    },

    //runs when complainimg is uploaded
    function complete(){
      upart.getDownloadURL().then(function(url) {
         document.getElementById('imgurl').value = url;
        $("#img").attr({
          src: url
        });
    },
  )
  document.getElementById('img').style.display="block";
   document.getElementById('submitcomplain').style.display="block";
    });
});

</script>
  </body>
</html>