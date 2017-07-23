    $(document).ready(function () {
        /*
         * generic back button function to return user to main task table
         */
  $('.backButton').click(function() {
        location.href = "/index.php?/Page";
    });
});
 

    function gnuOverhead() {
        console.log("XClacksOverhead");
        console.log("GNU Terry Pratchett : sent");
    }


    function setCookie(text, cvalue, exp) {
        console.log(text + " " + cvalue + " " + exp);
        $.cookie(text, cvalue, {expires: exp});
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var user = getCookie("username");
        if (user != "") {
            alert("Welcome again " + user);
        } else {
            user = prompt("Please enter your name:", "");
            if (user != "" && user != null) {
                setCookie("username", user, 365);
            }
        }
    }