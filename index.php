<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            padding: 20px;
            max-width: 500px;
            margin: 20px auto;
        }
        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="number"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            font-size: 16px;
            width: 200px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #444;
        }
        p {
            font-size: 20px;
            margin-top: 20px;
            text-align: center;
            color: #333;
        }
        .underweight {
            color: #00cc00;
        }
        .healthy {
            color: #0099ff;
        }
        .overweight {
            color: #ff9933;
        }
        .obese {
            color: #ff3300;
        }
    </style>
</head>
<body>
    <h1>BMI Calculator</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="weight">Weight (kg):</label>
        <input type="number" step="0.01" id="weight" name="weight" required><br><br>
        <label for="height">Height (m):</label>
        <input type="number" step="0.01" id="height" name="height" required><br><br>
        <input type="submit" value="Calculate">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $bmi = $weight / ($height * $height);
            echo "<p>Your BMI is " . number_format($bmi, 2) . "</p>";
            if ($bmi < 18.5) {
                echo "<p class='underweight'>Underweight</p>";
            } else if ($bmi >= 18.5 && $bmi <= 24.9) {
                echo "<p class='healthy'>Healthy</p>";
            } else if ($bmi >= 25.0 && $bmi <= 29.9) {
                echo "<p class='overweight'>Overweight</p>";
            } else {
                echo "<p class='obese'>Obese</p>";
            }

        }
    ?>
</body>
</html>
