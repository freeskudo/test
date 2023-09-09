<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeCheckboxes from '@/Components/Checkboxes.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import YubinBangoCore from '@/Components/YubinBangoCore.vue';
import Modal from '@/Components/Modal.vue';

defineProps({
    user: Array,
    total_point: Number,
    login_user_profile: Array,
    lotteries: Array,
    purchase_dates: Array,
    purchase_windows: Array,
    history: Array
});

const form = useForm({
    point: "",
    nonZeroSheets: "",
    "date-purchase": '',
    "name-window": 1,
    "name-kanji": '',
    "name-kana": '',
    "post-domicile": '',
    "region-domicile": '',
    "locality-domicile": '',
    "street-domicile": '',
    "name-kanji-delivery": '',
    "name-kana-delivery": '',
    "post-delivery": '',
    "region-delivery": '',
    "locality-delivery": '',
    "street-delivery": '',
    phone: '',
    "phone-delivery": '',
    email: '',
    email_confirmation: '',
    'numSheets': {
        'summerJumbo' : {
            'lotteryId' : 1,
            'renban' : {
                'denary' : "連番10枚単位",
                'centenary' : "連番100枚単位"
            },
            'fukuren' : {
                'centenary' : "福連100枚単位"
            },
            'bara' : {
                'denary' : "バラ10枚単位",
                'centenary' : "バラ100枚単位"
            },
            'sanrenbara' : {
                'tricenary' : "3連バラ30枚単位"
            },
            'fukubara' : {
                'centenary' : "福バラ100枚単位"
            },
        },
        'summerJumboMini' : {
            'lotteryId' : 2,
            'renban' : {
                'denary' : "ミニ連番10枚単位",
                'centenary' : "ミニ連番100枚単位"
            },
            'fukuren' : {
                'centenary' : "福連100枚単位"
            },
            'bara' : {
                'denary' : "ミニバラ10枚単位",
                'centenary' : "ミニバラ100枚単位"
            },
            'sanrenbara' : {
                'tricenary' : "3連バラ30枚単位"
            },
            'fukubara' : {
                'centenary' : "福バラ100枚単位"
            },
        },
    },
    "total-price": '',
    "carriage": '',
    "commission": '',
    "total-payment": '',
    remarks: '',
    isSameAddress: 'same',
    terms: false,
});

const submit = () => {
    form.post(route('order.confirm'), {});
};

const resetValidationMessage = (e) => {
    form.errors[e.target.id] = "";
}

const resetValidationMessageForSheets = (e) => {
    console.log(form.errors['nonZeroSheets']);
    form.errors['nonZeroSheets'] = "";
    console.log(form.errors['nonZeroSheets']);
}

</script>

