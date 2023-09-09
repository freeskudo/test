<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import YubinBangoCore from '@/Components/YubinBangoCore.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="新規会員登録完了" />

    <BreezeGuestLayout>

        <BreezeValidationErrors class="mb-4" />

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h1 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            新規会員登録完了
                        </h1>

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            ご登録ありがとうございます。
                        </h2>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-1 pb-10 flex justify-between"></div>

                            <div class="col-span-6 pb-10 text-center">
                                <p class="text-left">ご入力いただいたメールアドレスに「ご登録完了メール」をお送りいたしました。</p>
                                <p class="text-left">メールが届かない場合、マイページでご登録メールアドレスが正しいことをご確認ください。</p>
                                <p class="text-left">または、迷惑メールフォルダに届いていないかご確認ください。</p>
                            </div>

                            <div class="col-span-1 pb-10"></div>

                        </div>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10 flex justify-between"></div>

                            <div class="col-span-4 pb-10 text-center">
                                <button type="submit" @click="jumpToMyPage" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">マイページ</button>
                            </div>

                            <div class="col-span-2 pb-10"></div>

                        </div>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10 flex justify-between"></div>

                            <div class="col-span-4 pb-10 text-center">
                                <button type="submit" @click="jumpToTop" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">TOPへ</button>
                            </div>

                            <div class="col-span-2 pb-10"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </BreezeGuestLayout>
</template>

<script>
    export default {
        methods: {
            jumpToTop: function() {
                this.$inertia.get('/');
            },
            jumpToMyPage: function() {
                this.$inertia.get('/login');
            }
        }
    }
</script>