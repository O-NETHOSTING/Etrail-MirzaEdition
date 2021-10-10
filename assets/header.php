<?php
$load = microtime(true);
$cssmirzaversion = "2.4.1";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php if(!empty($naslov)) echo $naslov; else echo 'Klijent'; ?> :: e-West Hosting</title>

    <?php if(!empty($metadesc)) { 
        printf('<meta name="description" content="%s">', $metadesc);
        printf('<meta name="og:description" content="%s">', $metadesc);
    } else { ?>
     <meta name="description" content="Zakupite svoj game server po veoma niskoj ceni sa veoma visokim kvalitetom!">
     <meta name="og:description" content="Zakupite svoj game server po veoma niskoj ceni sa veoma visokim kvalitetom!">
<?php } ?>
    <link rel="icon" href="assets/mirza/img/1.png">
    <meta property="og:image" content="http://ewest-hosting/assets/mirza/img/2.png">
    <meta name="description" content="Zakupite svoj game server po veoma niskoj ceni sa veoma visokim kvalitetom!">
    <meta name="keywords" content="e-West, hosting, prodaja, host, cs 1.6, samp, Counter-Strike 1.6, San Andreas Multiplayer, najjeftiniji hosting, game hosting, game serveri, gamepanel, ewest, server, free" />
    <meta name="allow-search" content="yes" />
    <meta name="robots" content="all" />
    <meta name="theme-color" content="#2b5876">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="./assets/mirza/css/style.css?ver=<?php echo $cssmirzaversion; ?>">
    <link rel="stylesheet" href="./assets/mirza/css/style-600.css?ver=<?php echo $cssmirzaversion; ?>">
    <link rel="stylesheet" href="./assets/mirza/css/style-800.css?ver=<?php echo $cssmirzaversion; ?>">
    <link rel="stylesheet" href="./assets/mirza/css/style-1410.css?ver=<?php echo $cssmirzaversion; ?>">
    <link rel="stylesheet" href="./assets/<?php echo $_SESSION['style']; ?>/min/?g=css&ver=<?php echo $cssmirzaversion; ?>" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body>
<?php
$i = $i+1;
if (isset($_SESSION['msg']))
{
?>
<div class="qnotifications">
    <p><i class="fas fa-bell"></i> <?php echo $_SESSION['msg']; ?></p>
</div>
<?php
    unset($_SESSION['msg']);
}
?>
    <div class="header" >
        <div class="logo">
            <a href="index.php"> <p><font class="bold">e-West</font> ❘ Hosting Provider</p></a>
            <a href="javascript:void(0);" class="icon c-white" style="color: #FFFFFF;" onclick="mirzanav()">&#9776;</a>
        </div>
        <div class="navmain" id="navmain">
         <?php if(klijentUlogovan() == true) { ?>
            <ul>
                <a href="index.php"><i class="fas fa-home"></i> Početna</a>
                <a href="gp-serveri.php"><i class="fab fa-windows"></i> GamePanel</a>
                <a class="notification-icon" href="#"><i class="fa fa-bell"></i><span class="badge">9+</span></a>
                <div class="dropdown">
                    <button class="dropbtn">
                        <?php echo $_SESSION['klijentusername'] ?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a class="blue1 text-align-left nav-status" href="#">Stanje: <font class="bold"><?php echo getMoney($client['klijentid'], true); ?></font></a>
                        <a href="ucp-billing.php"><i class="fas fa-comment-dollar bold"></i> Plaćanje</a>
                        <a href="profil.php"><i class="fas fa-user bold"></i> Pregled Profila</a>
                        <a href="ucp-podesavanja.php"><i class="fas fa-user-edit bold"></i>Postavke Profila</a>
                        <a href="gp-podrska.php"><i class="fas fa-question-circle bold"></i> Pomoć</a>
                        <a href="process.php?task=logout"><i class="fas fa-sign-out-alt bold"></i> Odjava</a>
                    </div>
                </div> 
            </ul>
        <?php } else { ?>
            <ul>
                <a href="index.php"><i class="fas fa-home"></i> Početna</a>
                <a href="login.php"><i class="fas fa-sign-in-alt"></i> Prijava</a>
                <a href="register.php"><i class="fas fa-user-plus"></i> Registracija</a>
            </ul>
        <?php }; ?>
        </div>
    </div>
