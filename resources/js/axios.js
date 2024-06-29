import axios from "axios"

 var host= '/';

const axiosClient = axios.create({
    baseURL: host,
    withCredentials: true,
});

axiosClient.interceptors.request.use((config)=>{
    // config.headers.Authorization = 'Bearer '+sessionStorage.getItem('token');
    // config.headers.Content_Type = "application/json";
    config.headers.Accept = "application/json";
    config.headers.guard = sessionStorage.getItem('guard');
    return config;
})

// Add a response interceptor
// axiosClient.interceptors.response.use(function (response) {
//     // Any status code that lie within the range of 2xx cause this function to trigger
//     // Do something with response data
//     return response;
//   }, function ({response}) {
//     if(response.status == 401){
//         sessionStorage.clear();
//         router.push('/login');
//       }
//       // console.log(response);
//     // Any status codes that falls outside the range of 2xx cause this function to trigger
//     // Do something with response error
//     return Promise.reject(response);
//   });


export default axiosClient;