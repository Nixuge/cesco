import styles from "../styles/Signup.module.css";
import { useState } from "react";
import { useRouter } from 'next/router';
import { hashPassword } from "@/lib/hash"

interface FormData {
    username: string;
    email: string;
    password: string;
}

const Signup: React.FC = (props) => {
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

        
        const hashedPassword = await hashPassword(formData.password);
        const updatedFormData ={...formData, password: hashedPassword}

        console.log(updatedFormData);

        try {
            const response = await fetch('/api/newUser', {
                method: 'POST',
                body: JSON.stringify(updatedFormData),
                headers: {
                    'Content-Type': 'application/json',
                },
            });

            if (response.ok) {
                const result = await response.json();
                router.push("/")
            } else {
                throw new Error('Failed to create new user.');
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
                            minLength={3}
                        />
                        <input
                            value={formData.email}
                            onChange={handleChange}
                            type="email"
                            name="email"
                            className={styles["connection-inscription-input"]}
                            placeholder="Email"
                            minLength={0}
                        />
                        <input
                            value={formData.password}
                            onChange={handleChange}
                            name="password"
                            type="password"
                            className={styles["connection-inscription-input"]}
                            placeholder="Mot de passe"
                            minLength={8}
                        />
                        <input type="submit" className={styles["connect-inscript-button"]} value="Inscription" /> {/* Utiliser "value" au lieu de "content" pour définir la valeur du bouton */}
                    </form>
                </div>
            </div>
        </div>
    );
}

export default Signup;
