import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';
import { useCookies } from "react-cookie"

export default async function handler(req: NextApiRequest , res: NextApiResponse) {
    const { username, email, password } = req.body;
    if(username.length >= 3){
        try {
            const user = await prisma.user.create({
                data: {
                    username: username,
                    email: email,
                    password: password
                }
            })
            res.json(user)
    
            return
        } catch (err) {
            res.json({ error: "A user with that username or email already exists 😮" })
            return
        }
        


        
    }else{
        res.json({ error: "Username is too short (length must be > or = 3) 😮" })
        return
    }
}