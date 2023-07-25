<div class=popup-inscription id="popInscript">
    <div class="popup-content">
        <h1 class=connection-inscription-title>Connexion</h1>
        <p><?php echo $_GET["message"]; ?></p>
        <div class=popup-subcontent>
            <form action="api/connection.php" method="post">
                <input
                    type="text"
                    name="username"
                    class="connection-inscription-input-username"
                    placeholder="Nom d'utilisateur"
                    minlength=3
                    id="input-username"
                />
                <input
                    name="password"
                    type="password"
                    class="connection-inscription-input-password"
                    placeholder="Mot de passe"
                    minlength=8
                    id="input-password"
                />
                <button class="connect-inscript-button" type="submit">Inscription</button>
                <a href="?p=signup"><p class="already">Pas de compte ?</p>
            </form>
        </div>
    </div>
</div>