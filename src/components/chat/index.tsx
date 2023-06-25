import styles from "./chat.module.css"

export default function Chat(){
    return(
        <div className={styles.chat}>
            <div className={styles.bottomchat}
                <input type="text" placeholder="Envoyer un message" />
                <button class={styles.sendchatcom}><p class="send-chat-com-text">></p></button>
            </div>
        </div>
    )
}