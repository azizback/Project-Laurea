<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/carousel.css" rel="stylesheet" type="text/css"/>
        <link href="css/index.css" rel="stylesheet" type="text/css" title="normal"/>
        <link href="css/alternate.css" rel="alternate stylesheet" type="text/css" title="alternate"/>
        <script src="javascript/switch.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="favicon.png"/>
        <title>Project Laurea</title>
    </head>
    <body>
        <header>
            <navbar>
                <nav><a class="active" href="index.php">Home page</a></nav>
                <nav><a href="php/contact.php" >Contact</a></nav>
				<nav><a href="php/table.php" >Booking</a></nav>
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
        <main>
            <figure>
                <img src="img/carousel1.png" alt="1 img carousel">
                <img src="img/carousel2.png" alt="2 img carousel">
                <img src="img/carousel3.png" alt="3 img carousel">
                <img src="img/carousel4.png" alt="4 img carousel">
            </figure> 
            <section>
			<p id="Lorem"> Beautiful sunny houses in fantastic places.</p>
                <p id="Lorem">
We've taken care to detail the accommodation to make your stay a great experience with barbecue, air conditioning and detailed things.
 It's the perfect place to spend holidays with the family, as a couple or with friends who are looking for tranquility and quality. 
 If you are looking for a comfortable stay in a privileged environment make your reservation with us.</p>
			<p id="Lorem" >This place is special because it combines the captivation of the sea with the contrast of the mountain doing a very special place. The bungalow is in a very calm urbanization with services as supermarket (opened from monday to saturday), drugstore, restaurant, hairdresser's shop and sports tracks of tennis and paddle. The this inhabited urbanization all the year round though specially in summer.
We have lot of fantastic reviews and we try to do our best for you from the first moment until your holidays end. </p>
            </section>
        </main>
            

    </body>
</html>
