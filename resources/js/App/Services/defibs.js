import {ref} from 'vue';

export default function useDefibs() {
    const defibs = ref([]);

    const getDefibs = async () => {
        axios.get('/api/defibs')
            .then((res) => {
                res.data.data.map((defib) => {
                    const coordinates = defib.coordinates.split(',');
                    defibs.value.push({
                        label: defib.location,
                        name: defib.name,
                        position: {
                            lat: parseFloat(coordinates[0]),
                            lng: parseFloat(coordinates[1]),
                        },
                    });
                });
            });
    }

    return {defibs, getDefibs};
}
