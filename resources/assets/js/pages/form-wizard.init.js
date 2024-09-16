document.querySelector("#profile-img-file-input") && 
document.querySelector("#profile-img-file-input").addEventListener("change", function () {
    var e = document.querySelector(".user-profile-image"),
        t = document.querySelector(".profile-img-file-input").files[0],
        r = new FileReader();

    r.addEventListener("load", function () {
        e.src = r.result;
    }, false);

    t && r.readAsDataURL(t);
});

document.querySelectorAll(".form-steps") && 
Array.from(document.querySelectorAll(".form-steps")).forEach(function (l) {
    l.querySelectorAll(".nexttab") && 
    Array.from(l.querySelectorAll(".nexttab")).forEach(function (t) {
        var e = l.querySelectorAll('button[data-bs-toggle="pill"]');
        
        Array.from(e).forEach(function (e) {
            e.addEventListener("show.bs.tab", function (e) {
                e.target.classList.add("done");
            });
        });

        t.addEventListener("click", function () {
            l.classList.add("was-validated");
            
            l.querySelectorAll(".tab-pane.show .form-control").forEach(function (e) {
                //for email validation add this
                // && e.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)
                if (e.value.length > 0) {
                    var nextTab = t.getAttribute("data-nexttab");
                    document.getElementById(nextTab).click();
                    l.classList.remove("was-validated");
                }
            });
        });
    });

    l.querySelectorAll(".previestab") && 
    Array.from(l.querySelectorAll(".previestab")).forEach(function (o) {
        o.addEventListener("click", function () {
            var e = o.getAttribute("data-previous"),
                t = o.closest("form").querySelectorAll(".custom-nav .done").length,
                r = t - 1;

            for (; r < t; r++) {
                o.closest("form").querySelectorAll(".custom-nav .done")[r] && 
                o.closest("form").querySelectorAll(".custom-nav .done")[r].classList.remove("done");
            }

            document.getElementById(e).click();
        });
    });

    var a = l.querySelectorAll('button[data-bs-toggle="pill"]');
    a && Array.from(a).forEach(function (r, o) {
        r.setAttribute("data-position", o);
        
        r.addEventListener("click", function () {
            var e;
            l.classList.remove("was-validated");

            if (r.getAttribute("data-progressbar")) {
                e = document.getElementById("custom-progress-bar").querySelectorAll("li").length - 1;
                var progress = (o / e) * 100;
                document.getElementById("custom-progress-bar").querySelector(".progress-bar").style.width = progress + "%";
            }

            if (l.querySelectorAll(".custom-nav .done").length > 0) {
                Array.from(l.querySelectorAll(".custom-nav .done")).forEach(function (e) {
                    e.classList.remove("done");
                });
            }

            for (var t = 0; t <= o; t++) {
                a[t].classList.contains("active") ? a[t].classList.remove("done") : a[t].classList.add("done");
            }
        });
    });
});
