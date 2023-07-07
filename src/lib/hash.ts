import * as bcrypt from 'bcrypt';

export function hashPassword(password: string): string {
    return bcrypt.hash(password, 10).then(function(hash: string){
        return hash.toString();
    })
}