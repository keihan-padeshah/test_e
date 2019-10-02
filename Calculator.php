<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>

<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />
</head>
<body>
<div class="calculator">



    <?php
        $num1 = 0;
        $num2 = 0;
        $total = 0; 
        $option = ""; 
        $error ="";   

        if(isset($_GET['submit'])) //als er op de knop bereken is geklikt
        { 
            //voer alles uit wat binnen de haakjes zit
            $num1 = $_GET['num1'];
            $num2 = $_GET['num2'];
            
            $operator = $_GET['choice'];
            // "||" betekent "of". kijkt eerst naar welke operator het is. dit ivm de foutafhandeling //
            if ($operator =="plus" || $operator == 'minus' || $operator == 'multiply' || $operator == 'divide' || $operator == 'power')
            {
                //check number values
                if(is_numeric($num1) && is_numeric($num2)) //de berekeningen
                {
                    if($operator =="plus")
                    {
                        $total = $num1 + $num2;
                    }
                    if($operator == 'minus')
                    {
                        $total = $num1 - $num2;
                    }
                    if($operator == 'multiply')
                    {
                        $total = $num1 * $num2;   
                    }   
                    if($operator == 'divide')
                    {
                        $total = $num1 / $num2;
                    }
                    if($operator == 'power')
                    {    
                        $total = pow($num1, $num2);
                    }
                    
                    
                }
                else
                {
                    $error = "<h3>You might need your eyes checked, only numbers please!</h3>"; //de error toewijzing

                }
            }
            else
            {
                if (is_numeric($num1))
                {
                    if($operator == 'square root')
                    {
                        $total = sqrt($num1);
                    }
                    if($operator == 'km -> mile')
                    {       
                        $total = $num1 / 1.609344;
                    }
                    if($operator == "Mile -> KM")
                    {
                        $total = $num1 * 1.609344;
                    } 
                }
                else
                {
                    $error = "<h3>You need your eyes checked, only numbers please!</h3>"; //de error toewijzing

                }
            }
           
            echo $error; //de error echo
        }

        echo "<div class=\"answer\"><h1> {$total} </h1></div>";   //het antwoord
    ?>

        <form method="get">
            <!-- sdfsd
         required is used when you try to force to user to type a input, without echo-ing the crash
            -->

            <div class= "number_one"> <p>Number one:</p>
             </div>

            <input placeholder="Your first number" name="num1" type="text" required="required" />
            <select name= "choice">
                <option value="plus">+</option>
                <option value="minus">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
                <option value="power">^</option>
                <option value="square root">sqrt</option>
                <option value= "km -> mile">km -> mile</option>
                <option value= "Mile -> KM">Mile -> KM</option>
            </select>
                <div class="number_two"> <p>Number two:</p> 
                </div>
            <input placeholder= "Your second number" name="num2" type="text" />
            <input class= "submit_btn" name="submit" type="submit" />
            <input class="reset_btn" name= "reset" type="reset" />

        
        </form>




    </div>
    

</body>
</html>