<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .link{
                display: none;
            }

            .mostrar{
                display:block;
                background-color: yellow;
            }
        </style>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Registration Form</title>  
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li >HOME</li>
                    <li >DOWNLOAD</li>
                </ul>
            </nav>
        </header>
        <form method="POST" action="lab5.php">
            <label for= "firstName">First Name:</label>
                <input type= "text" id="firstName" name = "firstName" required placeholder="Enter your first name"><br>
            <label for= "middleName">Middle Name:</label>
                <input type= "text" id="middleName" name = "middleName" placeholder="Enter your middle name"><br>
            <label for= "lastName">Last Name:</label>
                <input type= "text" id="lastName" required name = "lastName"placeholder="Enter your last name"><br>
            <label for= "mr">Mr</label>
                <input type= "radio" id="mr" name="salut" value="mr">&nbsp; &nbsp;
            <label for="ms">Ms</label>
                <input type= "radio" id="ms" name="salut" value="ms">&nbsp; &nbsp;
            <label for="mrs">Mrs</label>
                <input type= "radio" id="mrs" name="salut" value="mrs"><br>
            <label for= "age">Age:</label>
                <input type= "number" id="age" name = "age" min= "18" max="110" required placeholder="Enter your age"><br>
            <label for="email">Email</label>
                <input type= "email"  id="email" required name="email" placeholder="Enter your email" ><br>
            <label for="phone">Contact phone</label>
                <input type= "tel"  id="phone"  name="phone" placeholder="Number as 111 111 111" required pattern="[0-9,+]{1,6} [0-9]{3} [0-9]{3}" ><br>
            <label for="arrivalData">Arrival date</label>
                <input type= "date"  id="arrivalData"  name="arrivalData" format="DD/MM/YYYY" placeholder="dd/mm/yyyy" required min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime($date. ' + 60 days'));  ?>"><br>
            <label for="comment">Comments</label>
                <input type= "text"  id="comment"  name="comment" placeholder="Aditional information"  ><br>
            <button type="submit" value="Submit" name ="submit">Submit</button>
            <button type="reset" value="Reset">Reset</button>
            <p><a class= "<?php echo $class="link"; ?>" href="download.php?path=./data/validationfile.csv">Download TEXT file</a></p>
            
        </form>



    </body>

</html>


<?php


if (isset($_POST["submit"])){
    $fichero = "./data/validationfile.csv";
    $ficheroIndividual= "./data/validationfileindividual.csv";
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $arrivalData = $_POST["arrivalData"];
    $comment = $_POST["comment"];
    $radiovalue = $_POST["salut"];
    $registration = $firstName.';'.$middleName.';'.$lastName.';'.$age.';'.$phone.';'.$arrivalData.';'.$comment.';'.$radiovalue;

    
    file_put_contents($ficheroIndividual, $registration);

    if (file_exists($fichero)){
        $handle = fopen($fichero, 'r');
        $numRegister= 0;
        while(!feof($handle)){
            fgets($handle);
            $numRegister++;//calculo entradas
        }
        fclose($handle);
        $handle = fopen($fichero, 'a');//abrir archivo y puntero al final del archivo
        fwrite($handle, $registration.PHP_EOL);//copiar datos
        fclose($handle);//cerrar archivo
    }
    else{
        $handle = fopen($fichero, 'w');//crear archivo y puntero al inicio
        fwrite($handle, $registration.PHP_EOL);
        fclose($handle);
        $numRegister = 1;//calculo entrada
    }
    echo "number of registration entries: ". $numRegister;

    $class = "mostrar";
}   

else{
    $class = "link";
}


?>