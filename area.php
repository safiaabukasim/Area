<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP to Python</title>
<style>
    body {
        background-color: #ADD8E6; 
        font-family: 'Comic Sans MS', cursive, sans-serif; 
        color: #00008B; 
        text-align: center; 
        padding: 50px;
    }
    h2 {
        color: #000080; 
        font-size: 36px;
    }
    p {
        color: #00008B; 
        font-size: 18px;
    }
    label {
        color: #000080; 
    }
    input[type="text"] {
        border: 2px solid #00008B; 
        border-radius: 10px;
        padding: 10px;
        font-size: 16px;
    }
    input[type="submit"] {
        background-color: #00008B; 
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #000080; 
    }
    h3 {
        color: #000080;
    }
    .result {
        background-color: #E0FFFF; 
        border: 2px solid #00008B;
        border-radius: 10px;
        display: inline-block;
        padding: 20px;
        margin-top: 20px;
    }
</style>
</head>
<body>
<h2>Safia Abukasim's Area Calculator!</h2>
<p><?php echo date('F j, Y'); ?></p>
<form method="POST" action="">
<label for="num1">Length:</label>
<input type="text" id="num1" name="num1">
<br><br>
<label for="num2">Width:</label>
<input type="text" id="num2" name="num2">
<br><br>
<input type="submit" name="submit" value="Calculate Area">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = escapeshellarg($_POST["num1"]);
    $num2 = escapeshellarg($_POST["num2"]);
    // Prepare the command to run the Python script
    $command = "python3 area.py $num1 $num2";
    // Execute the Python script and capture the output
    $output = shell_exec($command);
    // Debugging output
    if ($output === null) {
        echo "<h3>Error:</h3>";
        echo "<div class='result'><p>Command failed to execute.</p></div>";
    } else {
        // Display the result
        echo "<h3>Result from Python script:</h3>";
        echo "<div class='result'><p>Area: " . htmlentities($output) . "</p></div>";
    }
}
?>
</body>
</html>


