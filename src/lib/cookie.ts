import cookie from "cookie";
import { NextApiRequest, NextApiResponse } from 'next';

export function parseCookies(req: NextApiRequest) {
    const cookieHeader = req?.headers?.cookie || "";
    return cookie.parse(cookieHeader);
}
