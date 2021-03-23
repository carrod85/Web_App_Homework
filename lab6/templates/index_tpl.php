<!DOCTYPE html>
    <html lang="en">

        <head>
            <link rel="stylesheet" href="./styles/courses.css">
            <title>{TITLE}</title>
        </head>

        <body>
        <h1>{TITLE}</h1>
        <div class ="proba">
            <form action="index.php" method="POST">
                <div class ="code">
                    <legend>Course Code(first 3 digits or I00):</legend>
                        <input id="code" type="text" name="code" placeholder="I00 or ICA/ICD/etc." maxlength="3" required="">
                </div>
                <div class="boton">
                    <input class="boton" type="submit" name ="submit" id="search" value="Search">
                </div>
            </form>
            <form action="index.php" method="POST">
                <div class="boton2">
                    <input class="boton" type="submit" id="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
        <div>{TABLE}</div>
        </body>

    </html>