<div class=popup-inscription id="popInscript">
    <div class="popup-content">
        <h1 class=connection-inscription-title>Inscription</h1>
        <p><?php echo $_GET["message"]; ?></p>
        <div class=popup-subcontent>
            <form action="api/newUser.php" method="post">
                <input
                    maxlength="14"
                    type="text"
                    name="username"
                    class="connection-inscription-input-username"
                    placeholder="Nom d'utilisateur"
                    minlength=3
                    id="input-username"
                />
                <input
                    maxlength="255"
                    name="password"
                    type="password"
                    class="connection-inscription-input-password"
                    placeholder="Mot de passe"
                    minlength=8
                    id="input-password"
                />
                <button class="connect-inscript-button" type="submit">Inscription</button>
                <a href="?p=signin"><p class="already">Deja un compte ?</p></a>
            </form>
        </div>
    </div>
</div>