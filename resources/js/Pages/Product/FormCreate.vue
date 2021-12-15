<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                제품등록
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="createPost">
                    <template #title>
                        Profile Information
                    </template>

                    <template #description>
                        Update your account's profile information and email address.
                    </template>

                    <template #form>
                        <!-- Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="Title" />
                            <jet-input
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                autocomplete="description"
                            />
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                        </div>

                        <!-- price -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="price" value="aarice" />
                            <jet-input
                                id="price"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.price"
                                autocomplete="price"
                            />
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
import JetFormSection from '@/Jetstream/FormSection.vue'
import {useForm} from "@inertiajs/inertia-vue3";
import JetLabel from '@/Jetstream/Label.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetButton from '@/Jetstream/Button.vue'


export default {
    name: "FormCreate",
    components: {
        AppLayout,
        JetFormSection,
        JetLabel,
        JetInput,
        JetInputError,
        JetActionMessage,
        JetButton
    },

    props: {
        errors: Object
    },

    setup(){
        const form = useForm({
            _metohd: 'POST',
            description: '',
            price: ''
        });

        const createPost = () => {
            form.post(route("product.store"));
        };
        return {
            form,
            createPost
        }
    }

    // data(){
    //     return{
    //         description: null,
    //         price: null,
    //     }
    //
    // },
    // methods:{
    //     submit(){
    //         this.$inertia.post(route('product.store'), this.form);
    //     }
    // }
}
</script>

<style scoped>

</style>
