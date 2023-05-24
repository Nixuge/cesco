import styles from "./post.module.css"
import { ReactNode } from 'react'


export interface postProps{
    children: ReactNode,
    title: string,
    author: string,
    date: string,
}    

export default function Post({children, title, author, date}: postProps){

    return(
        <div className={styles.post}>
            <div className={styles.infopost}>
                <div className={styles.namedatepost}>
                    <p className={styles.namepost}>{author}</p>
                    <p className={styles.datepost}>{date}</p>
                </div>
            </div>
            <div className={styles.line}></div>
            <p className={styles.textpost}>{children}</p>
            <div className={styles.postfooter}>
            <button className={styles.buttonbottom}><p className={styles.buttonbottomtext}>!</p></button>
            <button className={styles.buttonbottom}><p className={styles.buttonbottomtext}>X</p></button>
            <button className={styles.buttonbottom}><p className={styles.buttonbottomtext}>↑</p></button>
            <button className={styles.buttonbottom}><p className={styles.buttonbottomtext}>X</p></button>

            </div>
        </div>
    );
}