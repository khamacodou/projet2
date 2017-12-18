<!DOCTYPE html>
<html lang="fr">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <form action="#" method="post">
            <legend><h2>generer mot pass</h2></legend>
            LOGIN: <input type="text" name="login" required/> <br/> <br/>
            profil:<select name="profil"><br/> <br/>
                <option value="user">USER</option>
                <option value="admin">ADMIN</option>
            </select><br/> <br/>
                 <input type="submit" name="creer" value="creer"/> <br/> <br/>
        </form><br/>
    <?php
         if(isset($_POST['login']) && isset($_POST['profil']))
         {
            extract($_POST);
            function Genere_Password($size)
            {
                // Initialisation des caractères utilisables
                $characters = array(0, 1, 2, 3, 4, 5, 6, "a", "b", "c", "d", "e", );
                $password='';
                for($i=0;$i<$size;$i++)
                {
                    $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
                }
                return $password;
            }
            $password = Genere_Password(8);
            $inscrit = fopen('inscrit.txt', 'a+');
            $fin = "\r\n";
            fputs($inscrit,$login.'-'.$profil.'-'.$password.'-'.$fin);
            fclose($inscrit);
            echo($login.'-'.$profil.'-'.$password);
         }

    ?>
    </body>
</html>