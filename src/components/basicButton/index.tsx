import React from 'react';
import styles from './basicButton.module.css';

interface BasicButtonProps {
  children: React.ReactNode;
}

const BasicButton: React.FC<BasicButtonProps> = ({ children }) => {
  return (
    <button className={styles.buttonbottom}>
      <p className={styles.buttonbottomtext}>{children}</p>
    </button>
  );
};

export default BasicButton;
