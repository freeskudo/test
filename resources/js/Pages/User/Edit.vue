<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeCheckboxes from '@/Components/Checkboxes.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import YubinBangoCore from '@/Components/YubinBangoCore.vue';
import Modal from '@/Components/Modal.vue';

defineProps({
    user: Array,
    login_user_profile: Array,
    login_user_optin: Array
});

const form = useForm({
    "name-kanji": '',
    "name-kana": '',
    "post-domicile": '',
    "region-domicile": '',
    "locality-domicile": '',
    "street-domicile": '',
    phone: '',
    "canRegister": false,
    terms: false,
});

const submit = () => {
    form['post-domicile'] = document.getElementById("post-domicile").value;
    form['region-domicile'] = document.getElementById("region-domicile").value;
    form['locality-domicile'] = document.getElementById("locality-domicile").value;
    form['street-domicile'] = document.getElementById("street-domicile").value;
    form.post(route('user.save'), {});
};

const resetValidationMessage = (e) => {
    form.errors[e.target.id] = "";
}

</script>

<template>
    <Head title="会員情報変更" />

    <BreezeGuestLayout>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 bg-white border border-black text-center">

                        <div class="grid grid-cols-2">
                            <div>
                                <button id="btn-login" class="border border-black text-black bg-white font-medium text-sm w-5/6 px-5 py-2.5 text-center">会員情報</button>
                            </div>
                            <div>
                                <button id="btn-register" onclick="location.href='./register'" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">注文履歴</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <form id="edit" action="/edit-save">

            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="p-20 bg-white border border-black text-center">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-4 pb-10">
                                会員情報変更
                            </h2>

                            <div class="grid grid-cols-8 text-left">

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（漢字）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="name-kanji" name="name-kanji" v-model="form['name-kanji']" type="text" placeholder="例） 山田 太郎">
                                        <div v-show='form.errors["name-kanji"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kanji'] ? form.errors['name-kanji'] : "" ).replace('name-kanji', 'お名前（漢字）') }}</div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（カナ）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="name-kana" name="name-kana" v-model="form['name-kana']" type="text" placeholder="例） ヤマダ タロウ">
                                        <div v-show='form.errors["name-kana"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kana'] ? form.errors['name-kana'] : "" ).replace('name-kana', 'お名前（カナ）') }}</div>
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

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールマガジン登録</p></div>

                                <div class="col-span-4 pb-10">
                                    <div class="">
                                        <input type="checkbox" id="can-register" name="can-register" value=true v-model="form.canRegister">
                                        登録する
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                            </div>

                            <div class="pt-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden">
                                        <div class="p-6 bg-white text-center">

                                            <div class="grid grid-cols-2">
                                                <div>
                                                    <button type="button" @click="back" class="border border-black text-black bg-white font-medium text-sm w-5/6 px-5 py-2.5 text-center">戻る</button>
                                                </div>
                                                <div>
                                                    <button type="button" @click="submit" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">変更を保存する</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden">
                                        <div class="p-6 bg-white flex justify-center">
                                            <button type="button" @click="logout" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">ログアウト</button>
                                        </div>
                                    </div>
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
        data: function() {
            return {
                domicile: "domicile",
                addr_errors : {},
                modal: false,
                message: '',
                address: {},
            }
        },
        components: {
            YubinBangoCore
        },
        mounted : function(){
            console.log(this.$page.props.login_user_optin.optin);
            this.form['name-kanji'] = this.$page.props.user.name;
            this.form['name-kana'] = this.$page.props.login_user_profile.kana;

            document.getElementById("post-domicile").value = this.login_user_profile.post;
            document.getElementById("region-domicile").value = this.login_user_profile.region;
            document.getElementById("locality-domicile").value = this.login_user_profile.locality;
            document.getElementById("street-domicile").value = this.login_user_profile.street;

            this.form['phone'] = this.$page.props.login_user_profile.phone;
            this.form['canRegister'] = (this.$page.props.login_user_optin.optin ? true : false);

        },
        methods: {
            back: function() {
                this.$inertia.get('/dashboard');
            },
            logout: function() {
                this.$inertia.post('/logout');
            },
            setForm(address) {
                console.log(address);
                this.form["post-domicile"] = address["post"];
                this.form["region-domicile"] = address["region"];
                this.form["locality-domicile"] = address["locality"];
                this.form["street-domicile"] = address["street"];
            }
        }
    }
</script>