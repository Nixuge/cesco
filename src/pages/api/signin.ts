import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';

export default async function handler(req: NextApiRequest, res: NextApiResponse) {
  const { username, password } = req.body;
  const user = await prisma.user.findMany({
    where: {
      username: username,
      password: password
    }
  });

  if (user.length >= 1) {
    const userCookie = JSON.stringify({ userId: user.id, username: user.username });
    console.log(userCookie);
    res.setHeader('Set-Cookie', `user=${userCookie}; Path=/; Max-Age=43200; SameSite=Strict`);
    res.json({ accepted: true });
  } else {
    res.json({ accepted: false, raise: "Invalid password or username. 😮" });
  }
}
