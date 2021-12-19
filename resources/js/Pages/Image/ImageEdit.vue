<template>
    <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ImageProduct Edit
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <jet-form-section @submit="updateImageInformation">
                <template #title>
                    이미지제품수정
                </template>

                <template #description>
                    이미지제품을 수정 해보세요
                </template>

                <template #form>
                    <!--          제품수정 타이틀-->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="title" value="Title" />
                        <jet-input
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            autocomplete="title" />
                        <jet-input-error :message="form.errors.title" class="mt-2" />
                    </div>
                    <!--        제품수정 가격-->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="price" value="Price" />
                        <jet-input
                            id="price"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.price"
                            autocomplete="price" />
                        <jet-input-error :message="form.errors.price" class="mt-2" />
                    </div>
                    제품수정 이미지
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="avatar" value="이미지" />
                        <jet-input
                            type="file"
                            @input="form.avatar = $event.target.files[0]" />
<!--                        이미지를 가져올 방법없나?-->
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    </div>
                </template>

                <template #actions>
                    <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </jet-action-message>

                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        수정
                    </jet-button>
                </template>
            </jet-form-section>
        </div>
    </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import JetLabel from '@/Jetstream/Label.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetButton from '@/Jetstream/Button.vue'
import {useForm} from "@inertiajs/inertia-vue3";
import JetFormSection from '@/Jetstream/FormSection.vue'
export default {
    name: "ImageEdit",
    components: {
        AppLayout,
        JetLabel,
        JetInput,
        JetInputError,
        JetActionMessage,
        JetButton,
        JetFormSection
    },
    props: {
        image: Object,
    },
    setup(props){
        const form = useForm({
            _method: 'PUT',
            title: props.image.title,
            price: props.image.price,
            avatar: null,
        });

        const updateImageInformation = () => {
            alert(form.avatar);
          //  for.update가 아니라 form.post로 보내야됨 inertia docs 참조
          form.post(route("image.update", props.image.id), {
              preserveScroll: true,
          });
        };
        return {form, updateImageInformation}
    },

}
</script>

<style scoped>

</style>
