import {ref} from 'vue';
import {useLoading} from 'vue-loading-overlay'

export default function useDefibs() {
    const defibs = ref([]);
    const $loading = useLoading();

    const getDefibs = async () => {
        const loader = $loading.show();

        axios.get('/api/defibs')
            .then((res) => {
                defibs.value = res.data.data;
            })
            .finally(() => {
                loader.hide();
            });
    }

    return {defibs, getDefibs};
};
