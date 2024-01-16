<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Urdan | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
   @include("admin.includes.header")
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset("/admin-assets")}}/assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
<div class="content">
    <div class="brand">
        <a class="link" href="{{route("/")}}">URDAN ADMIN</a>
    </div>
    <form  action="{{route("login")}}" method="post">
        @csrf
        <h2 class="login-title">Log in</h2>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">Login</button>
        </div>


        <div class="text-center">Not a member?
            <a class="color-blue" href="{{route("register")}}">Create account</a>
        </div>
    </form>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>

<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS -->
@include("admin.includes.script")
<!-- PAGE LEVEL PLUGINS -->
<script src="{{asset("/admin-assets")}}/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    $(function() {
        $('#login-form').validate({
            errorClass: "help-block",
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            highlight: function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
        });
    });
</script>
</body>

</html>
