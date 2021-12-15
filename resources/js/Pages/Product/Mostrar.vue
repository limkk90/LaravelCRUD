<template>
    <app-layout>
        <template #header>
            <h1 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800 ">Product</h1>
            <div>
                <Link
                    class="float-right"
                    :href="route('product.create')"
                >
                    <jet-button>Create</jet-button>
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                제품번호
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                                제목
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                가격
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                등록일
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="!products">
                                                <td class="p-4 text-center text-gray-900" colspan="5">
                                                    데이터가 없습니다.
                                                </td>
                                            </tr>
                                            <tr v-for="post in products" :key="post.id">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ post.id }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <Link
                                                        :href="route('product.show', post.id)"
                                                        class="text-indigo-600 hover:text-indigo-900">
                                                    {{ post.description}}
                                                    </Link>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ post.price }}

                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ post.created_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import {Link} from '@inertiajs/inertia-vue3';
import JetButton from '@/JetStream/Button';
export default {
    name: "Mostrar",
    components: {
        AppLayout,
        Link,
        JetButton
    },

    props: {
        products: Array,
    },

    setup(props){
        console.log('테스트');
        console.log(props);
    }


}
</script>

<style scoped>

</style>
