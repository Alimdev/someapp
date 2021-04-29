import api from "./api";

export default {
  createSession() {
    return api.get(`${window.APP_URL}sanctum/csrf-cookie`);
  },

  login(params) {
    return api.post(`${window.APP_URL}api/login`, params);
  },

  logout() {
    return api.delete(`${window.APP_URL}api/logout`);
  },

  getCurrencies(type) {
    return api.get(`${window.APP_URL}api/currency?type=${type}`);
  },

  getHistory() {
    return api.get(`${window.APP_URL}api/history`);
  },

  register(params){
    return api.post(`${window.APP_URL}api/register`, params)
  }
};
