import * as bcrypt from 'bcrypt-ts';

export async function hashPassword(password: string): Promise<string> {
    const hash = await bcrypt.hash(password, 10);
    return hash.toString();
}