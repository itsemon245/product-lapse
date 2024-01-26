import AES from "crypto-js/aes";
import Utf8 from "crypto-js/enc-utf8";

export default {
    encrypt(message, key = import.meta.env.VITE_APP_KEY) {
        const secret = AES.encrypt(message, key).toString();
        return secret;
    },
    reveal(secret, key = import.meta.env.VITE_APP_KEY) {
        const message = AES.decrypt(secret, key).toString(Utf8);
        return message;
    },
};
