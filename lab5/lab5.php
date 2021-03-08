<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
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
                <input type= "tel"  id="phone"  name="phone" placeholder="Number as 111 111 111"  pattern="[0-9,+]{1,6} [0-9]{3} [0-9]{3}" ><br>
            <label for="arrivalData">Arrival date</label>
                <input type= "date"  id="arrivalData"  name="arrivalData" format="DD/MM/YYYY" placeholder="dd/mm/yyyy" required min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime(' + 60 days'));  ?>"><br>
            <label for="comment">Comments</label>
                <input type= "text"  id="comment"  name="comment" placeholder="Aditional information"  ><br>
            <button type="submit" value="Submit" name ="submit">Submit</button>
            <button type="reset" value="Reset">Reset</button>
            <p><a href="download.php?path=./data/validationfileindividual.csv">Download TEXT file</a></p>
            
        </form>



    </body>

</html>


<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])){
    $nombreErr =$apellidoErr = $nombre2Err = $ageErr = $dateErr = $emailErr = $phoneErr  = "";
    
    //FIRSTNAME
    if (empty($_POST["firstName"])){
        $nombreErr = "First name is required";
    }
    else{
        $nombre = $_POST["firstName"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
        $nombreErr = "Only letters and white space allowed";
         }
        else {
        $firstName = test_input($nombre);
        }
    }

    //LASTNAME
    if (empty($_POST["lastName"])){
        $apellidoErr = "Last name is required";
    }
    else{
        $apellido = $_POST["lastName"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$apellido)) {
        $apellidoErr = "Only letters and white space allowed";
         }
        else {
        $lastName = test_input($apellido);
        }
    }

    //MIDDLENAME
    if (empty($_POST["middleName"])){
        $middleName = "";
    }
    else{
        $nombre2 = $_POST["middleName"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre2)) {
        $nombre2Err = "Only letters and white space allowed";
        }
        else {
        $middleName = test_input($nombre2);
        }
    }

    //AGE

    if (empty($_POST["age"])){
        $ageErr = "Age is required";
    }
    else{
        $edad = $_POST["age"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[1-9][0-9]*$/",$edad)) {
            $ageErr = "Only numbers allowed";
        }
        else{
            if($edad<18){
                $ageErr = "You must be over 18";
            }
            else {
                $age = test_input($edad);
            }
        }
    }
    // MAIL

    if (empty($_POST["email"])){
        $emailErr = "email is required";
    }
    else{
        $correo = $_POST["email"];
        // check if name only contains letters and whitespace
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
         }
        else {
            $email = test_input($correo);
        }
    }
    // ARRIVAL DATA

    if (empty($_POST["arrivalData"])){
        $dateErr = "arrival date is required";
    }
    else{
        $date = $_POST["arrivalData"];
        // check if name only contains letters and whitespace
        if ($date < date('Y-m-d') or $date > date('Y-m-d', strtotime(' + 60 days'))) {
            $dateErr = "Invalid date";
         }
        else {
            $arrivalData = test_input($date);
        }
    }

    //PHONE
    if (empty($_POST["phone"])){
        $phone = "";
    }
    else {
        $telefono = $_POST["phone"];
        // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]{3}\s[0-9]{3}\s[0-9]{3}$/", $telefono)){
        $phoneErr = "Please fill the phone with the format 111 111 111";
    }
    else {
        $phone = test_input($telefono);
    }
    }
    //SALUTATION

    if (empty($_POST["salut"])){
        $gender = "";
    }
    else {
        $gender=$_POST["salut"];
    }

    // COMMENT
    if (empty($_POST["comment"])){
        $comment = "";
    }
    else {
        $comment=$_POST["comment"];
    }

    if (isset($firstName, $middleName, $lastName,$gender, $age, $email, $phone, $gender, $arrivalData, $comment)){
    $fichero = "./data/validationfile.csv";
    $ficheroIndividual= "./data/validationfileindividual.csv";
    
    $registration = $firstName.';'.$middleName.';'.$lastName.';'.$gender.';'.$age.';'.$email.';'.$phone.';'.$arrivalData.';'.$comment;

    
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
}
    else{
        
        echo $nombreErr;
        echo "<br>";
        echo $apellidoErr;
        echo "<br>";
        echo $nombre2Err;
        echo "<br>";
        echo $ageErr;
        echo "<br>";
        echo $emailErr;
        echo "<br>";
        echo $phoneErr;
        echo "<br>";
        echo $dateErr;
}
}


?>