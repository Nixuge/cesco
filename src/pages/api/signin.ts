import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';
import { useCookies } from "react-cookie"


export default async function handler(req: NextApiRequest , res: NextApiResponse) {
    const { username, password } = req.body;
    const user = await prisma.user.findMany({
        where: {
            username: username,
            password: password
        }
    })
    if (user.length >= 1) {
        res.json({accepted: true})
    }else{
        res.json({accepted: false, raise: "Invalid password or username. 😮"})
    }
}