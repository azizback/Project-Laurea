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
        <script src="../javascript/booking.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
        <title>Project Laurea</title>
          <script src="js/daypilot/daypilot-all.min.js"></script>

    </head>
    <body>
        <header>
            <navbar>
                <nav><a href="../index.php">Home page</a></nav>
                <nav><a href="contact.php" >Contact</a></nav>
                <nav><a class="active" href="#" >Booking</a></nav>
				<nav><a href="update.php" >Update</a></nav>
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
        
        <?php

		
		include_once("db.php");
	
		

		if(isset($_POST['submit'])) {
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $house = $_POST['house'];
		 $start_date = $_POST['firstdate'];
		 $end_date = $_POST['lastdate'];

		 // checking empty fields
		 if(empty($name) || empty($email)) {
		 if(empty($name)) {
		 echo "<font color='red'>Name field is empty.</font><br/>";
		 }

		 if(empty($email)) {
		 echo "<font color='red'>Email field is empty.</font><br/>";
		 }


		 if($end_date>=$start_date) {
		 // if all the fields are filled (not empty)
		 //insert data to database
		 $result = mysqli_query($mysqli, "INSERT INTO booking(name,email,house,start_date,end_date)
		VALUES('$name','$email','$house','$start_date','$end_date')");
		
		 //display success message
		echo '<p style="color:green;margin-top: 5%;">Your booking has been registered</p>';	
		 //echo "<br/><a href='index.php'>View Result</a>";
		 }              
		 else{
                  echo '<p style="color:red;margin-top: 5%;">Your booking has failed</p>';
             }
		}
          // if(isset($_POST["name"])){
             // if($_POST["lastdate"] >= $_POST["firstdate"]){
                 // echo '<p style="color:green;margin-top: 5%;">Your booking has been registered</p>';

                   
				// $query = "SELECT ID FROM USERS";
				// $result = mysqli_query($dbConnection, $query);

				// if(empty($result)) {
								// $query = "CREATE TABLE booking (
							// name varchar(25) NOT NULL,
							// email varchar(25) NOT NULL,
							// house varchar(25) NOT NULL,
							// start_date date NOT NULL,
							// end_date date NOT NULL 
						// )";
								// $result = mysqli_query($dbConnection, $query);
				// }
				   
                   // $dbConnection->exec('INSERT INTO booking(name, email, house, start_date, end_date) VALUES("'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['house'].'","'.$_POST['firstdate'].'","'.$_POST['lastdate']);   
             // }
             // else{
                  // echo '<p style="color:red;margin-top: 5%;">Your booking has failed</p>';
             // }
          // }

		} else {
              echo '<fieldset id="booking">
            <legend>Your reservation</legend>
            <form action="booking.php" method="post">
                <label>Your name : </label>
                <input type="text" name="name" placeholder="Your name" required autofocus><br>
                
                <label>Your e-mail : </label>
                <input type="email" name="email" placeholder="example@email.com" required><br>
                
                <label>The house you want : </label><br>
                <input type="radio" name="house" value="one" required checked><label> house 1</label><br>
                <input type="radio" name="house" value="two" required><label> house 2</label><br>
                <input type="radio" name="house" value="three" required><label> house 3</label><br>
                
                <label>Choose your starting date : </label>
                <input type="date" id="firstdate" accept=""min="2021-05-09"  name="firstdate" required><br>
                <label>Choose your end date : </label>
                <input type="date" id="lastdate" accept=""min="2021-05-09"  name="lastdate" required><br>
                

                <input type="submit" id="submit" value="submit your booking">
            </form>
        </fieldset>';
		}
        ?>
        
        
        
        <script>

  var lastDate = null;

  var nav = new DayPilot.Navigator("nav", {
    selectMode: "week",
    onBeforeCellRender: function(args) {
      if (args.cell.day < DayPilot.Date.today()) {
        args.cell.cssClass = "navigator-disabled-cell";
      }
    },
    onTimeRangeSelect: function(args) {
      if (args.day < DayPilot.Date.today()) {
        args.preventDefault();
        nav.select(lastDate, {dontNotify: true, dontFocus: true});
      }
      else {
        lastDate = args.start;
      }
    },
    onTimeRangeSelected: function(args) {
      dp.startDate = args.start;
      dp.update();
    }
  });
  nav.init();

  var dp = new DayPilot.Calendar("dp", {
    viewType: "Week",
    onTimeRangeSelected: function (args) {
      DayPilot.Modal.prompt("Create a new event:", "Event 1").then(function(modal) {
        var dp = args.control;
        dp.clearSelection();
        if (!modal.result) { return; }
        dp.events.add(new DayPilot.Event({
          start: args.start,
          end: args.end,
          id: DayPilot.guid(),
          text: modal.result
        }));
      });
    },
    onBeforeCellRender: function(args) {
      if (args.cell.start < DayPilot.Date.today()) {
        args.cell.disabled = true;
        args.cell.backColor = "#eee";
      }
    }
  });
  dp.events.list = [
    {
      id: "1",
      start: DayPilot.Date.today().addHours(10),
      end: DayPilot.Date.today().addHours(12),
      text: "Event 1"
    }
  ];
  dp.init();
</script>

    </body>
</html>
