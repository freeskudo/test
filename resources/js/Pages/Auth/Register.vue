<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import YubinBangoCore from '@/Components/YubinBangoCore.vue';

defineProps({
    history: Array
});

const form = useForm({
    name: '',
    kana: '',
    "post-domicile": '',
    "region-domicile": '',
    "locality-domicile": '',
    "street-domicile": '',
    phone: '',
    email: '',
    email_confirmation: '',
    password: '',
    password_confirmation: '',
    canRegister: true,
    terms: false,
});

const submit = () => {
    form.post(route('confirm'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="新規会員登録" />

    <BreezeGuestLayout>

        <form name="register" @submit.prevent="submit">

            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="p-20 bg-white border border-black text-center">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-4 pb-10">
                                新規会員登録
                            </h2>

                            <div class="grid grid-cols-8 text-left" @change="fixAddr">

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（漢字）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="name" name="name" v-model="form['name']" type="text" placeholder="例） 山田 太郎">
                                        <div v-show='form.errors["name"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name'] ? form.errors['name'] : "" ).replace('name', 'お名前（漢字）') }}</div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（カナ）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="kana" name="kana" v-model="form['kana']" type="text" placeholder="例） ヤマダ タロウ">
                                        <div v-show='form.errors["kana"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['kana'] ? form.errors['kana'] : "" ).replace('kana', 'お名前（カナ）') }}</div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <YubinBangoCore
                                    v-bind:id="domicile"
                                    v-bind:errors="form.errors"
                                    @setAddress="setForm">
                                </YubinBangoCore>

                                <div class="col-span-2 pb-10 flex justify-between"><p>電話番号</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="mb-4">
                                        <input id="phone" name="phone" v-model="form.phone" type="text" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" placeholder="例） 0300000000">
                                        <div v-show='form.errors.phone' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['phone'] ? form.errors['phone'] : "" ).replace('phone', '電話番号') }}</div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールアドレス</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="email" name="email" v-model="form.email" type="text" placeholder="例） saitomei@saitomei.com">
                                        <small>※ 指定受信設定をされている場合は、ドメイン@xxxxx.co.jpを受信可能に設定してください。</small>
                                        <div v-show='form.errors.email' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['email'] ? (form.errors['email'].indexOf('上記と同じ') !== -1 ? "" : form.errors['email']) : "" ).replace('email', 'メールアドレス') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールアドレス（確認用）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="email_confirmation" name="email_confirmation" v-model="form.email_confirmation" type="text" placeholder="例） saitomei@saitomei.com">
                                        <div v-show='form.errors.email' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['email'] ? (form.errors['email'].indexOf('上記と同じ') !== -1 ? form.errors['email'] : "") : "" ).replace('email', 'メールアドレス') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>パスワード</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="password" name="password" v-model="form.password" type="password" autocomplete="new-password">
                                        <small>半角英数字8~20文字</small>
                                        <div v-show='form.errors.password' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['password'] ? (form.errors['password'].indexOf('上記と同じ') !== -1 ? "" : form.errors['password']) : "" ).replace('password', 'パスワード') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>パスワード（確認用）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="password_confirmation" name="password_confirmation" v-model="form.password_confirmation" type="password" autocomplete="new-password">
                                        <div v-show='form.errors.password' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['password'] ? (form.errors['password'].indexOf('上記と同じ') !== -1 ? "" : form.errors['password']) : "" ).replace('password', 'パスワード') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールマガジン登録</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input type="checkbox" id="can-register" name="can-register" value=true v-model="form.canRegister" checked>
                                        登録する
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"></div>

                                <div class="col-span-4 pb-10 text-center">
                                    <p>
                                        <a :href="route('terms.of.service')" target="_blank" rel="noopener noreferrer" class="underline cursor-pointer">
                                            利用規約
                                        </a>
                                        と
                                        <a :href="route('privacy.policy')" target="_blank" rel="noopener noreferrer" class="underline cursor-pointer">
                                            プライバシーポリシー
                                        </a>
                                        への同意が必要です。
                                    </p>
                                    <button type="button" @click="submit" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">同意して確認画面へ</button>
                                </div>

                                <div class="col-span-2 pb-10"></div>

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
    data() {
        return {
            address: {},
            domicile: "domicile"
        };
    },
    components: {
        YubinBangoCore
    },
    mounted: function () {
        console.log("history: "+JSON.stringify(this.history)+" : "+(typeof this.history));
        console.log('this.form: '+this.form);

        if (JSON.stringify(this.history) !== "[]") {

            this.form["name"] = this.history.user["name"];
            this.form["kana"] = this.history.user["kana"];

            document.getElementById("post-domicile").value = this.history.user["post-domicile"];
            document.getElementById("region-domicile").value = this.history.user["region-domicile"];
            document.getElementById("locality-domicile").value = this.history.user["locality-domicile"];
            document.getElementById("street-domicile").value = this.history.user["street-domicile"];

            this.form["post-domicile"] = document.getElementById("post-domicile").value;
            this.form["region-domicile"] = document.getElementById("region-domicile").value;
            this.form["locality-domicile"] = document.getElementById("locality-domicile").value;
            this.form["street-domicile"] = document.getElementById("street-domicile").value;

            this.form.phone = this.history.user.phone;
            this.form.email = this.history.user.email;

        }
    },
    methods: {
        fixAddr(){
            if (this.form['street-domicile']) {
                this.form['street-domicile']=document.getElementById('street-domicile').value;
            }
        },
        setForm(address) {
            console.log("setForm");
            console.log(address);
            this.form["post-domicile"] = address["post"];
            this.form["region-domicile"] = address["region"];
            this.form["locality-domicile"] = address["locality"];
            this.form["street-domicile"] = address["street"];
        }
    }
}

</script>