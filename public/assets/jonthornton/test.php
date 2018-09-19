<!DOCTYPE html>
<html>
<head>
	<title>TEST Timepicker</title>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />

  <script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" />

  <script type="text/javascript" src="lib/site.js"></script>
  <link rel="stylesheet" type="text/css" href="lib/site.css" />

</head>
<body>

</body>
</html>

<div class="demo">
    <h2>timeFormat Example</h2>
    <p>timepicker.jquery uses the time portion of <a href="http://php.net/manual/en/function.date.php">PHP's date formatting commands</a>.</p>
    <p><input id="timeformatExample1" type="text" class="time" /> <input id="timeformatExample2" type="text" class="time" /></p>
</div>
 <script>
    $(function() {
        $('#timeformatExample1').timepicker({ 'timeFormat': 'H:i:s' });
        $('#timeformatExample2').timepicker({ 'timeFormat': 'h:i A' });
    });
</script>