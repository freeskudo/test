<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="パスワード再設定" />

    <BreezeGuestLayout>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            パスワード再設定
                        </h2>

                        <p class="pb-10">登録されたメールアドレスを入力してください。パスワード再設定のメールをお送りします。</p>

                        <form @submit.prevent="submit">

                            <div class="grid grid-cols-8 text-left">

                                <div class="col-span-2 pb-10 flex justify-end pt-2">
                                    メールアドレス
                                </div>

                                <div class="col-span-4 pb-10 text-center">
                                    <input type="email" id="email" name="email" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-5/6 px-10" placeholder="" v-model="form.email" required autofocus autocomplete="username" />
                                    <div v-show='form.errors["email"]' class="p-1 m-1 text-sm text-red-400">{{ ( form.errors['email'] ? form.errors['email'] : "" ).replace('email', 'メールアドレス') }}</div>
                                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                        {{ status }}
                                    </div>
                                    <BreezeValidationErrors class="mb-4" />
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"></div>

                                <div class="col-span-4 pb-10 text-center">
                                    <button type="submit" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">送信する</button>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </BreezeGuestLayout>
</template>
