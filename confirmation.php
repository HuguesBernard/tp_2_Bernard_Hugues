<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmation</title>
</head>
<body>
    <div class="container">
        <h2>Confirmez vos adresses</h2>
        <form action="process-db.php" method="post">
            <?php
            $num_addresses = $_POST['num_addresses'];
            for ($i = 1; $i <= $num_addresses; $i++) {
                echo "<div class='address'>";
                echo "<label for='street$i'>Street:</label>";
                echo "<input type='text' id='street$i' name='street$i' maxlength='50' required>";
                
                echo "<label for='street_nb$i'>Street Number:</label>";
                echo "<input type='number' id='street_nb$i' name='street_nb$i' required>";
                
                echo "<label for='type$i'>Type:</label>";
                echo "<select id='type$i' name='type$i' maxlength='20' required>
                        <option value='livraison'>Livraison</option>
                        <option value='facturation'>Facturation</option>
                        <option value='autre'>Autre</option>
                      </select>";
                
                echo "<label for='city$i'>City:</label>";
                echo "<select id='city$i' name='city$i' required>
                        <option value='Montreal'>Montreal</option>
                        <option value='Laval'>Laval</option>
                        <option value='Toronto'>Toronto</option>
                        <option value='Quebec'>Quebec</option>
                      </select>";
                
                echo "<label for='zipcode$i'>Zipcode:</label>";
                echo "<input type='text' id='zipcode$i' name='zipcode$i' pattern='\d{6}' required>";
                
                echo "</div>";
            }
            ?>
            <button type="submit">Confirmer</button>
        </form>
    </div>
</body>
</html>
