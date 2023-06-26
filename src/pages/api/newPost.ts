import { NextApiRequest, NextApiResponse } from 'next';
import { PrismaClient } from '@prisma/client'

type ResponseData = {
  message: string;
};

export default function handler(req: NextApiRequest, res: NextApiResponse<ResponseData>): void {
  if (req.method === 'POST') {
    const {body} = req;
    const {content} = body;
  }
}
