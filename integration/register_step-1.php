<html>
    <head>
        <meta charset="utf-8">

        <title>Habbo: Wähle dein Geschlecht und dein Geburtsdatum!</title>

        <link type="text/css" href="css/registration.css" rel="stylesheet">
    </head>

    <body>
        <div class="main" style="margin-top: 100px">
            <div class="logo"></div>
            
            <div class="content-box" id="step-1">
                <div class="title-box">
                    <div class="title">Geschlecht und Geburtsdatum</div>
                    <div class="steps">1 / 3</div>
                </div>

                <div class="png20">
                    <form method="post">
                        <input type="hidden" id="gender" name="gender" value="">

                        <div class="alert">Du musst ein Geschlecht ausgewählen.</div>
						
                        <div class="genders">
                            <label for="male" onclick="$('#gender').val('M')"><div class="male" style="background-image:url(https://www.habbo.de/habbo-imaging/avatarimage?figure=hd-180-1.hr-893-45.lg-280-64.sh-300-64.fa-1201-0.ch-255-62&size=l&headonly=1)"></div></label>

                            <label for="female" onclick="$('#gender').val('F')"><div class="female" style="background-image:url(https://www.habbo.de/habbo-imaging/avatarimage?figure=hd-600-1.hr-540-45.lg-695-62.sh-905-62.ch-660-62&size=l&head_direction=4&headonly=1)"></div></label>
                        </div>
                        <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

                        
                        <div class="alert">Du hast kein gültiges Geburtsdatum angegeben.</div>
                        
                        <select name="day" id="day" style="width:20%">
                            <option value="">Tag</option>
                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                        <select name="month" id="month" style="width:58%">
                            <option value="">Monat</option>
                            <option value="01">Januar</option>
                            <option value="02">Februar</option>
                            <option value="03">März</option>
                            <option value="04">April</option>
                            <option value="05">Mai</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Dezember</option>
                        </select>
                        <select name="year" id="year" style="width:20%">
                            <option value="">Jahr</option>
                            <?php for ($i = date('Y') - 12; $i >= 1950; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                        <script type="text/javascript">
                            document.getElementById('day').selectedIndex = '';
                            document.getElementById('month').selectedIndex = '';
                            document.getElementById('year').selectedIndex = '';
                        </script>
                        <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

                        <div style="clear:both"></div>

                        <a href="\" class="btn red back-register">Zurück</a>
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