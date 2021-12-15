<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product Show
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-5">
                    제품번호: {{ product.id }}<br />
                    상품명: {{ product.description }}<br />
                    가격: {{ product.price }}<br />
                    등록일자: {{ product.created_at }}<br />
                    업데이트일자: {{ product.updated_at }}<br />
                </div>
                <Link
                    :href="route('product.edit', product.id)"
                    class="text-indigo-600 hover:text-indigo-900 float-right">
                    <jet-button>수정</jet-button>
                </Link>

                <Link
                    method="delete"
                    :href="route('product.destroy', product.id)"
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
    name: "ProductShow",
    components: {
        AppLayout,
        Link,
        JetButton,
        JetFormSection
    },
    props:{
        product: Array,
    },
    setup(props){
        console.log("제대로오냐");
        console.log(props);
    }
}
</script>

<style scoped>

</style>
