import { useState, useEffect } from "react";
import parse from 'html-react-parser';

import Post from "@/components/post";
import styles from "../styles/Home.module.css";
import { parseCookies } from "@/lib/cookie";

interface PostData {
    id: string;
    content: string;
    date: string;
}

export default function Home() {
    const [postsData, setPostData] = useState<PostData[]>([]);


    const coockies = parseCookies()
    console.log(coockies)


    useEffect(() => {
        const fetchPosts = async () => {
            try {
                const response = await fetch("/api/posts");
                const data = await response.json();
                setPostData(data);
            } catch (error) {
                console.error("Error fetching posts:", error);
            }
        };

        fetchPosts();
    }, []);

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
