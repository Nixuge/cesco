<div class=popup-inscription id="popInscript">
    <div class="popup-content">
        <h1 class=connection-inscription-title>Connexion</h1>
        <p><?php echo $_GET["message"]; ?></p>
        <div class=popup-subcontent>
            <form action="api/connection.php" method="post">
                <input
                    type="text"
                    name="username"
                    class="connection-inscription-input"
                    placeholder="Nom d'utilisateur"
                    minlength=3
                />
                <input
                    name="password"
                    type="password"
                    class=connection-inscription-input
                    placeholder="Mot de passe"
                    minlength=8
                />
                <button class="connect-inscript-button" type="submit">Connexion</button>
                
            </form>
        </div>
    </div>
</div>