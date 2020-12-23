/* function from Home Page*/
function like(n) {
    var count = 2000, likes = 1560, dislike = 440;
    if (n === 1) {
        count += 1;
        likes += n;
        var percent = (likes / count);
        document.getElementById("load").style.width = percent *100 + 'px';
        document.getElementById("load").style.backgroundColor = "red";
        document.getElementById("loading").style.backgroundColor = "green";
    }
    if (n === 2) {
        count += 1;
        dislike += 1;
        var percent = (dislike / count);
        document.getElementById("load").style.width = percent * 100 + 'px';
        document.getElementById("load").style.backgroundColor = "red";
        document.getElementById("loading").style.backgroundColor = "green";
    }
}
/* function from Artists Page*/
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
function rating(n) {
    var count = 10000, Ar = 8675, Ja = 8222, Ve = 9555, Be = 7999, Ch = 9684,temp = 0,temp2 = 0; 
    count += 1;
    if (n === A) {
        temp = (Ar / count) * 100;
        temp2 = 100 - temp;
        document.getElementById('Al').style.height = temp  + "%";
        document.getElementById('Ad').style.height = temp2  + "%";
    }
    if (n === J) {
        temp = (Ja / count) * 100;
        temp2 = 100 - temp;
        document.getElementById('Jl').style.height = temp  + "%";
        document.getElementById('Jd').style.height = temp2  + "%";
    }
    if (n === B) {
        temp = (Be / count) * 100;
        temp2 = 100 - temp;
        document.getElementById('Bl').style.height = temp  + "%";
        document.getElementById('Bd').style.height = temp2  + "%";
    }
    if (n === V) {
        temp = (Ve / count) * 100;
        temp2 = 100 - temp;
        document.getElementById('Vl').style.height = temp  + "%";
        document.getElementById('Vd').style.height = temp2  + "%";
    }
    if (n === C) {
        temp = (Ch / count) * 100;
        temp2 = 100 - temp;
        document.getElementById('Cl').style.height = temp  + "%";
        document.getElementById('Cd').style.height = temp2  + "%";
    }
}
/* function from Gallery Page*/
var slideIndex = 1;
    showSlides(slideIndex);
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }
    function s1(a) {
        if (a === 1) {
            $('#1').css('display', 'block'); 
            $('#name').html = "Photos of scenes of the First season";
            $('#2').css('display', 'none');
            $('#3').css('display', 'none');
            $('#4').css('display', 'none');
        }
        if (a === 2) {
            $('#1').css('display', 'none');
            $('#2').css('display', 'block'); 
            $('#name').html = "Photos of scenes of the Second season";
            $('#3').css('display', 'none');
            $('#4').css('display', 'none');
        }
        if (a === 3) {
            $('#1').css('display', 'none');
            $('#2').css('display', 'none');
            $('#3').css('display', 'block');
            $('#name').html = "Photos of scenes of the Third season";
            $('#4').css('display', 'none');
        }
        if (a === 4) {
            $('#1').css('display', 'none');
            $('#2').css('display', 'none');
            $('#3').css('display', 'none');
            $('#4').css('display', 'block'); 
            $('#name').html = "Photos of scenes of the Fourth season";
        }
    }

/* function from Login Page*/
function f() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (username == null || username == "") {
        alert("Please enter the username.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }
    if (username != null && password != null) {
        window.open('welcomeLogin.html');
    } else {
        alert('Login or password is wrong');
    }
}
/* function from Registration Page*/
function f1() {
    var gmail = document.getElementById("gmail").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var rpassword = document.getElementById("rpassword").value;
    if (gmail == null || gmail == "") {
        alert("Please enter the gmail.");
        return false;
    }
    if (username == null || username == "") {
        alert("Please enter the username.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }
    if (password != rpassword) {
        alert('Passwords are different');
    }
    if (gmail != null && username != null && password != null && password === rpassword) {
        window.open('welcomeRegist.html');
    } else {
        alert('Login or password is wrong');
    }
}