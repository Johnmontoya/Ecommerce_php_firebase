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

const btnSignOut = document.getElementById('cerrarSession');

//Cerrar Sesión
btnSignOut.addEventListener('click', function(){
    firebase.auth().signOut();
});

//Estado de usuario / SignIn o SignOut
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        name = user.email;
        console.log('Bienvenido' + name);        
        document.getElementById('usuarioNombre').innerHTML = name;

    } else {
      console.log('No se ha iniciado sesión');
      location.href = '../index.php';
    }
  });