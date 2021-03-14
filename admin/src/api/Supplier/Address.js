import axiosApi from "@/api/Api";

const END_POINT = "supplier/address";

export default {
  get(supplierId, parameter, header) {
    return axiosApi.get(`${END_POINT}/${supplierId}/${parameter}`, header);
  },
  store(data, header) {
    return axiosApi.post(`${END_POINT}/store`, data, header);
  },
  update(id, data, header) {
    return axiosApi.put(`${END_POINT}/update/${id}`, data, header);
  }
};
