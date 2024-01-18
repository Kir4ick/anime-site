const OK_REQUEST = 200;

export default class AbstractClient {
    url = ""

    getUrl (method) {
        return this.url + method
    }

    async post (method, data) {
        try {
            let response = await axios.post(this.getUrl(method), data)

            if (response.status === OK_REQUEST) {
                return response.data
            }
        } catch (exception) {
            console.log(exception)
        }

        return null
    }
}
