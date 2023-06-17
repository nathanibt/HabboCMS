<html>
    <head>
        <meta charset="utf-8">

        <title>Habbo: Wähle dein Passwort</title>

        <link type="text/css" href="css/registration.css" rel="stylesheet">
    </head>

    <body>        
        <div class="main">
            <div class="logo"></div>
            
            <div class="content-box" id="step-3">
                <div class="title-box">
                    <div class="title">Wähle dein Passwort</div>
                    <div class="steps">3 / 3</div>
                </div>

                <div class="png20">
                    <form method="post">
                        <div class="alert">Du musst ein Passwort angegeben haben.</div>
							
                        <label for="register-password">Passwort</label>
                        <input type="password" id="register-password" name="register-password">
                        <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

                        <div class="alert">Die angebenen Passwörter stimmen nicht überein!</div>
                        
                        <label for="register-password-repeat">Passwort wiederholen</label>
                        <input type="password" id="register-password-repeat" name="register-password-repeat">
                        <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

                        <a href="registration/abort" class="btn red back-register">Abbrechen</a>
                        <button class="btn green next-register">Weiter</button>

                        <div style="clear:both"></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>