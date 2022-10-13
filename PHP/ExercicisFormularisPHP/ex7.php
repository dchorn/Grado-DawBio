<?php
require_once 'php/database.php';

function fetchSelectTag($exchangeRates, $selectType, $selected = '')
{

    printf('<select class="%s" name="%s">', $selectType, $selectType);
    foreach($exchangeRates as $key => $value) {

        $selection = '';
        if ($key == $selected) {
            $selection = 'selected="selected"';
        }

        printf('<option value="%s" %s />%s</option>', $key, $selection, strtoupper($key));

    }
    printf('</select >');
    return $selection;
}

function sanitizeInput($exchangeRates): array 
{

    $sourceCurrency = FILTER_INPUT(INPUT_GET, 'sourceCurrency');
    $targetCurrency = FILTER_INPUT(INPUT_GET, 'targetCurrency');

    // If sourceCurrency is not in the array of availables => false.
    if (!array_key_exists($sourceCurrency, $exchangeRates)){
        $sourceCurrency = false;
    }

    // If targetCurrency is not in the array of availables => false.
    if (!array_key_exists($targetCurrency, $exchangeRates)){
        $targetCurrency = false;
    }

    if ($sourceCurrency == $targetCurrency){
        throw new ValueError('The same source and target currency has been given.');
    }

    $amount = filter_input(INPUT_GET, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, 
                                                   FILTER_FLAG_ALLOW_FRACTION);
    $amount = filter_var($amount, \FILTER_VALIDATE_FLOAT);

    if ($amount < 1 ) {
        $amount = false;
    } else if ($amount != false){
        $amount = (int) $amount;
    }

    return [
        'sourceCurrency' => $sourceCurrency,
        'targetCurrency' => $targetCurrency,
        'amount'         => $amount
    ];
}
function calcExchange($exchangeRates, array $inputValues): float
{
    $exchangeResult = $exchangeRates[$inputValues['sourceCurrency']]
                                    [$inputValues['targetCurrency']] 
                                    * $inputValues['amount'];

    return $exchangeResult;
}

// MAIN
// ============================================

// Get exchange rates
function getExchangeRates(){

    $exchangeRates = [
        'eur' => [
            'usd' => 0.98,
            'huf' => 420.33,
            'jpy' => 141.70
                 ],

        'usd' => [
            'eur' => 1.02,
            'huf' => 428.50,
            'jpy' => 144.48
                 ],

        'huf' => [
            'eur' => 0.0024,
            'usd' => 0.0023,
            'jpy' => 0.34
                 ],

        'jpy' => [
            'eur' => 0.0071,
            'usd' => 0.0069,
            'huf' => 2.96
                 ],
    ];

    return $exchangeRates;
}
if (isset($_GET['submit'])) {

    try {


        $inputValues = sanitizeInput($exchangeRates);
        $exchangeResult = calcExchange($exchangeRates, $inputValues);
    } catch (ValueError) {
        $errorMessage = 'Invalid amount has been given.';
    }
}
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Exchange currencies</title>
</head>
<body>

    <div class="container">
        <div class="wrapper">
            <h3>Exchange currencies</h3>
            <hr>
            <form action="index.php" id="usrform" method="get">

                <div class="input-wrapper">

                    <div>
                        <label for="sourceCurrency"><u>Select a currency:</u></label> 
                            <?php
                                $selected = '';
                                if (isset($inputValues['sourceCurrency'])){
                                    $selected= $inputValues['sourceCurrency'];
                                }
                                fetchSelectTag($exchangeRates, 'sourceCurrency', $selected);
                            ?>
                    </div>
                    <div>
                        <label for="targetCurrency"><u>Select a currency:</u></label> 
                            <?php
                                $selected = '';
                                if (isset($inputValues['targetCurrency'])){
                                    $selected= $inputValues['targetCurrency'];
                                }
                                fetchSelectTag($exchangeRates, 'targetCurrency', $selected);

                            ?>
                    </div>

                    <div>
                        <label for="firstName">Amount to exchange:</label> 
                        <input type="text" name="amount" placeholder="Amount.."
                        value="<?php echo $inputValues['amount'] ?? ''; ?>" />
                    </div>
                    <span class="<?php echo ($inputValues['amount'] === false) ? 'error' : 'hidden'; ?>">Invalid value</span>

                    <div>
                        <label for="exchangeResult">Exchange result:</label> 
                        <input type="text" name="exchangeResult" placeholder="Exchange.."
                        value="<?php echo $exchangeResult ?? ''; ?>" readonly/>
                    </div>
                    <span class="<?php echo ($exchangeResult === false) ? 'error' : 'hidden'; ?>">Invalid value</span>

                </div>
                <button class ="button" type="submit" name="submit" value="submit">Exchange</button>
            </form>
            <p class="error"><?php echo $errorMessage ?? ''; ?></p>
        </div>

    </div>   
</body>
</html>
