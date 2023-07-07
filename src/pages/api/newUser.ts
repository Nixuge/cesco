import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';


export default async function handler(req: NextApiRequest , res: NextApiResponse) {
    const { username, email, password } = req.body;

    const result = await prisma.user.create({
        data: {
            username: username,
            email: email,
            password: password
        }
    })
    res.json(result);
}