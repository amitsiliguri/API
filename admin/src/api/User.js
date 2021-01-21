import axiosApi from "@/api/Api";

const END_POINT = 'user';

export default {
    requestToken(credential) {
        return axiosApi.post(`${END_POINT}/request/token`, credential);
    },
    getCurrentUserDetails(header) {
        return axiosApi.get(END_POINT, header);
    },
}