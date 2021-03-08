import axiosApi from "@/api/Api";

const END_POINT = "category";

export default {
  get(id, header) {
    return axiosApi.get(`${END_POINT}/get/${id}`, header);
  },
  store(data, header) {
    return axiosApi.post(`${END_POINT}/store`, data, header);
  },
  update(id, data, header) {
    return axiosApi.put(`${END_POINT}/update/${id}`, data, header);
  },
  tree(header) {
    return axiosApi.get(`${END_POINT}/tree`, header);
  },
  reorder(data, header) {
    return axiosApi.post(`${END_POINT}/tree/reorder`, data, header);
  }
};
