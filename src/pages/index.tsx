import Post from "@/components/post";
import styles from "../styles/Home.module.css"

export default function index() {
    return(
        <div className={styles.chatpostcom}>
            <Post author="jdm" date="11-09-01">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus et exercitationem modi? Perferendis eaque cumque doloribus aliquam similique voluptatibus sapiente! Similique minima assumenda cupiditate iusto labore, repudiandae ullam commodi natus.
            </Post>
        </div>
    )
}