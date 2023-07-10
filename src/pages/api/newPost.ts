import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';


export default async function handler(req: NextApiRequest , res: NextApiResponse) {
    const { content } = req.body;

    const result = await prisma.post.create({
        data: {
            content: content,
            date: new Date().toISOString()
        }
    })
    res.json(result);
}