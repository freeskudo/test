<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import YubinBangoCore from '@/Components/YubinBangoCore.vue';

defineProps({
    request: Array
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

</script>

<template>
    <Head title="新規会員登録" />

    <BreezeGuestLayout>

        <form @submit.prevent="submit">

            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="p-20 bg-white border border-black text-center">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-4 pb-10">
                                新規会員登録確認
                            </h2>

                            <div class="grid grid-cols-8 text-left">

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（漢字）</p></div>

                                <div class="col-span-4">
                                    {{ request['name'] }}
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（カナ）</p></div>

                                <div class="col-span-4 pb-10">
                                    {{ request['kana'] }}
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>住所</p></div>

                                <div class="col-span-4 pb-10">
                                    <p>{{ request['post-domicile'] }}</p><p>{{ request['region-domicile'] }} {{ request['locality-domicile'] }} {{ request['street-domicile'] }}</p>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>電話番号</p></div>

                                <div class="col-span-4 pb-10">
                                    {{ request['phone'] }}
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールアドレス</p></div>

                                <div class="col-span-4 pb-10">
                                    {{ request['email'] }}
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>パスワード</p></div>

                                <div class="col-span-4 pb-10">
                                    {{ "*".repeat(request['password'].length) }}
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールマガジン</p></div>

                                <div class="col-span-4 pb-10">
                                    {{ (request['canRegister'] ? "登録する" : "登録しない") }}
                                </div>

                                <div class="col-span-2 pb-10"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="p-6 bg-white border border-black text-center">

                            <div class="grid grid-cols-2">
                                <div>
                                    <button type="button" @click="history();" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">戻る</button>
                                </div>
                                <div>
                                    <button type="submit" @click="register();" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">登録する</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>

    </BreezeGuestLayout>
</template>

<script>
    export default {
        methods: {
            history: function() {
                const formElements = document.forms.order;
                this.$inertia.post('/register', {
                    user: this.$page.props.request,
                    _token: this.$page.props.csrf_token,
                })
            },
            register: function() {
                // TODO: transaction
                console.log(this.$page.props.request);
                const formElements = document.forms.register;

                let obj1 = this.$page.props.request;
                let obj2 = { _token: this.$page.props.csrf_token }
                Object.assign(obj1, obj2);
                this.$inertia.post('/store',obj1)
            }
        }
    }
</script>