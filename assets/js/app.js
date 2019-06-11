var firebaseConfig = {
    apiKey: "AIzaSyDdiK77QvILspkavDLs2siAJL9f20HA2Nc",
    authDomain: "ecommerce-php-mysql.firebaseapp.com",
    databaseURL: "https://ecommerce-php-mysql.firebaseio.com",
    projectId: "ecommerce-php-mysql",
    storageBucket: "ecommerce-php-mysql.appspot.com",
    messagingSenderId: "762591586976",
    appId: "1:762591586976:web:5099c366188fe0ba"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

//Identificacion de elementos HTML
const txtEmail = document.getElementById('correo');
const txtPassword = document.getElementById('contrasena');
const btnLogin = document.getElementById('login');
const btnRegister = document.getElementById('registrar');


//Inicio de sesion
btnLogin.addEventListener('click', function(){
    let email = txtEmail.value;
    let pass = txtPassword.value;
    firebase.auth().signInWithEmailAndPassword(email, pass).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...
      });
});

//Registro de nuevo usuario
btnRegister.addEventListener('click', function(){
    let email = txtEmail.value;
    let pass = txtPassword.value;  
    firebase.auth().createUserWithEmailAndPassword(email, pass).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(errorMessage);
        // ...
      });
});

//Estado de usuario / SignIn o SignOut
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log('Bienvenido' + user.email);
        location.href = 'admin/admin.php';
    } else {
      console.log('No se ha iniciado sesión');
    }
  });
