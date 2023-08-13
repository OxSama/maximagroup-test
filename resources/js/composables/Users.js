import { ref } from "vue";
import axios from "axios";

export default function useUsers(){
    const users = ref([]);

    const getUsers = async () => {
        let res = await axios.get("/api/user");
        users.value = res.data.data;
    }

    return {
        users,
        getUsers
    }
}
