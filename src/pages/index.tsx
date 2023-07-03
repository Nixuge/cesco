import Post from "@/components/post";
import styles from "../styles/Home.module.css";
import { useState } from "react"; 
import parse from 'html-react-parser';

interface PostData {
    id: string;
    content: string;
    date: string;
}

export default function Home() {
    const [postsData, setPostData] = useState<PostData[]>([]);

    const fetchPosts = async () => {
        const response = await fetch("api/posts");
        const data = await response.json();

        console.log(data);
        setPostData(data);
    };
    fetchPosts()
    return (
        <div className={styles.chatpostcom}>
        <div className={styles.posts}>
            {postsData.map((postData) => (
            <Post
                key={postData.id}
                author="jdm the genius"
                date={postData.date}
            >
                {parse(postData.content)}
            </Post>
            ))}
        </div>
        </div>
    );
}
