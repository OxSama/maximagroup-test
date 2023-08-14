
import axios from "axios";
import router from "@/router";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

axios.interceptors.request.use(
  function (config) {
    if (config.excludeToken) {
      return config;
    }
    const accessToken = sessionStorage.getItem("token");
    if (accessToken) {
      config.headers.Authorization = `Bearer ${accessToken}`;
    }
    return config;
  },
  function (error) {
    return Promise.reject(error);
  }
);

axios.interceptors.response.use(
  function (response) {
    return response;
  },
  function (error) {
    if (error.response && error.response.status === 401) {
      const errorMessage = error.response.data.error_message;
      if (errorMessage === "User not authenticated") {
        sessionStorage.removeItem("token");
        // sessionStorage.removeItem("refresh_token");
        useToast().open({message:"User not logged in", position: "bottom-right", type:"error"});
        router.push("/login");
      }
    }
    return Promise.reject(error);
  }
);
