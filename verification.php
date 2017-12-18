<?php
session_start();
if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['profil']))//ici la fonction if isset et ce qui suit permet de recupérer le login,password,et profil s'ils ont été deja remplis dans la page d'accueil.
{
    extract($_POST);//extract ($_post) permet d'utiliser le $variable au lieu de $_POST['variable'] mais également de rcupéré le login,password et profil
    if($login=='admin' && $password=='admin' && $profil=='admin')//ici, if permet de dire si le login,le password et profil sont tous identiques,
    {
        $_SESSION['visiteur']='admin';//la session du visiteur est affectée à admin.
        echo"
           
            <legend><h2>Bienvenue dans la session Admin</h2></legend>
            <h3>Menu</h3>
                <ol>
                    <li><a href='editeur.php'>Site de l'editeur</a></li>
                    <li><a href='tableau.php'>Site du tableau</a></li>
                </ol>
                <form method='post' action='#'>
                    <input type='submit' name='deconnexion' value='Déconnxion'/>
                </form>
            </fieldset></center>
        ";// admin est redirigé vers deux lien notamment "editeur.php" et "tableau.php"

        if (isset($_POST['deconnexion']))//si admin appuit sur le button deconnexion
        {
            session_destroy();//la session sera fermé
            header("location: accueil.php");//et il sera redirigé vers la page login.
        }
    }
    elseif($login=='admin' && $password=='admin' && $profil!='admin')//sinon si le login,le password ou profil sont differents,
    {
        echo"Vousn n'avez pas choisi la bonne profil. SVP revoyez votre profil.";
    }
    elseif($login=='user' && $password=='user' && $profil=='user')//sinon si le login,password,et profil sont identiques à user,
    {
        extract($_POST);
        $_SESSION['visiteur']='user';
        echo"
            
            <legend><h2>Bienvenue dans la session User</h2></legend>
            <h3>Menu</h3>
                <ol>
                    <li><a href='calcul.php'>Site du calculatrice</a></li>
                    <li><a href='heure.php'>Site de l'heure</a></li>
                </ol>
                <form method='post' action='#'>
                    <input type='submit' name='deconnexion' value='Déconnxion'/>
                </form>
            </fieldset></center>
        ";
        if (isset($_POST['deconnexion']))
        {
            session_destroy();
            header("location: accueil.php");
        }
    }
    elseif($login=='user' && $password=='user' && $profil!='user')
    {
        echo"Vous n'avez pas choisi la bonne profil. SVP revoyez votre profil.";
    }
    else
    {
        echo"LOGIN ou PASSWORD incorrecte, revoyez ce que vous avez tapé.";
    }
}
elseif(isset($_SESSION['visiteur']))
{
    if($_SESSION['visiteur']=='admin')
    {
        echo"
           
            <legend><h2>Bienvenue dans la session Admin</h2></legend>
            <h3>Menu</h3>
                <ol>
                    <li><a href='editeur.php'>Site de l'editeur</a></li>
                    <li><a href='tableau.php'>Site du tableau</a></li>
                </ol>
                <form method='post' action='#'>
                    <input type='submit' name='deconnexion' value='Déconnxion'/>
                </form>
            </fieldset></center>
        ";
        if (isset($_POST['deconnexion']))
        {
            session_destroy();
            header("location: accueil.php");
        }
    }
    elseif ($_SESSION['visiteur']=='user')
    {
        echo"
            
            <legend><h2>Bienvenue dans la session User</h2></legend>
            <h3>Menu</h3>
                <ol>
                    <li><a href='calcul.php'>Site du calculatrice</a></li>
                    <li><a href='heure.php'>Site de l'heure</a></li>
                </ol>
                <form method='post' action='#'>
                    <input type='submit' name='deconnexion' value='Déconnxion'/>
                </form>
            </fieldset></center>
        ";
        if (isset($_POST['deconnexion']))
        {
            session_destroy();
            header("location: accueil.php");
        }
    }
    else
    {
        header("location: accueil.php");
    }
}
else
{
    header("location: accueil.php");
}
?>