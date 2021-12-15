<template>
    <app-layout>
        <template #header>
            <h1 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800 ">
                ImageCreate
            </h1>
        </template>
        <div>
            <form @submit.prevent="submit">
                <input type="file" @input="form.avatar = $event.target.files[0]" />

                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
                <button type="submit">Submit</button>
            </form>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import {useForm} from "@inertiajs/inertia-vue3";
export default {
    name: "Create",
    components: {
        AppLayout
    },
    setup(){
        const form = useForm({
            _method: 'POST',
            avatar: null,
        })

        function submit(){
            form.post(route("image.store"));
        }
        return {form, submit}
    },
}
</script>

<style scoped>

</style>
