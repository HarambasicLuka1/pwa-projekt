document.getElementById("submit").onclick = function(event) {
    var form_send = true;
    var name_u_fld = document.getElementById("name_u");
    var name_u = document.getElementById("name_u").value;
    if (name_u.length <= 0) {
        form_send = false;
        document.getElementById("name_u_msg").innerHTML = "Potrebno je napisati ime<br>";
        document.getElementById("name_u_msg").style.color = "#ff0000"
        name_u_fld.style.borderColor = "#ff0000"
    }
    var s_name_u_fld = document.getElementById("s_name_u");
    var s_name_u = document.getElementById("s_name_u").value;
    if (s_name_u.length <= 0) {
    form_send = false;
    document.getElementById("s_name_u_msg").innerHTML = "Potrebno je napisati prezime<br>";
    document.getElementById("s_name_u_msg").style.color = "#ff0000"
    s_name_u_fld.style.borderColor = "#ff0000"
    }
    var u_name_u_fld = document.getElementById("u_name_u");
    var u_name_u = document.getElementById("u_name_u").value;
    if (u_name_u.length <= 0) {
        form_send = false;
        document.getElementById("u_name_u_msg").innerHTML = "Potrebno je napisati korisničko ime<br>";
        document.getElementById("u_name_u_msg").style.color = "#ff0000"
        u_name_u_fld.style.borderColor = "#ff0000"
    }
    var pass_fld = document.getElementById("pass_u");
    var pass = document.getElementById("pass_u").value;
    var pass_rep_fld = document.getElementById("rep_pass_u");
    var pass_rep = document.getElementById("rep_pass_u").value;
    if (pass != pass_rep || pass.length < 1) {
        form_send = false;
        pass_fld.style.borderColor = "#ff0000";
        pass_rep_fld.style.borderColor = "#ff0000";
        document.getElementById("pass_u_msg").innerHTML = "Lozinke trebaju biti iste";
        document.getElementById("rep_pass_u_msg").innerHTML = "Lozinke trebaju biti iste"
        document.getElementById("pass_u_msg").style.color = "#ff0000"
        document.getElementById("rep_pass_u_msg").style.color = "#ff0000"
    }
   if (form_send != true) {
    event.preventDefault();
    }
}