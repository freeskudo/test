<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="ログイン" />

    <BreezeGuestLayout>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            ログイン
                        </h2>

                        <form @submit.prevent="submit">

                            <div class="grid grid-cols-8 text-left">

                                <div class="col-span-2 pb-10 flex justify-end pt-2">
                                    メールアドレス
                                </div>

                                <div class="col-span-4 pb-10 text-center">
                                    <input type="email" id="email" name="email" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-5/6 px-10" placeholder="" v-model="form.email" required autofocus autocomplete="username" />
                                    <div v-show='form.errors["email"]' class="p-1 m-1 text-sm text-red-400">{{ ( form.errors['email'] ? form.errors['email'] : "" ).replace('email', 'メールアドレス') }}</div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-end pt-2">
                                    パスワード
                                </div>

                                <div class="col-span-4 pb-10 text-center">
                                    <input type="password" id="password" name="password" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-5/6 px-10" placeholder="" v-model="form.password" required autocomplete="current-password" />
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"></div>

                                <div class="col-span-4 pb-10 text-center">
                                    <button type="submit" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">ログイン</button>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"></div>

                                <div class="col-span-4 pb-10 text-center">
                                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                                        パスワードを忘れた方
                                    </Link>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                            </div>

                        </form>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10"></div>

                            <div class="col-span-4 pb-10 text-center">
                                <div class="border-t-2 border-gray-900 w-full pb-12"></div>
                                <button @click="jumpToRegister" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">新規会員登録</button>
                            </div>

                            <div class="col-span-2 pb-10"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

    </BreezeGuestLayout>
</template>

<script>
    export default {
        methods: {
            jumpToRegister: function() {
                this.$inertia.get('register');
            }
        }
    }
</script>