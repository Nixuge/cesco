import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';


export default async function handler(req: NextApiRequest , res: NextApiResponse) {

  const post = await prisma.post.findMany();
  res.json(post)
}