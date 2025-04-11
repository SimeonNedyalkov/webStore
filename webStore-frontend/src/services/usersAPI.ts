import requesterAPI from "./requester";

const BASE_URL = "http://webStore.test";

async function login(email: string, password: string) {
    const resp = await requesterAPI.post(BASE_URL + "/api/login", {
        email,
        password,
    });
    return resp;
}
async function register(name: string, email: string, password: string) {
    const resp = await requesterAPI.post(BASE_URL + "/api/register", {
        name,
        email,
        password,
    });
    return resp;
}

async function getStatus(accessToken: string) {
    const resp = await fetch(BASE_URL + "/api/status", {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${accessToken}`,
        },
    });
    return resp;
}

const usersAPI = { login, register, getStatus };
export default usersAPI;
