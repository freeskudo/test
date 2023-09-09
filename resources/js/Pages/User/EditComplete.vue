<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeCheckboxes from '@/Components/Checkboxes.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    request: Array
});

</script>

<template>
    <Head title="完了" />

    <BreezeGuestLayout>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 bg-white border border-black text-center">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            マイページ
                        </h2>

                        <div class="grid grid-cols-2">
                            <div>
                                <button @click="mypage" class="border border-black text-black bg-white font-medium text-sm w-5/6 px-5 py-2.5 text-center">会員情報</button>
                            </div>
                            <div>
                                <button id="btn-register" onclick="location.href='./register'" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">注文履歴</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            会員情報の変更が完了しました。
                        </h2>

                        <div class="pt-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden">
                                    <div class="p-6 bg-white flex justify-center">
                                        <button @click="logout" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">ログアウト</button>
                                    </div>
                                </div>
                            </div>
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
            mypage: function() {
                this.$inertia.get('/dashboard');
            },
            logout: function() {
                this.$inertia.post('/logout');
            }
        }
    }
</script>