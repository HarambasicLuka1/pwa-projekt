document.getElementById("submit").onclick = function(event) {
    var form_send = true;
    var u_name_u_fld = document.getElementById("u_name_u");
    var u_name_u = document.getElementById("u_name_u").value;
    if (u_name_u.length <= 0) {
        form_send = false;
        document.getElementById("u_name_u_msg").innerHTML = "Potrebno je upisati korisničko ime<br>";
        document.getElementById("u_name_u_msg").style.color = "#ff0000"
        u_name_u_fld.style.borderColor = "#ff0000"
    }
    var pass_fld = document.getElementById("pass_u");
    var pass = document.getElementById("pass_u").value;
    if (pass.length < 1) {
        form_send = false;
        pass_fld.style.borderColor = "#ff0000";
        document.getElementById("pass_u_msg").innerHTML = "Potrebno je upisati lozinku";
        document.getElementById("pass_u_msg").style.color = "#ff0000"
    }
   if (form_send != true) {
    event.preventDefault();
    }
}