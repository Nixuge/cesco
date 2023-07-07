import styles from "../styles/Signup.module.css";

export default function Signup() {
  return (
    <div className={styles["popup-inscription"]} id="popInscript">
      <div className={styles["popup-content"]}>
        <h1 className={styles["connection-inscription-title"]}>Inscription</h1>
        <div className={styles["popup-subcontent"]}>
          <input
            type="text"
            className={styles["connection-inscription-input"]}
            placeholder="Nom d'utilisateur"
            minLength={0}
          />
          <input
            type="text"
            className={styles["connection-inscription-input"]}
            placeholder="Email"
            minLength={0}
          />
          <input
            type="text"
            className={styles["connection-inscription-input"]}
            placeholder="Mot de passe"
            minLength={8}
          />
          <button className={styles["connect-inscript-button"]}>
            Inscription
          </button>
          <button className={styles["close-pop"]} id="closePopIns">
            Close
          </button>
        </div>
      </div>
    </div>
  );
}
