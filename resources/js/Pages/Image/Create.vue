<template>
    <app-layout>
        <template #header>
            <h1 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800 ">
                ImageCreate
            </h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="createImage">
                    <template #form>
                        <!-- Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="상품명" />
                            <jet-input
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                                autocomplete="title"
                            />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>

                        <!-- price -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="price" value="가격" />
                            <jet-input
                                id="price"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.price"
                                autocomplete="price"
                            />
                            <jet-input-error :message="form.errors.price" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="avatar" value="이미지" />
                            <jet-input
                                type="file"
                                @input="form.avatar = $event.target.files[0]" />
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
                            Save
                        </jet-button>
                    </template>

                </jet-form-section>
            </div>
        </div>
<!--            <form @submit.prevent="submit">-->
<!--                <input type="file" @input="form.avatar = $event.target.files[0]" />-->

<!--                <progress v-if="form.progress" :value="form.progress.percentage" max="100">-->
<!--                    {{ form.progress.percentage }}%-->
<!--                </progress>-->
<!--                <button type="submit">Submit</button>-->
<!--            </form>-->

    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import {useForm} from "@inertiajs/inertia-vue3";
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetButton from '@/Jetstream/Button.vue'

export default {
    name: "Create",
    components: {
        AppLayout,
        JetFormSection,
        JetLabel,
        JetInput,
        JetInputError,
        JetActionMessage,
        JetButton
    },
    setup(){
        const form = useForm({
            _method: 'POST',
            title: '',
            price: '',
            avatar: null,
        })
        const createImage = ()=>{
            form.post(route("image.store"));
        };
        return {form, createImage}
        // function submit(){
        //     form.post(route("image.store"));
        // }
        // return {form, submit}

    },
}
</script>

<style scoped>

</style>
