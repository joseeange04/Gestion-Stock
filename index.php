<!DOCTYPE html>
 
<html>
<head>
<meta charset=  "utf-8" />
<title> Gestion de stock </title>
<link rel="stylesheet" href="style.css" />
<script type="text/javascript"> 
         function refresh(){
             var t = 1000; // rafraîchissement en millisecondes
             setTimeout('showDate()',t)
         }
         
         function showDate() {
             var date = new Date()
             var h = date.getHours();
             var m = date.getMinutes();
             var s = date.getSeconds();
             if( h < 10 ){ h = '0' + h; }
             if( m < 10 ){ m = '0' + m; }
             if( s < 10 ){ s = '0' + s; }
             var time = h + ':' + m + ':' + s
             document.getElementById('horloge').innerHTML = time;
             refresh();
          }
      </script>
</head>

<?php
session_start();

    $bdd= new PDO("mysql:host=localhost; dbname=gestionstock", 'root', '');

    if(isset($_POST['login']) AND isset($_POST['password']))
    {
        $login= htmlspecialchars($_POST['login']);
        $password= sha1($_POST['password']);

        if(!empty($login) AND !empty($password))
        {
            if(filter_var($login, FILTER_VALIDATE_EMAIL))
            {
                header("Location:action.php");
                $requser= $bdd->prepare("SELECT * FROM user WHERE login= ? AND password= ? ");
                $requser->execute(array($login, $password));
                $userexist= $requser->rowCount();
                if($userexist == 1)
                {
                    echo "Bienvenue";
                   
                    $userinfo= $requser->fetch();
                    $SESSION['id']= $userinfo['id'];
                    $SESSION['login']= $userinfo['login'];
                    
                }
                else{
                    $erreur="L'utilisateur n'existe pas encore";
                }
            }
            else{
                $erreur= "Votre mail est incorrecte";
            }
        }
        else
        {
            $erreur="Veuillez remplir toutes les cases!";
        }

    }

?>

<body onload=showDate();>
<span id='horloge' style="background-color:#1C1C1C;color:silver;font-size:40px;"></span>

    <div align="center">
        <h1>S'identifier </h1>
        <form method="POST" action="">
    <!--login-->
            <table>
                <tr>
                <td align= "left">
                <label for="login"> Login: </label>
                </td>
                <td align= "right">
                <input type="mail" name="login" id="login" placeholder="Votre adresse électronique" width="200px"/>
                </td>
                </tr>
         <!--mot de passe-->
                </br> </br>
                <tr>
                <td align= "left">
                <label for="Password"> Password: </label>
                </td>
                <td align= "right">
                <input type="password" name="password" id="password" placeholder="mot de passe" width="200px"/>
                </td>
                </tr>
        <!-- accès-->
                </br> </br>
                <tr>
                <td></td>
                <td align="center" >
                <input type="submit" value="Se connecter" name="connection" id="connection"/>
                </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($erreur))
            {
                echo "<font color=red > ".$erreur."</font>";
            }
        ?>

    </div>
</body>
</html>