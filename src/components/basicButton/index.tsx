import styles from "./basicButton.module.css"

export default function basicButton({children}: any){
    return(
        <button className={styles.buttonbottom}>
            <p className={styles.buttonbottomtext}>{children}</p>
        </button>
    )
}