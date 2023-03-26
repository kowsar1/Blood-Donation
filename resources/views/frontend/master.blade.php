<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Blood Donation </title>

    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/css/bootstrap.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/vendors/linericon/style.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/vendors/animate-css/animate.css">

    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/css/style.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/hosthub/css/responsive.css">
    @notifyCss
    <script nonce="6858e365-cd0c-4f62-a90d-cb1317fbbdd8">
        (function(w, d) {
            ! function(bv, bw, bx, by) {
                bv[bx] = bv[bx] || {};
                bv[bx].executed = [];
                bv.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bv.zaraz.q = [];
                bv.zaraz._f = function(bz) {
                    return function() {
                        var bA = Array.prototype.slice.call(arguments);
                        bv.zaraz.q.push({
                            m: bz,
                            a: bA
                        })
                    }
                };
                for (const bB of ["track", "set", "debug"]) bv.zaraz[bB] = bv.zaraz._f(bB);
                bv.zaraz.init = () => {
                    var bC = bw.getElementsByTagName(by)[0],
                        bD = bw.createElement(by),
                        bE = bw.getElementsByTagName("title")[0];
                    bE && (bv[bx].t = bw.getElementsByTagName("title")[0].text);
                    bv[bx].x = Math.random();
                    bv[bx].w = bv.screen.width;
                    bv[bx].h = bv.screen.height;
                    bv[bx].j = bv.innerHeight;
                    bv[bx].e = bv.innerWidth;
                    bv[bx].l = bv.location.href;
                    bv[bx].r = bw.referrer;
                    bv[bx].k = bv.screen.colorDepth;
                    bv[bx].n = bw.characterSet;
                    bv[bx].o = (new Date).getTimezoneOffset();
                    if (bv.dataLayer)
                        for (const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ, bK) => ({
                                ...bJ[1],
                                ...bK[1]
                            }))))) zaraz.set(bI[0], bI[1], {
                            scope: "page"
                        });
                    bv[bx].q = [];
                    for (; bv.zaraz.q.length;) {
                        const bL = bv.zaraz.q.shift();
                        bv[bx].q.push(bL)
                    }
                    bD.defer = !0;
                    for (const bM of [localStorage, sessionStorage]) Object.keys(bM || {}).filter((bO => bO.startsWith("_zaraz_"))).forEach((bN => {
                        try {
                            bv[bx]["z_" + bN.slice(7)] = JSON.parse(bM.getItem(bN))
                        } catch {
                            bv[bx]["z_" + bN.slice(7)] = bM.getItem(bN)
                        }
                    }));
                    bD.referrerPolicy = "origin";
                    bD.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bv[bx])));
                    bC.parentNode.insertBefore(bD, bC)
                };
                ["complete", "interactive"].includes(bw.readyState) ? zaraz.init() : bv.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <x:notify-messages />
   
    @yield('content')



    <script src="https://preview.colorlib.com/theme/hosthub/js/jquery-3.2.1.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/js/popper.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/js/bootstrap.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/js/stellar.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/vendors/isotope/isotope-min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/js/jquery.ajaxchimp.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/vendors/counter-up/jquery.counterup.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/js/mail-script.js"></script>
    <script src="https://preview.colorlib.com/theme/hosthub/js/theme.js"></script>
    @notifyJs
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    @stack('js')
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a9ebc59ddf29fbc","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>