import Api from "@/api/Api";

const END_POINT = 'user';

export default {
    requestToken(credential) {
        return Api.post(`${END_POINT}/request/token`, credential);
    }
}