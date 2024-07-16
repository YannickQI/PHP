<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
</head>
<body>
    <p><form method = "post" action="Index.php">
        <label for="input_peso">Peso:</label>
        <input type="text" id="input_peso" name="input_peso" required></p>
        
    <p><label for="input_altura">Altura:</label>
        <input type="text" id="input_altura" name="input_altura" required></p>
        
        <marquee><button type="submit">IMC</button></marquee>
    </form>
    <?php
        if (!empty($_POST)) {
        $peso = $_POST["input_peso"];
        $altura = $_POST["input_altura"];

        $imc = $peso / ($altura * $altura);
        $imc = number_format($imc,2);


        print "<p>peso: $peso</p>";
        print "<p>altura: $altura</p>";
        print "<p>imc: $imc</p>";


        if ($imc <= 18.5) {
            print "<marquee>abaixo do peso! 👀</marquee>";
        } elseif ($imc >= 18.6 && $imc <= 24.9) {
            print "<marquee>peso ideal! parabéns! 👀</marquee>";
        } elseif ($imc >= 25.0 && $imc <= 29.9) {
            print "<marquee>levemente acima do peso! 👀</marquee>";
        } elseif ($imc >= 30.0 && $imc <= 34.9) {
            print "<marquee>obesidade grau 1! 👀</marquee>";
        } elseif ($imc >= 35.0 && $imc <= 39.9) {
            print "<marquee>obesidade grau 2! 👀</marquee>";
        } else { 
            print "<marquee>obesidade grau 3! 👀</marquee>";
        }
    }
    ?>
</body>
</html>