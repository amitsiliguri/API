import axiosApi from "@/api/Api";

const END_POINT = "supplier";

export default {
  store(data, header) {
    return axiosApi.post(`${END_POINT}/store`, data, header);
  }
};
