<nav>
<ul>
<li><a href="index.php">
    <img src="design/logo.png" alt="logo">
    </a>
</li>
<li><a href="login.php">Login</a></li>
<li><a href="registreren.php">Registreren</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
</ul>
<div class="login_status">
<?
if (isset($_SESSION['gebruikersnaam'])) {
    echo "Ingelogd als: " . $_SESSION['gebruikersnaam']." (".$_SESSION['rol'].") ";
    echo "<a href='index.php?logout'>Uitloggen</a>";
} else {
    echo "U bent niet ingelogd";
} ?>
</div>
</nav>