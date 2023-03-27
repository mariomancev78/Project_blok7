<nav>
    <ul>
        <li><a href="index.php">
                <img src="design/logo.svg" alt="logo">
            </a>
        </li>
        <li><a href="login.php">Login</a></li>
        <li><a href="registreren.php">Registreren</a></li>
        <? if (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin") { ?>
            <li><a href="dashboard_user.php">user dashboard</a></li>
            <li><a href="dashboard_recepten.php">recepten dashboard</a></li>
            <li><a href="dashboard_ingredienten.php">ingredienten dashboard</a></li>
        <? } ?> 

        
    </ul>
    <div class="login_status">
        <?
        if (isset($_SESSION['gebruikersnaam'])) {
            echo "Ingelogd als: " . $_SESSION['gebruikersnaam'] . " (" . $_SESSION['rol'] . ") ";
            echo "<a href='index.php?logout'>Uitloggen</a>";
        } else {
            echo "U bent niet ingelogd";
        } ?>
    </div>
</nav>