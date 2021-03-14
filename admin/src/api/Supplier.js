import axiosApi from "@/api/Api";

const END_POINT = "supplier";

export default {
  get(page, itemsPerPage, header) {
    return axiosApi.get(
      `${END_POINT}/?page=${page}&itemsPerPage=${itemsPerPage}`,
      header
    );
  },
  store(data, header) {
    return axiosApi.post(`${END_POINT}/store`, data, header);
  },
  edit(id, header) {
    return axiosApi.get(`${END_POINT}/edit/${id}`, header);
  },
  update(id, data, header) {
    return axiosApi.put(`${END_POINT}/update/${id}`, data, header);
  }
};
