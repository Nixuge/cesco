import React, { ReactNode } from 'react';
import styles from './post.module.css';
import BasicButton from '../basicButton';

export interface PostProps {
  children: ReactNode;
  title: string;
  author: string;
  date: string;
}

const Post: React.FC<PostProps> = ({ children, title, author, date }) => {
  return (
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
        <BasicButton>!</BasicButton>
        <BasicButton>X</BasicButton>
        <BasicButton>↑</BasicButton>
        <BasicButton>↕</BasicButton>
        <BasicButton>↓</BasicButton>
      </div>
    </div>
  );
};

export default Post;
