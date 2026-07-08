<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T-Shirt Price Engine</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f6f8; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .receipt { background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; border-top: 5px solid #005a9c; }
        h1 { text-align: center; color: #005a9c; }
        ul { list-style: none; padding: 0; }
        li { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eee; }
        .total { font-size: 1.5em; color: #28a745; }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Order Summary</h1>
        <?php
            // --- Configuration: Change these values to test all business rules! ---
            $size = 'XL'; // Options: 'S', 'M', 'L', 'XL'
            $color = 'Sunset Orange'; // Any string, but test with 'Sunset Orange' or 'Ocean Blue'
            $isCustomized = true; // Options: true, false
            $customerFirstName = 'maryam'; // <-- IMPORTANT: REPLACE WITH YOUR ACTUAL FIRST NAME

            // --- Part A: Implement the logic below using ONLY simple, nested if-statements ---
            
            $finalPrice = 22.50;
            $details = "<li>Base Price: <span>$" . number_format($finalPrice, 2) . "</span></li>";

            // Your nested if-statement logic goes here...
            // Example of a rule:
            // if ($size == 'L') {
            //     $finalPrice = $finalPrice + 1.75;
            //     $details .= "<li>Size (L) Upcharge: <span>+$1.75</span></li>";
            // }

            if ($size == 'L') {
                 $finalPrice = $finalPrice + 1.75;
                 $details .= "<li>Size Upcharge (L): <span>+$2.00</span></li>";
                 }
            elseif ($size == 'XL') {
                 $finalPrice = $finalPrice + 2.50;
                 $details .= "<li>Size Upcharge (XL): <span>+$2.00</span></li>";
                 }  
                 
                 
            if ($color=='Sunset Orange' || $color=='Ocean Blue'){
                $finalPrice = $finalPrice + 2;
                $details .= "<li>Color Upcharge: <span>+$2.00</span></li>";
                
            }
            
            if ($isCustomized && $size == 'XL'){
                $finalPrice = $finalPrice + 8;
                $details .= "<li>Customization upcharge: <span>+$5.00</span></li>";
                $details .= "<li>Additional upcharge Customization size XL: <span>+$3.00</span></li>";
            }
            elseif ($isCustomized){
                $finalPrice = $finalPrice + 5;
                $details .= "<li>Customization upcharge: <span>+$5.00</span></li>";
            }
            if (strlen($customerFirstName)>6){
                $finalPrice = $finalPrice -1;
                $details .= "<li>Long name discount: <span>+$1.00</span></li>";
            }

        /*
MY DEBUGGING LOG:
added changes to details variable for each price update after writing if statements, this caused some typos, I put some of them outside the brackets so a charge would be added to the list without the if condition being met, it was easy to spot  on the web page since the charges on the list didn't match the options tested but the final price did. 
*/


            // --- DO NOT EDIT BELOW THIS LINE ---
            echo "<ul>" . $details . "</ul>";
            echo "<ul><li><span class='total'>Final Price:</span> <span class='total'>$" . number_format($finalPrice, 2) . "</span></li></ul>";

        ?>
    </div>
</body>
</html>