<template>
    <Head title="購入フォーム" />

    <BreezeGuestLayout>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 bg-white border border-black text-center h-64 flex items-center justify-center">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            販売中の宝くじバナー
                        </h2>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            ご注文
                        </h2>

                        <div class="grid grid-cols-7">
                            <div style="position:relative;">
                            </div>
                            <div style="position:relative;">
                                <div class="z-0 border-t-4 border-gray-900 w-1/2" style="position:absolute; top:25%; left:50%;"></div>
                                <div class="z-50 bg-black font-semibold text-xl text-gray-100 leading-tight border-b border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 50px; width: 50px;">1</div>
                                <p class="pt-3">ご注文入力</p>
                            </div>
                            <div style="position:relative;">
                                <div class="border-t-4 border-gray-900 w-full" style="position:absolute; top:25%; left:0;"></div>
                            </div>
                            <div style="position:relative;">
                                <div class="z-0 border-t-4 border-gray-900 w-full" style="position:absolute; top:25%; left:0;"></div>
                                <div class="z-50 bg-white font-semibold text-xl text-gray-800 leading-tight border-b border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 50px; width: 50px;">2</div>
                                <p class="pt-3">ご注文確認</p>
                            </div>
                            <div style="position:relative;">
                                <div class="border-t-4 border-gray-900 w-full" style="position:absolute; top:25%; left:0;"></div>
                            </div>
                            <div style="position:relative;">
                                <div class="z-0 border-t-4 border-gray-900 w-1/2" style="position:absolute; top:25%; left:0"></div>
                                <div class="z-50 bg-white font-semibold text-xl text-gray-800 leading-tight border-b border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 50px; width: 50px;">3</div>
                                <p class="pt-3">ご注文完了</p>
                            </div>
                            <div style="position:relative;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12" v-if="user === null">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 bg-white border border-black text-center">

                        <div class="grid grid-cols-2">
                            <div>
                                <label class="text-gray-700 text-sm font-bold mb-2" for="btn-login">
                                    会員のお客さま
                                </label>
                                <p class="pb-4"><small>ログインしてご注文にお進みください。</small></p>
                            </div>
                            <div>
                                <label class="text-gray-700 text-sm font-bold mb-2" for="btn-register">
                                    初めてのお客さま
                                </label>
                                <p class="pb-4 text-left"><small>会員登録いただくと、宝くじ代の0.5%分のポイントがお客様に付与されます。
                                獲得されたポイントは、次回以降のご購入時にご利用いただけます。</small></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div>
                                <button id="btn-login" onclick="location.href='./login'" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">ログイン</button>
                            </div>
                            <div>
                                <button id="btn-register" onclick="location.href='./register'" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">新規会員登録</button>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div>
                            </div>
                            <div>
                                <p class="pt-4 text-left"><small>会員登録せずにご注文される場合は下記にお進みください。</small></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <form name="order" @submit.prevent="submit" @change="resetValidationMessage">

            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="p-20 bg-white border border-black text-center" @change="resetValidationMessageForSheets">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                                購入枚数
                            </h2>

                            <input type="hidden" name="nonZeroSheets" v-model="form.nonZeroSheets">
                            <div v-show='form.errors.nonZeroSheets' class="p-1 m-1 text-sm text-red-400">{{ ( form.errors.nonZeroSheets ? "購入枚数を選択してください" : "" ) }}</div>

                            <p class="flex flex-wrap justify-between">
                                <div></div>
                                <div @click="openModal" class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                    <p class="pl-2">購入の種類</p>
                                </div>
                            </p>

                            <Modal @close="closeModal" v-if="modal"></Modal>

                            <div class="grid grid-cols-8 text-left">

                                <div class="col-span-1">購入枚数　必須</div>

                                <div class="col-span-7">

                                    <div @change="setNumSheets($event)">

                                        <p class="pb-10">{{ lotteries[0].name }}</p> <!-- NOTE: 2022年 サマージャンボ -->

                                        <input type="hidden" id="numSheets.summerJumbo.lotteryId" name="numSheets.summerJumbo.lotteryId" v-bind:value="lotteries[0].id">

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>連番</div>
                                            <div>
                                                <select id="numSheets.summerJumbo.renban.centenary" name="numSheets.summerJumbo.renban.centenary" v-model="form.numSheets.summerJumbo.renban.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>連番100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                            <div>
                                                <select id="numSheets.summerJumbo.renban.denary" name="numSheets.summerJumbo.renban.denary" v-model="form.numSheets.summerJumbo.renban.denary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>連番10枚単位</option>
                                                    <option v-for="item in listNum.denary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>福連100</div>
                                            <div>
                                                <select id="numSheets.summerJumbo.fukuren.centenary" name="numSheets.summerJumbo.fukuren.centenary" v-model="form.numSheets.summerJumbo.fukuren.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>福連100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                            <div></div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>バラ</div>
                                            <div>
                                                <select id="numSheets.summerJumbo.bara.centenary" name="numSheets.summerJumbo.bara.centenary" v-model="form.numSheets.summerJumbo.bara.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>バラ100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                            <div>
                                                <select id="numSheets.summerJumbo.bara.denary" name="numSheets.summerJumbo.bara.denary" v-model="form.numSheets.summerJumbo.bara.denary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>バラ10枚単位</option>
                                                    <option v-for="item in listNum.denary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>3連バラ</div>
                                            <div>
                                                <select id="numSheets.summerJumbo.sanrenbara.tricenary" name="numSheets.summerJumbo.sanrenbara.tricenary" v-model="form.numSheets.summerJumbo.sanrenbara.tricenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>3連バラ30枚単位</option>
                                                    <option v-for="item in listNum.tricenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>    
                                            </div>
                                            <div></div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>福バラ100</div>
                                            <div>
                                                <select id="numSheets.summerJumbo.fukubara.centenary" name="numSheets.summerJumbo.fukubara.centenary" v-model="form.numSheets.summerJumbo.fukubara.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>福バラ100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                            <div></div>
                                        </div>

                                        <div class="border-t-2 border-gray-900 w-full"></div>

                                        <p class="py-10">{{ lotteries[1].name }}</p> <!-- NOTE: 2022年 サマージャンボ ミニ -->
                                        <input type="hidden" id="numSheets.summerJumboMini.lotteryId" name="numSheets.summerJumboMini.lotteryId" v-bind:value="lotteries[1].id">

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>連番</div>

                                            <div>
                                                <select id="numSheets.summerJumboMini.renban.centenary" name="numSheets.summerJumboMini.renban.centenary" v-model="form.numSheets.summerJumboMini.renban.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>ミニ連番100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>

                                            <div>
                                                <select id="numSheets.summerJumboMini.renban.denary" name="numSheets.summerJumboMini.renban.denary" v-model="form.numSheets.summerJumboMini.renban.denary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>ミニ連番10枚単位</option>
                                                    <option v-for="item in listNum.denary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>福連100</div>

                                            <div>
                                                <select id="numSheets.summerJumboMini.fukuren.centenary" name="numSheets.summerJumboMini.fukuren.centenary" v-model="form.numSheets.summerJumboMini.fukuren.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>福連100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>

                                            <div></div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>バラ</div>

                                            <div>            
                                                <select id="numSheets.summerJumboMini.bara.centenary" name="numSheets.summerJumboMini.bara.centenary" v-model="form.numSheets.summerJumboMini.bara.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>ミニバラ100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>

                                            <div>
                                                <select id="numSheets.summerJumboMini.bara.denary" name="numSheets.summerJumboMini.bara.denary" v-model="form.numSheets.summerJumboMini.bara.denary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>ミニバラ10枚単位</option>
                                                    <option v-for="item in listNum.denary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>3連バラ</div>

                                            <div>
                                                <select id="numSheets.summerJumboMini.sanrenbara.tricenary" name="numSheets.summerJumboMini.sanrenbara.tricenary" v-model="form.numSheets.summerJumboMini.sanrenbara.tricenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>3連バラ30枚単位</option>
                                                    <option v-for="item in listNum.tricenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>

                                            <div></div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-10">
                                            <div>福バラ100</div>

                                            <div>
                                                <select id="numSheets.summerJumboMini.fukubara.centenary" name="numSheets.summerJumboMini.fukubara.centenary" v-model="form.numSheets.summerJumboMini.fukubara.centenary" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full mb-10 px-10">
                                                    <option selected>福バラ100枚単位</option>
                                                    <option v-for="item in listNum.centenary" v-bind:value="item">{{ item }}枚</option>
                                                </select>
                                            </div>

                                            <div></div>
                                        </div>

                                    </div>

                                </div>

                                <div v-if="$page.props.auth.user" class="col-span-1">ポイントの利用</div>

                                <div v-if="$page.props.auth.user" class="col-span-7 text-left">

                                        <div class="grid grid-cols-3 gap-10">

                                            <div class="col-span-2">

                                                    <p class="pb-4">利用可能ポイント：{{ $page.props.total_point }}pt（{{ $page.props.total_point }}円相当）</p>
                                                    <div class="flex justify-between">
                                                        <input name="point" v-model="form.point" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-5/6 px-10 mr-5" type="text" placeholder="">
                                                        <button type="button" @click="usePoint" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-1/6">適用</button>
                                                    </div>

                                            </div>

                                        </div>

                                </div>

                                <div class="col-span-1 flex items-center">お支払い金額</div>

                                <div class="col-span-7">

                                    <table id="amount-payment" name="amount-payment" class="table-auto w-full text-center border border-black my-10">
                                        <thead>
                                            <tr>
                                                <th class="border border-black px-4 py-6">宝くじ代</th>
                                                <th class="border border-black px-4 py-6">送料</th>
                                                <th class="border border-black px-4 py-6">手数料</th>
                                                <th v-if="$page.props.auth.user" class="border border-black px-4 py-6">ポイント</th>
                                                <th class="border border-black px-4 py-6">お支払い金額</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-black px-4 py-6">{{ Number(this.tablePrice.totalPrice).toLocaleString() }}円</td>
                                                <td class="border border-black px-4 py-6">{{ Number(this.tablePrice.carriage).toLocaleString() }}円</td>
                                                <td class="border border-black px-4 py-6">{{ Number(this.tablePrice.commission).toLocaleString() }}円</td>
                                                <td v-if="$page.props.auth.user" class="border border-black px-4 py-6">-{{ this.applyPoint }}円</td>
                                                <td class="border border-black px-4 py-6">{{ (Number(this.tablePrice.totalPayment) - Number(this.applyPoint)).toLocaleString() }}円</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input id="total-payment" name="total-price" type="hidden" v-model="form['total-price']">
                                    <input id="total-payment" name="carriage" type="hidden" v-model="form['carriage']">
                                    <input id="total-payment" name="commission" type="hidden" v-model="form['commission']">
                                    <input id="total-payment" name="total-payment" type="hidden" v-model="form['total-payment']">
                                    <div v-show='invalid_point_message' class="p-1 m-1 text-sm text-red-400 mb-10">{{ this.invalid_point_message }}</div>

                                </div>

                                <div class="col-span-1">お支払い方法</div>

                                <div  class="col-span-7">

                                    <div class="mb-10">
                                        <div id="method-payment" name="method-payment">銀行振込のみとなります</div>
                                        <small>※ 振込先情報は、ご注文完了後の画面・注文完了メールでお知らせいたします。</small>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="p-20 bg-white border border-black text-center">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                                購入日・購入窓口
                            </h2>

                            <div v-show='form.errors["date-purchase"]' class="p-1 m-1 text-sm text-red-400">{{ ( form.errors['date-purchase'] ? form.errors['date-purchase'] : "" ).replace('date-purchase', '購入日').replace('入力', '選択') }}</div>

                            <div class="grid grid-cols-8 text-left">

                                <div class="col-span-1 py-2">購入日　必須</div>

                                <div class="col-span-7">

                                    <table id="date-purchase" class="table-auto w-full">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-2">購入日</th>
                                                <th class="px-4 py-2">受付期限</th>
                                                <th class="px-4 py-2">お支払い期限（15時まで）</th>
                                                <th class="px-4 py-2">発送予定日</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in purchase_dates">
                                                <td class="px-4 py-2">
                                                    <div class="flex items-center">
                                                        <input id="date-purchase" type="radio" v-bind:value="item.purchase_date" name="date-purchase" v-model="form['date-purchase']" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                                        <label for="date-purchase" class="ml-2 text-sm font-medium">{{ (item.purchase_date.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}（{{ item.remarks }}）</label>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2">{{ (item.application_deadline.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}</td>
                                                <td class="px-4 py-2">{{ (item.payment_deadline.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}</td>
                                                <td class="px-4 py-2">{{ (item.shipment_date.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <small>※ 上記の日程以外のご購入は承ることができません</small>

                                </div>

                                <div class="col-span-1 py-10">購入窓口　必須</div>

                                <div class="col-span-4 py-10">
                                    <select id="name-window" name="name-window" v-model="form['name-window']" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10">
                                        <option v-for="item in purchase_windows" :key="item.id" v-bind:value="item.id">{{ item.name }}</option>
                                    </select>
                                    <!--<div v-show='form.errors["name-window"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-window'] ? form.errors['name-window'] : "" ).replace('name-window', '購入窓口') }}</div>-->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="p-20 bg-white border border-black text-center">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-4 pb-10">
                                お客さま情報
                            </h2>

                            <div class="grid grid-cols-8 text-left" @change="fixAddr">

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（漢字）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4">
                                    <div v-if="user === null" class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="name-kanji" name="name-kanji" v-model="form['name-kanji']" type="text" placeholder="例） 山田 太郎">
                                        <div v-show='form.errors["name-kanji"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kanji'] ? form.errors['name-kanji'] : "" ).replace('name-kanji', 'お名前（漢字）') }}</div>
                                    </div>
                                    <div v-else class="">
                                        <p>{{ $page.props.auth.user.name }}</p>
                                        <input id="name-kanji" name="name-kanji" type="hidden" v-model="form['name-kanji']">
                                        <div v-show='form.errors["name-kanji"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kanji'] ? form.errors['name-kanji'] : "" ).replace('name-kanji', 'お名前（漢字）') }}</div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>お名前（カナ）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div v-if="user === null" class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="name-kana" name="name-kana" v-model="form['name-kana']" type="text" placeholder="例） ヤマダ タロウ">
                                        <div v-show='form.errors["name-kana"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kana'] ? form.errors['name-kana'] : "" ).replace('name-kana', 'お名前（カナ）') }}</div>
                                    </div>
                                    <div v-else class="">
                                        <p>{{ $page.props.login_user_profile.kana }}</p>
                                        <input id="name-kana" name="name-kana" type="hidden" v-model="form['name-kana']">
                                        <div v-show='form.errors["name-kana"]' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kana'] ? form.errors['name-kana'] : "" ).replace('name-kana', 'お名前（カナ）') }}</div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <YubinBangoCore
                                    v-if="user === null"
                                    v-bind:id="domicile"
                                    v-bind:errors="form.errors"
                                    @setAddress="setForm">
                                </YubinBangoCore>

                                <div v-if="user !== null" class="col-span-2 pb-10 flex justify-between"><p>郵便番号</p><p class="mr-8">必須</p></div>

                                <div v-if="user !== null" class="col-span-4 pb-10">

                                    <div class="text-left">

                                        <p>
                                            <font class="">{{ $page.props.login_user_profile.post }}</font>
                                        </p>

                                        <p>
                                            <font class="">{{ $page.props.login_user_profile.region }}</font>
                                            <font class="">{{ $page.props.login_user_profile.locality }}</font>
                                            <font class="">{{ $page.props.login_user_profile.street }}</font>
                                        </p>

                                        <input type="hidden" v-bind:id="'post-domicile'" v-bind:value="$page.props.login_user_profile.post">
                                        <input type="hidden" v-bind:id="'region-domicile'" v-bind:value="$page.props.login_user_profile.region">
                                        <input type="hidden" v-bind:id="'locality-domicile'" v-bind:value="$page.props.login_user_profile.locality">
                                        <input type="hidden" v-bind:id="'street-domicile'" v-bind:value="$page.props.login_user_profile.street">

                                    </div>

                                </div>

                                <div v-if="user !== null" class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>電話番号</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div v-if="user === null" class="mb-4">
                                        <input id="phone" name="phone" v-model="form.phone" type="text" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" placeholder="例） 0300000000">
                                        <div v-show='form.errors.phone' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['phone'] ? form.errors['phone'] : "" ).replace('phone', '電話番号') }}</div>
                                    </div>
                                    <div v-else class="mb-4">
                                        <p>{{ $page.props.login_user_profile.phone }}</p>
                                        <input id="phone" name="phone" v-model="form.phone" type="hidden" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" placeholder="例） 0300000000">
                                        <div v-show='form.errors.phone' class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['phone'] ? form.errors['phone'] : "" ).replace('phone', '電話番号') }}</div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールアドレス</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div v-if="user === null" class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="email" name="email" v-model="form.email" type="text" placeholder="例） saitomei@saitomei.com">
                                        <small>※ 指定受信設定をされている場合は、ドメイン@xxxxx.co.jpを受信可能に設定してください。</small>
                                        <div v-show='form.errors.email' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['email'] ? (form.errors['email'].indexOf('上記と同じ') !== -1 ? "" : form.errors['email']) : "" ).replace('email', 'メールアドレス') }}
                                        </div>
                                    </div>
                                    <div v-else class="">
                                        <p>{{ $page.props.auth.user.email }}</p>
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="email" name="email" v-model="form.email" type="hidden" placeholder="例） saitomei@saitomei.com">
                                        <div v-show='form.errors.email' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['email'] ? (form.errors['email'].indexOf('上記と同じ') !== -1 ? "" : form.errors['email']) : "" ).replace('email', 'メールアドレス') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between"><p>メールアドレス（確認用）</p><p class="mr-8">必須</p></div>

                                <div class="col-span-4 pb-10">
                                    <div v-if="user === null" class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="email_confirmation" name="email_confirmation" v-model="form.email_confirmation" type="text" placeholder="例） saitomei@saitomei.com">
                                        <div v-show='form.errors.email' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['email'] ? (form.errors['email'].indexOf('上記と同じ') !== -1 ? form.errors['email'] : "") : "" ).replace('email', 'メールアドレス') }}
                                        </div>
                                    </div>
                                    <div v-else class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="email_confirmation" name="email_confirmation" v-model="form.email_confirmation" type="text" placeholder="例） saitomei@saitomei.com">
                                        <div v-show='form.errors.email' class="p-1 m-1 text-sm text-red-400 mb-10">
                                            {{ ( form.errors['email'] ? (form.errors['email'].indexOf('上記と同じ') !== -1 ? form.errors['email'] : "") : "" ).replace('email', 'メールアドレス') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between">備考</div>

                                <div class="col-span-4 pb-10">
                                    <div class="mb-10">
                                        <textarea id="remarks" name="remarks" v-model="form.remarks" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" rows="3" placeholder="何かございましたらこちらにご記入ください"></textarea>
                                        <small>※ 書留での郵送のため配送日、配送時間帯のご指定はできません。</small>
                                    </div>
                                </div>

                                <div class="col-span-2 pb-10"></div>

                                <div class="col-span-2 pb-10 flex justify-between">配送先</div>

                                <div class="col-span-4 pb-10" @change="hoge()">
                                    <div class="flex items-center">
                                        <input checked id="shipping-address" type="radio" value="same" name="isSameAddress" v-model="form.isSameAddress" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium mr-6">上記の住所に配送</label>
                                        <input id="shipping-address" type="radio" value="other" name="isSameAddress" v-model="form.isSameAddress" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium">別の住所に配送</label>
                                    </div>
                                </div>

                                <div class="col-span-2 py-2"></div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 border-t-2 border-gray-900 w-full pb-12"></div>
                                <div v-if="form.isSameAddress !== 'same'" class="col-span-4 border-t-2 border-gray-900 w-full pb-12"></div>
                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 border-t-2 border-gray-900 w-full pb-12"></div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10 font-bold">配送先住所</div>
                                <div v-if="form.isSameAddress !== 'same'" class="col-span-4 pb-10"></div>
                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10"></div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10 flex justify-between"><p>お名前（漢字）</p><p class="mr-8">必須</p></div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-4">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="name-kanji-delivery" name="name-kanji-delivery" v-model="form['name-kanji-delivery']" type="text" placeholder="例） 山田 太郎">
                                        <div v-show="form.errors['name-kanji-delivery']" class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kanji-delivery'] ? form.errors['name-kanji-delivery'] : "" ).replace('name-kanji-delivery', 'お名前（漢字）') }}</div>
                                    </div>
                                </div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10"></div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10 flex justify-between"><p>お名前（カナ）</p><p class="mr-8">必須</p></div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-4 pb-10">
                                    <div class="">
                                        <input class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" id="name-kana-delivery" name="name-kana-delivery" v-model="form['name-kana-delivery']" type="text" placeholder="例） ヤマダ タロウ">
                                        <div v-show="form.errors['name-kana-delivery']" class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['name-kana-delivery'] ? form.errors['name-kana-delivery'] : "" ).replace('name-kana-delivery', 'お名前（カナ）') }}</div>
                                    </div>
                                </div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10"></div>

                                <YubinBangoCore
                                    v-if="form.isSameAddress !== 'same'"
                                    v-bind:id="delivery"
                                    v-bind:errors="form.errors"
                                    @setAddress="setForm2">
                                </YubinBangoCore>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10 flex justify-between"><p>電話番号</p><p class="mr-8">必須</p></div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-4 pb-10">
                                    <div class="mb-4">
                                        <input id="phone-delivery" name="phone-delivery" v-model="form['phone-delivery']" type="text" class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10" placeholder="例） 0300000000">
                                        <div v-show="form.errors['phone-delivery']" class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( form.errors['phone-delivery'] ? form.errors['phone-delivery'] : "" ).replace('phone-delivery', '電話番号') }}</div>
                                    </div>
                                </div>

                                <div v-if="form.isSameAddress !== 'same'" class="col-span-2 pb-10"></div>

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
        data: function() {
            return {
                invalid_point_message: null,
                applyPoint: 0,
                domicile: "domicile",
                delivery: "delivery",
                addr_errors : {},
                modal: false,
                message: '',
                address: {},
                address2: {
                    "post": (JSON.stringify(this.history) !== "[]" ? this.history.order["post-delivery"] : ""),
                    "region": (JSON.stringify(this.history) !== "[]" ? this.history.order["region-delivery"] : ""),
                    "locality": (JSON.stringify(this.history) !== "[]" ? this.history.order["locality-delivery"] : ""),
                    "street": (JSON.stringify(this.history) !== "[]" ? this.history.order["street-delivery"] : "")
                },
                isSameAddress: 'same',
                listNum: {
                    'denary' : Array.from({length: 10}, (_, i) => (i+1)*10),
                    'tricenary' : Array.from({length: 10}, (_, i) => (i+1)*30),
                    'centenary' : Array.from({length: 10}, (_, i) => (i+1)*100),
                },
                totalNumSheets: {
                    'summerJumbo' : 0,
                    'summerJumboMini' : 0
                },
                tablePrice : {
                    totalPrice: 0,
                    carriage: 0, // NOTE: 送料
                    commission: 0, // NOTE: 手数料
                    totalPayment: 0,
                },
                listCommissionRate : {
                    10 : 52,
                    20 : 38,
                    30 : 31,
                    40 : 25,
                    50 : 23,
                    60 : 21,
                    70 : 19,
                    80 : 18,
                    90 : 16,
                    100 : 13,
                    200 : 10
                }
            }
        },
        components: {
            YubinBangoCore,
            Modal
        },
        mounted : function(){
            // console.log(JSON.stringify(this.lotteries));
            console.log("history: "+JSON.stringify(this.history)+" : "+(typeof this.history));
            console.log('this.form: '+this.form);

            if (JSON.stringify(this.history) !== "[]") {

                let index_isSameAddress = 0;
                if (this.history.order.isSameAddress == "same") {
                    index_isSameAddress = 0;
                } else {
                    index_isSameAddress = 1;
                }
                document.getElementsByName("isSameAddress")[index_isSameAddress].checked = true;
                this.form.isSameAddress = this.history.order.isSameAddress;

                this.form.point = this.history.order.point;
                this.form.nonZeroSheets = this.history.order.nonZeroSheets;

                let index = 0;
                if (this.history.order["data-purchase"] == "2022-07-05") {
                    index = 0;
                }
                if (this.history.order["data-purchase"] == "2022-07-10") {
                    index = 1;
                }
                if (this.history.order["data-purchase"] == "2022-07-16") {
                    index = 2;
                }
                document.getElementsByName("date-purchase")[index].checked = true;
                this.form["date-purchase"] = this.history.order["date-purchase"];

                this.form["name-window"] = this.history.order["name-window"];
                this.form["name-kanji"] = this.history.order["name-kanji"];
                this.form["name-kana"] = this.history.order["name-kana"];

                document.getElementById("post-domicile").value = this.history.order["post-domicile"];
                document.getElementById("region-domicile").value = this.history.order["region-domicile"];
                document.getElementById("locality-domicile").value = this.history.order["locality-domicile"];
                document.getElementById("street-domicile").value = this.history.order["street-domicile"];

                this.form["post-domicile"] = document.getElementById("post-domicile").value;
                this.form["region-domicile"] = document.getElementById("region-domicile").value;
                this.form["locality-domicile"] = document.getElementById("locality-domicile").value;
                this.form["street-domicile"] = document.getElementById("street-domicile").value;

                this.form.phone = this.history.order.phone;
                this.form.email = this.history.order.email;

                if (this.form.isSameAddress !== "same") {
                    this.form["name-kanji-delivery"] = this.history.order["name-kanji-delivery"];
                    this.form["name-kana-delivery"] = this.history.order["name-kana-delivery"];
                    this.$nextTick(function() {
                        // nextTickを使用してコンソールにログを出力します。
                        console.log(this.$el.textContent);
                        document.getElementById("post-delivery").value = this.history.order["post-delivery"];
                        document.getElementById("region-delivery").value = this.history.order["region-delivery"];
                        document.getElementById("locality-delivery").value = this.history.order["locality-delivery"];
                        document.getElementById("street-delivery").value = this.history.order["street-delivery"];

                        this.form["post-delivery"] = document.getElementById("post-delivery").value;
                        this.form["region-delivery"] = document.getElementById("region-delivery").value;
                        this.form["locality-delivery"] = document.getElementById("locality-delivery").value;
                        this.form["street-delivery"] = document.getElementById("street-delivery").value;
                    });

                    this.form["phone-delivery"] = this.history.order["phone-delivery"];
                }

                this.form.numSheets.summerJumbo.renban.centenary = this.history.order.numSheets.summerJumbo.renban.centenary;
                this.form.numSheets.summerJumbo.renban.denary = this.history.order.numSheets.summerJumbo.renban.denary;
                this.form.numSheets.summerJumbo.fukuren.centenary = this.history.order.numSheets.summerJumbo.fukuren.centenary;
                this.form.numSheets.summerJumbo.bara.centenary = this.history.order.numSheets.summerJumbo.bara.centenary;
                this.form.numSheets.summerJumbo.bara.denary = this.history.order.numSheets.summerJumbo.bara.denary;
                this.form.numSheets.summerJumbo.sanrenbara.tricenary = this.history.order.numSheets.summerJumbo.sanrenbara.tricenary;
                this.form.numSheets.summerJumbo.fukubara.centenary = this.history.order.numSheets.summerJumbo.fukubara.centenary;

                this.form.numSheets.summerJumboMini.renban.centenary = this.history.order.numSheets.summerJumboMini.renban.centenary;
                this.form.numSheets.summerJumboMini.renban.denary = this.history.order.numSheets.summerJumboMini.renban.denary;
                this.form.numSheets.summerJumboMini.fukuren.centenary = this.history.order.numSheets.summerJumboMini.fukuren.centenary;
                this.form.numSheets.summerJumboMini.bara.centenary = this.history.order.numSheets.summerJumboMini.bara.centenary;
                this.form.numSheets.summerJumboMini.bara.denary = this.history.order.numSheets.summerJumboMini.bara.denary;
                this.form.numSheets.summerJumboMini.sanrenbara.tricenary = this.history.order.numSheets.summerJumboMini.sanrenbara.tricenary;
                this.form.numSheets.summerJumboMini.fukubara.centenary = this.history.order.numSheets.summerJumboMini.fukubara.centenary;

                this.form["total-price"] = this.history.order["total-price"];
                this.form["carriage"] = this.history.order["carriage"];
                this.form["commission"] = this.history.order["commission"];
                this.form["total-payment"] = this.history.order["total-payment"];
                this.form.remarks = this.history.order.remarks;

                this.setNumSheets();

            }

            if (this.user) {
                this.form['name-kanji'] = (this.user.name ? this.user.name : "");
                this.form['name-kana'] = (this.login_user_profile.kana ? this.login_user_profile.kana : "");
                this.form['post-domicile'] = (this.login_user_profile.post ? this.login_user_profile.post : "");
                this.form['region-domicile'] = (this.login_user_profile.region ? this.login_user_profile.region : "");
                this.form['locality-domicile'] = (this.login_user_profile.locality ? this.login_user_profile.locality : "");
                this.form['street-domicile'] = (this.login_user_profile.street ? this.login_user_profile.street : "");
                this.form['email'] = (this.user.email ? this.user.email : "");
                this.form['phone'] = (this.login_user_profile.phone ? this.login_user_profile.phone : "");
            }

        },
        methods: {
            fixAddr(){
                if (this.form['street-domicile']) {
                    this.form['street-domicile']=document.getElementById('street-domicile').value;
                }
                if (this.form['street-delivery']) {
                    this.form['street-delivery']=document.getElementById('street-delivery').value;
                }
            },
            usePoint(){
                if (this.form.point > this.total_point) {
                    this.invalid_point_message = "所持しているポイント以下の値を設定して下さい";
                } else {
                    this.applyPoint = this.form.point;
                    this.invalid_point_message = null;
                }
                if ( Number(this.tablePrice.totalPayment) - Number(this.applyPoint) < 0 ) {
                    this.form.point = 0;
                    this.applyPoint = 0;
                    this.invalid_point_message = "使用ポイントが支払金額を超えています";
                }
            },
            openModal() {
                this.modal = true;
            },
            closeModal() {
                this.modal = false;
            },
            setForm(address) {
                console.log(address);
                this.form["post-domicile"] = address["post"];
                this.form["region-domicile"] = address["region"];
                this.form["locality-domicile"] = address["locality"];
                this.form["street-domicile"] = address["street"];
            },
            setForm2(address) {
                console.log(address);
                this.form["post-delivery"] = address["post"];
                this.form["region-delivery"] = address["region"];
                this.form["locality-delivery"] = address["locality"];
                this.form["street-delivery"] = address["street"];
            },
            setNumSheets : function (event) {
                console.log('this.form: '+this.form);
                this.totalNumSheets.summerJumbo = 
                    Number( Number.isInteger(this.form.numSheets.summerJumbo.renban.centenary) ? this.form.numSheets.summerJumbo.renban.centenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumbo.renban.denary) ? this.form.numSheets.summerJumbo.renban.denary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumbo.fukuren.centenary) ? this.form.numSheets.summerJumbo.fukuren.centenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumbo.bara.centenary) ? this.form.numSheets.summerJumbo.bara.centenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumbo.bara.denary) ? this.form.numSheets.summerJumbo.bara.denary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumbo.sanrenbara.tricenary) ? this.form.numSheets.summerJumbo.sanrenbara.tricenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumbo.fukubara.centenary) ? this.form.numSheets.summerJumbo.fukubara.centenary : 0);
                this.totalNumSheets.summerJumboMini = 
                    Number( Number.isInteger(this.form.numSheets.summerJumboMini.renban.centenary) ? this.form.numSheets.summerJumboMini.renban.centenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumboMini.renban.denary) ? this.form.numSheets.summerJumboMini.renban.denary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumboMini.fukuren.centenary) ? this.form.numSheets.summerJumboMini.fukuren.centenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumboMini.bara.centenary) ? this.form.numSheets.summerJumboMini.bara.centenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumboMini.bara.denary) ? this.form.numSheets.summerJumboMini.bara.denary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumboMini.sanrenbara.tricenary) ? this.form.numSheets.summerJumboMini.sanrenbara.tricenary : 0)
                    + Number( Number.isInteger(this.form.numSheets.summerJumboMini.fukubara.centenary) ? this.form.numSheets.summerJumboMini.fukubara.centenary : 0);
                console.log(
                    'this.totalNumSheets.summerJumbo: '+this.totalNumSheets.summerJumbo,
                    'this.totalNumSheets.summerJumboMini: '+this.totalNumSheets.summerJumboMini);
                this.form.nonZeroSheets = ( this.totalNumSheets.summerJumbo + this.totalNumSheets.summerJumboMini ? true : false);
                this.setTotalPayment();
            },
            setTotalPayment : function () {
                let total = this.totalNumSheets.summerJumbo + this.totalNumSheets.summerJumboMini;
                const priceJumbo = this.lotteries[ this.form.numSheets.summerJumbo.lotteryId -1].price * this.totalNumSheets.summerJumbo;
                const priceJumboMini = this.lotteries[ this.form.numSheets.summerJumboMini.lotteryId -1].price * this.totalNumSheets.summerJumboMini;

                this.tablePrice.totalPrice =
                    this.lotteries[ this.form.numSheets.summerJumbo.lotteryId -1].price * this.totalNumSheets.summerJumbo
                    + this.lotteries[ this.form.numSheets.summerJumboMini.lotteryId -1].price * this.totalNumSheets.summerJumboMini;

/*
                for (let key in this.listCommissionRate) {
                    if ( Number(total) === Number(key) ) {
                        this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * this.listCommissionRate[key];
                    }
                }
*/

                console.log(total);

                if ( Number(total) >= 1 &&  Number(total) < 10 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 52;
                }

                if ( Number(total) >= 10 &&  Number(total) < 20 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 52;
                }

                if ( Number(total) >= 20 &&  Number(total) < 30 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 38;
                }

                if ( Number(total) >= 30 &&  Number(total) < 40 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 31;
                }

                if ( Number(total) >= 40 &&  Number(total) < 50 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 25;
                }

                if ( Number(total) >= 50 &&  Number(total) < 60 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 23;
                }

                if ( Number(total) >= 60 &&  Number(total) < 70 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 21;
                }

                if ( Number(total) >= 70 &&  Number(total) < 80 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 19;
                }

                if ( Number(total) >= 80 &&  Number(total) < 90 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 18;
                }

                if ( Number(total) >= 90 &&  Number(total) < 100 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 16;
                }

                if ( Number(total) >= 100 &&  Number(total) < 200 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 13;
                }

                if ( Number(total) >= 200 ) {
                    this.tablePrice.commission = this.tablePrice.totalPrice * 0.01 * 10;
                }

                this.tablePrice.totalPayment = (this.tablePrice.totalPrice ? this.tablePrice.totalPrice + this.tablePrice.carriage + this.tablePrice.commission : 0);
                this.form['total-price'] = Number(this.tablePrice.totalPrice);
                this.form['carriage'] = Number(this.tablePrice.carriage);

                this.form['commission'] = Number(this.tablePrice.commission);
                this.form['total-payment'] = Number(this.tablePrice.totalPayment);
            },
        }
    }
</script>