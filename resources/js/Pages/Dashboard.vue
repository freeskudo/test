<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 bg-white border border-black text-center">

                        <div class="grid grid-cols-2">
                            <div>
                                <button id="btn-login" class="border border-black text-white bg-black font-medium text-sm w-5/6 px-5 py-2.5 text-center" disabled>会員情報</button>
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
                <div class="overflow-hidden">
                    <div class="p-20 text-left">

                        <h2 class="text-xl text-gray-800 leading-tight py-10">
                            {{ $page.props.auth.user.name }} さま
                        </h2>

                        <div class="text-left">

                            <p>
                                現在のポイント：
                                <font class="text-xl text-bold text-xl">{{ $page.props.login_user_point }}</font>
                                ポイント
                            </p>
                            <small v-show="$page.props.oldest_point.point">（ポイントの有効期限：{{ $page.props.oldest_point.point }}ポイントが{{ ($page.props.oldest_point.deadline.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}に失効します）</small>

                        </div>

                        <h3 class="text-xl text-bold text-gray-800 leading-tight py-10">
                            住所
                        </h3>

                        <div class="text-left">

                            <p>
                                <font class="">{{ $page.props.login_user_profile.post }}</font>
                            </p>

                            <p>
                                <font class="">{{ $page.props.login_user_profile.region }}</font>
                                <font class="">{{ $page.props.login_user_profile.locality }}</font>
                                <font class="">{{ $page.props.login_user_profile.street }}</font>
                            </p>

                        </div>

                        <h3 class="text-xl text-bold text-gray-800 leading-tight py-10">
                            電話番号
                        </h3>

                        <div class="text-left">

                            <p>
                                <font class="">{{ $page.props.login_user_profile.phone }}</font>
                            </p>

                        </div>

                        <h3 class="text-xl text-bold text-gray-800 leading-tight py-10">
                            メールアドレス
                        </h3>

                        <div class="text-left">

                            <p>
                                <font class="">{{ $page.props.auth.user.email }}</font>
                            </p>

                        </div>

                        <h3 class="text-xl text-bold text-gray-800 leading-tight py-10">
                            メールマガジン登録
                        </h3>

                        <div class="text-left">

                            <p>
                                <font class="">{{ ($page.props.login_user_optin.optin ? "登録する" : "登録しない") }}</font>
                            </p>

                        </div>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10 flex justify-between"></div>

                            <div class="col-span-4 pb-10 text-center">
                                <button @click="edit" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">変更する</button>
                            </div>

                            <div class="col-span-2 pb-10"></div>

                        </div>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10 flex justify-between"></div>

                            <div class="col-span-4 pb-10 text-center">
                                <button @click="logout" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">ログアウト</button>
                            </div>

                            <div class="col-span-2 pb-10"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
    export default {
        methods: {
            edit: function() {
                this.$inertia.get('/user-edit');
            },
            logout: function() {
                this.$inertia.post('/logout');
            }
        }
    }
</script>