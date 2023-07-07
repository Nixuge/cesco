import styles from "../styles/Signup.module.css";
import { useState } from "react";
import { useRouter } from 'next/router';
import { hashPassword } from "@/lib/hash"

interface FormData {
    username: string;
    email: string;
    password: string;
}

const Signup: React.FC = () => {
    const router = useRouter();
    const [formData, setFormData] = useState<FormData>({
      username: '',
      email: '',
      password: '',
    });
  
    const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
      setFormData({ ...formData, [e.target.name]: e.target.value });
    };
  
    const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
      e.preventDefault();
      setFormData({ ...formData, ["password"]: await hashPassword(formData["password"]) });
      try {
        const response = await fetch('/api/newUser', {
          method: 'POST',
          body: JSON.stringify(formData),
          headers: {
            'Content-Type': 'application/json',
          },
        });
  
        if (response.ok) {
          const result = await response.json();
          console.log(result);
  
          router.push("/")
        } else {
          throw new Error('Failed to create post');
        }
      } catch (error) {
        console.error(error);
      }
    };
  
  
    return (
        <div className={styles["popup-inscription"]} id="popInscript">
            <div className={styles["popup-content"]}>
                <h1 className={styles["connection-inscription-title"]}>Inscription</h1>
                <div className={styles["popup-subcontent"]}>
                    <form onSubmit={handleSubmit}>
                        <input
                            value={formData.username} 
                            onChange={handleChange}
                            type="text"
                            name="username"
                            className={styles["connection-inscription-input"]}
                            placeholder="Nom d'utilisateur"
                            minLength={0}
                        />
                        <input
                            value={formData.email} 
                            onChange={handleChange}
                            type="text"
                            name="email"
                            className={styles["connection-inscription-input"]}
                            placeholder="Email"
                            minLength={0}
                        />
                        <input
                            value={formData.password} 
                            onChange={handleChange}
                            name="password"
                            type="text"
                            className={styles["connection-inscription-input"]}
                            placeholder="Mot de passe"
                            minLength={8}
                        />
                        <input type="submit" className={styles["connect-inscript-button"]} content="Inscription" />
                    </form>
                </div>
            </div>
        </div>
  );
}

export default Signup