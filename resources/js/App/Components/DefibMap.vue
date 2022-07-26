<template>
    <GMapMap
        :center="center"
        :zoom="14"
        style="width: 100%; height: 650px;"
        map-type-id="hybrid"
    >
        <GMapMarker
            :key="index"
            v-for="(defib, index) in defibs"
            :position="defib.position"
            :title="defib.name"
            :clickable="true"
            @click="openMarker(index)"
        >
            <GMapInfoWindow
                :closeclick="true"
                @closeclick="closeMarker"
                :opened="openedMarker === index"
            >
                <div>{{ defib.label }}</div>
            </GMapInfoWindow>
        </GMapMarker>
    </GMapMap>
</template>

<script>
import {onMounted, ref} from 'vue';

import useDefibs from "../Services/defibs";

export default {
    name: "DefibMap",
    components: {},
    setup() {
        let openedMarker = ref(null);
        const {defibs, getDefibs} = useDefibs();
        const center = {lat: 52.930991, lng: -6.2325032};

        const openMarker = (index) => {
            openedMarker.value = index;
        }

        const closeMarker = () => {
            openedMarker.value = null;
        }

        onMounted(() => {
            getDefibs();
        });

        return {defibs, center, openedMarker, openMarker, closeMarker};
    },
}
</script>

<style scoped>

</style>
