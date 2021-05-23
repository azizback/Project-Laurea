<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/carousel.css" rel="stylesheet" type="text/css"/>
        <link href="../css/index.css" rel="stylesheet" type="text/css" title="normal"/>
        <link href="../css/alternate.css" rel="alternate stylesheet" type="text/css" title="alternate"/>
        <script src="../javascript/switch.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
        <title>Project Laurea</title>
    </head>
    <body>
        <header>
            <navbar>
                <nav><a href="../index.php">Home page</a></nav>
                <nav><a class="active" href="#" >Contact</a></nav>
				<nav><a href="../php/table.php" >Booking</a></nav>
                <nav id="switch">
                    css
                    <a class="btn-switch" id="btn-id">
                        <span><button onclick="Switch('alternate')" >Alternate</button></span>
                        <br>
                        <span><button onclick="Switch('normal')" >Normal</button></span>
                    </a>
                </nav>
            </navbar>
        </header>
        <div id="map">
            <iframe width="100%" height="600" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d197294.4734084018!2d-0.5015960431457457!3d39.40770125143523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4cf0efb06f%3A0xb4a351011f7f1d39!2z0JLQsNC70LXQvdGB0LjRjywg0JjRgdC_0LDQvdC40Y8!5e0!3m2!1sru!2sde!4v1621810741604!5m2!1sru!2sde";ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                <a href="https://www.maps.ie/draw-radius-circle-map/">Google Maps radius calculator</a>
            </iframe>
        </div>
        <br/>
        <fieldset>
            <legend>Contact Info</legend>
            <label>☎: 077 4 93 82 12</label> <br>
            <label>✉: contact.me@outlook.fi</label><br>
            <label>⌂:  Finland</label>
        </fieldset>
        <img src="../img/Contact-background.jpg" alt="background" id="background-img">
    </body>
</html>
