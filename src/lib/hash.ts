import * as bcrypt from 'bcrypt-ts';

export function hashPassword(password: string): string {
    const saltRounds = 10;
    const hash = bcrypt.hashSync(password, saltRounds);
    return hash.toString();
}