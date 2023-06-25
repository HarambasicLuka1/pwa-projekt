document.getElementById("submit").onclick = function(event) {
    var form_send = true;
    var title_fld = document.getElementById("title");
    var title = document.getElementById("title").value;
    if (title.length <= 5) {
        form_send = false;
        document.getElementById("title_msg").innerHTML = "Naslov mora biti duži od 5 znakova<br>";
        document.getElementById("title_msg").style.color = "#ff0000"
        title_fld.style.borderColor = "#ff0000"
    }
    else if (title.length >= 29) {
        form_send = false;
        document.getElementById("title_msg").innerHTML = "Naslov mora biti kraći od 30 znakova<br>";
        document.getElementById("title_msg").style.color = "#ff0000";
        title_fld.style.borderColor = "#ff0000"
    }
    var c_news_fld = document.getElementById("c_news");
    var c_news = document.getElementById("c_news").value;
    if (c_news.length <= 10) {
    form_send = false;
    document.getElementById("c_news_msg").innerHTML = "Sažetak mora biti duži od 10 znakova<br>";
    document.getElementById("c_news_msg").style.color = "#ff0000"
    c_news_fld.style.borderColor = "#ff0000"
    }
    else if (title.length >= 99) {
        form_send = false;
        document.getElementById("title_msg").innerHTML = "Sažetak mora biti kraći od 100 znakova<br>";
        document.getElementById("title_msg").style.color = "#ff0000";
        c_news_fld.style.borderColor = "#ff0000"
    }
    var news_fld = document.getElementById("news");
    var news = document.getElementById("news").value;
    if (news.length <= 0) {
        form_send = false;
        document.getElementById("news_msg").innerHTML = "Potrebno je napisati vijest<br>";
        document.getElementById("news_msg").style.color = "#ff0000"
        news_fld.style.borderColor = "#ff0000"
    }
   if (form_send != true) {
    event.preventDefault();
    }
}