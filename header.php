<html>
	<head>
	<title>Aran Reports</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poiret+One" />
	<script src="http://use.edgefonts.net/open-sans-condensed:n7,n3,i3:all;poiret-one:n4:all.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
	body{
		font-family: open-sans-condensed;
	}
	@media only screen and (min-width: 1200px) {
		body{
			font-size: 11pt;
		}
	}
	@media only screen and (min-width:768px) and (max-width:1199px){
		body{
			font-size: 30pt;
		}
		h1{
			font-size: 48pt;
		}
		h2{
			font-size: 36pt;
		}
		input{
			font-size: 32pt;
		}
		select{
			font-size: 32pt;
		}
		.footer{
			font-size: 24pt;
		}
	}
	@media only screen and (max-width:768px){
		body{
			font-size: 32pt;
		}
		h1{
			font-size: 48pt;
		}
		h2{
			font-size: 36pt;
		}
		input{
			font-size: 32pt;
		}
		select{
			font-size: 32pt;
		}
		.footer{
			font-size: 24pt;
		}
	}
	h1{
		cursor: pointer;
		text-align: center;
	}
	h2{
		text-align: center;
	}
	div.form{
		text-align: center;
		margin-top: 30px;
	}
	.footer{
		margin-top: 50px;
		text-align: center;
	}
	div.table{
		border: 1px solid gray;
		text-align: center;
		margin-top: -1px;
	}
	div.tr{
		padding-top: 2px;
		padding-bottom: 2px;
		border: 1px solid gray;
		text-align: center;
		margin-top: -1px;
	}
	.menu{
		text-align: center;
		cursor: pointer;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	</head>
	<body>
		<div>
			<h1>Aran Reports</h1>
			<div class="menu"><span id="setPunch">Home</span> | <span id="addPlace">Places</span> | <span id="addShift">Shifts</span> | <span id="seeReport">Reports</span></div>