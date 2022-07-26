<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200">
                    <div class="flex flex-row-reverse pb-2">
<!--                        <a href="{{ route('admin.defibs.create') }}"-->
<!--                           class="items-center px-2 py-1  font-medium shadow-sm text-white bg-red-600">-->
<!--                            Create Defib-->
<!--                        </a>-->
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Display
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Last Inspected On
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pads Expire On
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">View</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="defib in defibs">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ defib.name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ defib.display_on_map ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ formatDate(defib.last_inspected_at) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ formatDate(defib.pads_expire_at) }}
                            </td>
<!--                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">-->
<!--                                <a href="" class="text-indigo-600 hover:text-indigo-900">View</a>-->
<!--                            </td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {onMounted} from "vue";
import useDefibs from "../Services/defibs";

export default {
    name: "ListDefibs",
    setup() {
        const {defibs, getDefibs} = useDefibs();

        onMounted(() => {
            getDefibs();
        });

        const formatDate = (dateString) => {
            const date = new Date(dateString);
            const options = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };

            return new Intl.DateTimeFormat('default', options).format(date);
        }

        return {defibs, formatDate};
    }
}
</script>

<style scoped>

</style>
