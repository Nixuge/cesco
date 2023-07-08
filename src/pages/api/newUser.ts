import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';


export default async function handler(req: NextApiRequest , res: NextApiResponse) {
    const { username, email, password } = req.body;
    if(username.length >= 3){
        const result = await prisma.user.create({
            data: {
                username: username,
                email: email,
                password: password
            }
        })
        res.json(result);
    }else{
        res.json({ error: "Username is too short (length >= 3)" })
    }
}