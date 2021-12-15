<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="updateProductInformation">
                    <template #title>
                        제품수정
                    </template>

                    <template #description>
                        제품을 수정 해보세요
                    </template>

                    <template #form>
                        <!--          디스크립션-->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="description" value="Title" />
                            <jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description" autocomplete="description" />
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                        </div>
                        <!--        가격-->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="price" value="Price" />
                            <jet-input id="price" type="text" class="mt-1 block w-full" v-model="form.price" autocomplete="price" />
                            <jet-input-error :message="form.errors.price" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
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
    name: "ProductEdit",
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
        product: Array,
    },
    setup(props){
        const form = useForm({
           _metohd: 'PUT',
           description: props.product.description,
           price: props.product.price,
        });

        const updateProductInformation = () => {
            form.put(route("product.update", props.product.id), {
               preserveScroll: true,
            });
        };

        return {form, updateProductInformation}
    },
}
</script>

<style scoped>

</style>
