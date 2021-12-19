<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ImageProduct Show
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-5">
                    상품번호: {{ images.id }}<br />
                    상품명: {{ images.title }}<br />
                    가격: {{ images.price }}<br />
                    등록일자: {{ images.created_at }}<br />
                    업데이트일자: {{ images.updated_at }}<br />
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-5">
                    <img
                        :src="'/storage/' + images.image"
                        class="object-cover h-40 w-80"
                    />
                </div>
                <Link
                    :href="route('image.edit', images.id)"
                    class="text-indigo-600 hover:text-indigo-900 float-right">
                    <jet-button>수정</jet-button>
                </Link>

                <Link
                    method="delete"
                    :href="route('image.destroy', images.id)"
                    class="text-indigo-600 hover:text-indigo-900 float-right">
                    <jet-button>삭제</jet-button>
                </Link>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import {Link} from '@inertiajs/inertia-vue3';
import {useForm} from "@inertiajs/inertia-vue3";
import JetButton from '@/JetStream/Button';
import JetFormSection from '@/Jetstream/FormSection.vue'
export default {
    name: "Show",
    components: {
        AppLayout,
        Link,
        JetButton,
        JetFormSection
    },
    props:{
        images: Array,
    },
    setup(props){

    }
}
</script>

<style scoped>

</style>
