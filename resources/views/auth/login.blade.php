<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        (function(w, i, g) {
            w[g] = w[g] || [];
            if (typeof w[g].push == 'function') w[g].push(i)
        })
        (window, 'GTM-WHH7CJ83', 'google_tags_first_party');
    </script>
    <script>
        (function(w, d, s, l) {
            w[l] = w[l] || [];
            (function() {
                w[l].push(arguments);
            })('set', 'developer_id.dYzg1YT', true);
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s);
            j.async = true;
            j.src = '/wzrt/';
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $config->nombre ?? 'Dental Gest' }}</title>
    <link rel="icon" type="image/png" 
    href="{{ $config && $config->logo 
        ? asset('storage/'.$config->logo) 
        : asset('dist/img/DentalGestLogoOficial.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
    <script data-cfasync="false" nonce="0543d1e9-718c-4120-a0a5-8a2f11250276">
        try {
            (function(w, d) {
                ! function(bH, bI, bJ, bK) {
                    if (bH.zaraz) console.error("zaraz is loaded twice");
                    else {
                        bH[bJ] = bH[bJ] || {};
                        bH[bJ].executed = [];
                        bH.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        bH.zaraz._v = "5876";
                        bH.zaraz._n = "0543d1e9-718c-4120-a0a5-8a2f11250276";
                        bH.zaraz.q = [];
                        bH.zaraz._f = function(bL) {
                            return async function() {
                                var bM = Array.prototype.slice.call(arguments);
                                bH.zaraz.q.push({
                                    m: bL,
                                    a: bM
                                })
                            }
                        };
                        for (const bN of ["track", "set", "debug"]) bH.zaraz[bN] = bH.zaraz._f(bN);
                        bH.zaraz.init = () => {
                            var bO = bI.getElementsByTagName(bK)[0],
                                bP = bI.createElement(bK),
                                bQ = bI.getElementsByTagName("title")[0];
                            bQ && (bH[bJ].t = bI.getElementsByTagName("title")[0].text);
                            bH[bJ].x = Math.random();
                            bH[bJ].w = bH.screen.width;
                            bH[bJ].h = bH.screen.height;
                            bH[bJ].j = bH.innerHeight;
                            bH[bJ].e = bH.innerWidth;
                            bH[bJ].l = bH.location.href;
                            bH[bJ].r = bI.referrer;
                            bH[bJ].k = bH.screen.colorDepth;
                            bH[bJ].n = bI.characterSet;
                            bH[bJ].o = (new Date).getTimezoneOffset();
                            if (bH.dataLayer)
                                for (const bR of Object.entries(Object.entries(dataLayer).reduce((bS, bT) => ({
                                        ...bS[1],
                                        ...bT[1]
                                    }), {}))) zaraz.set(bR[0], bR[1], {
                                    scope: "page"
                                });
                            bH[bJ].q = [];
                            for (; bH.zaraz.q.length;) {
                                const bU = bH.zaraz.q.shift();
                                bH[bJ].q.push(bU)
                            }
                            bP.defer = !0;
                            for (const bV of [localStorage, sessionStorage]) Object.keys(bV || {}).filter(bX => bX
                                .startsWith("_zaraz_")).forEach(bW => {
                                try {
                                    bH[bJ]["z_" + bW.slice(7)] = JSON.parse(bV.getItem(bW))
                                } catch {
                                    bH[bJ]["z_" + bW.slice(7)] = bV.getItem(bW)
                                }
                            });
                            bP.referrerPolicy = "origin";
                            bP.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bH[bJ])));
                            bO.parentNode.insertBefore(bP, bO)
                        };
                        ["complete", "interactive"].includes(bI.readyState) ? zaraz.init() : bH.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async bc => new Promise(bd => {
                    if (bc) {
                        bc.e && bc.e.forEach(be => {
                            try {
                                const bf = d.querySelector("script[nonce]"),
                                    bg = bf?.nonce || bf?.getAttribute("nonce"),
                                    bh = d.createElement("script");
                                bg && (bh.nonce = bg);
                                bh.innerHTML = be;
                                bh.onload = () => {
                                    d.head.removeChild(bh)
                                };
                                d.head.appendChild(bh)
                            } catch (bi) {
                                console.error(`Error executing script: ${be}\n`, bi)
                            }
                        });
                        Promise.allSettled((bc.f || []).map(bj => fetch(bj[0], bj[1])))
                    }
                    bd()
                });
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="hold-transition login-page"
    style="background-image: url('{{ url('assets/img/hero-bg.jpg') }}');
        background-repeat: no-repeat;
        background-size: 100vw 100vh;
        background-attachment: fixed">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                
                @if($config && $config->logo)
                    <img src="{{url('storage/'.$config->logo)}}" alt="Logo" width="100">
                @else
                    <img src="{{ url('dist/img/DentalGestLogoOficial.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-2" style="opacity: .8">
                @endif

                <a href="" class="h1">{{ $config->nombre ?? 'Dental Gest' }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">
                    <b>¡Bienvenido de nuevo!</b><br>
                    Por favor, ingresa tus credenciales para continuar.
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="email"
                                    class="col-form-label text-md-end">Correo: </label>
                                <div class="">
                                    <input id="email" type="email" 
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
<br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="password" class="col-form-label text-md-end">Contraseña</label>

                                <div class="">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
<br>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Iniciar sesión
                            </button>
                        </div>
                    </div>
                </form>

                <br>
                <!-- /.social-auth-links -->

                
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">¿No tienes cuenta? <b>Crear cuenta</b></a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js?v=3.2.0"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516"
        integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg=="
        data-cf-beacon='{"version":"2024.11.0","token":"2437d112162f4ec4b63c3ca0eb38fb20","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
        crossorigin="anonymous"></script>
</body>

</html>
