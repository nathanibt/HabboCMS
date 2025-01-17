<html>
<head>
    <meta charset="utf-8">

    <title>Habbo: Sonay</title>

    <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body>
	<div id="header-content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="hotel"></div>

					<div class="online-count-box"><b>1337</b>Habbos online</div>

					<a href="client" class="btn green big check-in-header" target="_blank">Ins Habbo Hotel</a>
				</div>
			</div>
		</div>
	</div>
	<div id="header-menu">
		<div class="container">
			<div class="row">
				<div class="col-5">
					<ul class="user-menu">
						<li>
							<a href="me.php">
								<div class="user-avatar-menu" style="background-image:url(http://habbo.com/habbo-imaging/avatarimage?figure=hr-155-31.lg-275-82.hd-180-1391.ch-3323-73-1408.sh-295-1408&head_direction=3&gesture=sml)"></div>Sonay<span><i class="far fa-angle-down"></i></span>
							</a>

							<ul class="user-subnavi">
								<li><a href="profile.php">Meine Seite</a></li>
								<li><a href="settings.php">Einstellungen</a></li>
								<li><a href="" class="logout">Abmelden</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-2">
					<a href="\" class="logo"></a>
				</div>
				<div class="col-5">
					<ul class="navigation">
						<li>
							<a href="community.php">Community<span><i class="far fa-angle-down"></i></span></a>

							<ul class="subnavi">
								<li><a href="news.php">News</a></li>
								<li><a href="staffs.php">Mitarbeiter</a></li>
								<li><a href="photos.php">Fotos</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
<link type="text/css" href="css/settings.css" rel="stylesheet">
<div class="col-4">
    <a href="settings_general.php" id="settings-navigation-box">
        <div class="png20">
            <i class="far fa-cog icon"></i>
            <div class="settings-title">Allgemeine Einstellungen</div>
            <div class="settings-desc">Lorem ipsum dolor sit amet,</div>
        </div>
        <div class="clear"></div>
    </a>
    <a href="settings_mail.php" id="settings-navigation-box">
        <div class="png20">
            <i class="far fa-envelope icon"></i>
            <div class="settings-title">E-Mail Adresse ändern</div>
            <div class="settings-desc">Lorem ipsum dolor sit amet,</div>
        </div>
        <div class="clear"></div>
    </a>
    <a href="settings_password.php" id="settings-navigation-box" class="selected">
        <div class="png20">
            <i class="far fa-lock-open-alt icon"></i>
            <div class="settings-title">Passwort ändern</div>
            <div class="settings-desc">Lorem ipsum dolor sit amet,</div>
        </div>
        <div class="clear"></div>
    </a>
</div>
<div class="col-8">
    <div class="alert failed">Du musst die Felder ausgefüllt haben.</div>

    <div id="content-box" style="height:570px">
        <div class="title-box png20">
            <div class="title">Passwort ändern</div>
        </div>

        <div class="png20">
            <form method="post">
                <label for="old-password">Altes Password</label>
                <input type="password" id="old-password" name="old_password">
                <div class="desc" style="margin: 0 0 20px 0">Dies benötigen wir, um sicher zu stelllen, dass du der Besitzer des Accounts bist.</div>
                <div class="line"></div>

                <label for="new-password">Neues Password</label>
                <input type="password" id="new-password" name="new_password">
                <div class="desc">Dein neues Passwort sollte wenn möglich mehr als 6 Zeichen beinhalten!.</div>

                <label for="new-password-repeat">Neue E-Mail Adresse wiederholen</label>
                <input type="password" id="new-password-repeat" name="new_password_repeat">
                <div class="desc">Um die Richtigkeit des neuen Passworts zu überprüfen.</div>

                <button class="btn green save">Speichern</button>
            </form>
        </div>
    </div>
</div>

			<div class="col-12">
				<div id="footer-content">
                    <ul class="footer-links">
                        <li><a href="">Impressum</a></li>
                        <li><a href="">Nutzungsbedingungen</a></li>
                        <li><a href="">Kontakt</a></li>
                    </ul>

                    <p>Copyright &copy; <?= date('Y'); ?> Habbo Hotel. All rights reserved.<br />Habbo is no way affiliated with Sulake Corporation Oy.<br />Powered by <b>RocketCMS</b> and <b>Design</b> by <b>Sonay</b></p>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>