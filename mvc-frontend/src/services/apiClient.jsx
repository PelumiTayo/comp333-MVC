import axios from "axios";
//holds all of the routes to the backend

class ApiClient {
  constructor(remoteHostUrl) {
    this.remoteHostUrl = "http://localhost";
  }


  async request({ endpoint, method, data = {} }) {
    //setting up the url and method 
    const url = `${this.remoteHostUrl}/${endpoint}`;
    console.debug("API Call:", endpoint, data, method);
    const params = method === "GET" ? data : {};
    const headers = {
      "Content-Type": "multipart/form-data",
    };

    try {
      const res = await axios({ url, method, data, params, headers });
      return { data: res.data, error: null };
    } catch (error) {
      console.error("APIclient.makeRequest.error", error.response);
      if (error?.response?.status === 404)
        return { data: null, error: "Not found" };
      return { data: null, error: error?.response };
    }
  }

  //routes
  async register(creds) {
    return await this.request({
      endpoint: `register`,
      method: `POST`,
      data: creds,
    });
  }
}

export default new ApiClient("http://localhost");
