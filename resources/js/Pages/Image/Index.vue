<template>
    <app-layout>
        <template #header>
            <h1 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800 ">
                ImageIndex
            </h1>
            <div>
                <Link
                    class="float-right"
                    :href="route('image.create')"
                >
                    <jet-button>CREATE</jet-button>
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
                                                이미지
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                상품명
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
                                        <tr v-if="!images">
                                            <td class="p-4 text-center text-gray-900" colspan="5">
                                                데이터가 없습니다.
                                            </td>
                                        </tr>
                                        <tr v-for="image in images" :key="image.id">
<!--                                            이미지 ID-->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ image.id }}
                                            </td>
                                            <!--                                            이미지-->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <img
                                                    :src="'/storage/' + image.image"
                                                    class="object-cover h-40 w-80"
                                                />
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ image.title }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ image.price }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ image.created_at }}
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
    name: "Index",
    components: {
        AppLayout,
        Link,
        JetButton
    },

    props: {
        images: Array,
    },

    setup(props){
        console.log('이미지테스트');
        // console.log(props);
        // console.log(props.images[0].image);
    },

    methods: {
        showImage(){
            return "/image/";
        },
    },

}
</script>

<style scoped>

</style>

