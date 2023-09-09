<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeCheckboxes from '@/Components/Checkboxes.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    lotteries: Array,
    purchase_dates: Array,
    purchase_windows: Array,
    request: Array
});

</script>

<template>
    <Head title="確認" />

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
                                <div class="z-50 bg-white font-semibold text-xl text-gray-800 leading-tight border-b border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 50px; width: 50px;">1</div>
                                <p class="pt-3">ご注文入力</p>
                            </div>
                            <div style="position:relative;">
                                <div class="border-t-4 border-gray-900 w-full" style="position:absolute; top:25%; left:0;"></div>
                            </div>
                            <div style="position:relative;">
                                <div class="z-0 border-t-4 border-gray-900 w-full" style="position:absolute; top:25%; left:0;"></div>
                                <div class="z-50 bg-black font-semibold text-xl text-gray-100 leading-tight border-b border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 50px; width: 50px;">2</div>
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

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-20 bg-white border border-black text-center" @change="resetValidationMessageForSheets">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            購入枚数
                        </h2>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-1">購入枚数</div>

                            <div class="col-span-7">

                                <div>

                                    <p class="pb-10" v-if="request['numSheets']['summerJumbo']['lotteryId']">{{ lotteries[request['numSheets']['summerJumbo']['lotteryId'] -1].name }}</p> <!-- NOTE: 2022年 サマージャンボ -->

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumbo']['renban']['denary']) || Number(this.request['numSheets']['summerJumbo']['renban']['centenary'])">
                                        <div>連番</div>
                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumbo']['renban']['centenary']) ? request['numSheets']['summerJumbo']['renban']['centenary'] : 0)
                                            + (!isNaN(request['numSheets']['summerJumbo']['renban']['denary']) ? request['numSheets']['summerJumbo']['renban']['denary'] : 0) }}枚
                                        </div>
                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumbo']['fukuren']['centenary'])">
                                        <div>福連100</div>
                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumbo']['fukuren']['centenary']) ? request['numSheets']['summerJumbo']['fukuren']['centenary'] : 0) }}枚
                                        </div>
                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumbo']['bara']['denary']) || Number(this.request['numSheets']['summerJumbo']['bara']['centenary'])">
                                        <div>バラ</div>
                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumbo']['bara']['denary']) ? request['numSheets']['summerJumbo']['bara']['denary'] : 0)
                                            + (!isNaN(request['numSheets']['summerJumbo']['bara']['centenary']) ? request['numSheets']['summerJumbo']['bara']['centenary'] : 0) }}枚
                                        </div>
                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumbo']['sanrenbara']['tricenary'])">
                                        <div>3連バラ</div>
                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumbo']['sanrenbara']['tricenary']) ? request['numSheets']['summerJumbo']['sanrenbara']['tricenary'] : 0) }}枚
                                        </div>
                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumbo']['fukubara']['centenary'])">
                                        <div>福バラ100</div>
                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumbo']['fukubara']['centenary']) ? request['numSheets']['summerJumbo']['fukubara']['centenary'] : 0) }}枚
                                        </div>
                                        <div></div>
                                    </div>

                                    <div class="border-t-2 border-gray-900 w-full"></div>

                                    <p class="py-10" v-if="request['numSheets']['summerJumboMini']['lotteryId']">{{ lotteries[request['numSheets']['summerJumboMini']['lotteryId'] -1].name }}枚</p> <!-- NOTE: 2022年 サマージャンボ ミニ -->

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumboMini']['renban']['denary']) || Number(this.request['numSheets']['summerJumboMini']['renban']['centenary'])">
                                        <div>連番</div>

                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumboMini']['renban']['denary']) ? request['numSheets']['summerJumboMini']['renban']['denary'] : 0)
                                            + (!isNaN(request['numSheets']['summerJumboMini']['renban']['centenary']) ? request['numSheets']['summerJumboMini']['renban']['centenary'] : 0) }}枚
                                        </div>

                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumboMini']['fukuren']['centenary'])">
                                        <div>福連100</div>

                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumboMini']['fukuren']['centenary']) ? request['numSheets']['summerJumboMini']['fukuren']['centenary'] : 0) }}枚
                                        </div>

                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumboMini']['bara']['denary']) || Number(this.request['numSheets']['summerJumboMini']['bara']['centenary'])">
                                        <div>バラ</div>

                                        <div>            
                                            {{ (!isNaN(request['numSheets']['summerJumboMini']['bara']['denary']) ? request['numSheets']['summerJumboMini']['bara']['denary'] : 0)
                                            + (!isNaN(request['numSheets']['summerJumboMini']['bara']['centenary']) ? request['numSheets']['summerJumboMini']['bara']['centenary'] : 0) }}枚
                                        </div>

                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumboMini']['sanrenbara']['tricenary'])">
                                        <div>3連バラ</div>

                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumboMini']['sanrenbara']['tricenary']) ? request['numSheets']['summerJumboMini']['sanrenbara']['tricenary'] : 0) }}枚
                                        </div>

                                        <div></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-10" v-if="Number(this.request['numSheets']['summerJumboMini']['fukubara']['centenary'])">
                                        <div>福バラ100</div>

                                        <div>
                                            {{ (!isNaN(request['numSheets']['summerJumboMini']['fukubara']['centenary']) ? request['numSheets']['summerJumboMini']['fukubara']['centenary'] : 0) }}枚
                                        </div>

                                        <div></div>
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
                                            <th v-if="this.request['point']" class="border border-black px-4 py-6">ポイント</th>
                                            <th class="border border-black px-4 py-6">お支払い金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border border-black px-4 py-6">{{ Number(this.request['total-price']).toLocaleString() }}円</td>
                                            <td class="border border-black px-4 py-6">{{ Number(this.request['carriage']).toLocaleString() }}円</td>
                                            <td class="border border-black px-4 py-6">{{ Number(this.request['commission']).toLocaleString() }}円</td>
                                            <td v-if="this.request['point']" class="border border-black px-4 py-6">-{{ Number(this.request['point']) }}円</td>
                                            <td class="border border-black px-4 py-6">{{ (Number(this.request['total-payment']) - Number(this.request['point'])).toLocaleString() }}円</td>
                                        </tr>
                                    </tbody>
                                </table>

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

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-1 py-2">購入日</div>

                            <div class="col-span-7">

                                <div v-for="item in purchase_dates">
                                    <p v-if="request['date-purchase']===item.purchase_date" class="py-2">{{ (item.purchase_date.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}（{{ item.remarks }}）</p>
                                    <p v-if="request['date-purchase']===item.purchase_date" class="py-2">お支払い期限(１５時まで)：{{ (item.payment_deadline.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}</p>
                                    <p v-if="request['date-purchase']===item.purchase_date" class="py-2">発送予定日：{{ (item.shipment_date.replace("-", "年").replace("-", "月")+"日").replace(/\b0+/, '').replace(/\b0+/, '') }}</p>
                                </div>

                            </div>

                            <div class="col-span-1 py-10">購入窓口</div>

                            <div class="col-span-4 py-10">
                                {{ purchase_windows[request['name-window'] -1].name }}
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

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10 flex justify-between"><p>お名前（漢字）</p></div>

                            <div class="col-span-4">
                                {{ request['name-kanji'] }}
                            </div>

                            <div class="col-span-2 pb-10"></div>

                            <div class="col-span-2 pb-10 flex justify-between"><p>お名前（カナ）</p></div>

                            <div class="col-span-4 pb-10">
                                {{ request['name-kana'] }}
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

                            <div class="col-span-2 pb-10 flex justify-between">備考</div>

                            <div class="col-span-4 pb-10">
                                {{ request['remarks'] }}
                            </div>

                            <div class="col-span-2 pb-10"></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 border-t-2 border-gray-900 w-full pb-12"></div>
                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-4 border-t-2 border-gray-900 w-full pb-12"></div>
                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 border-t-2 border-gray-900 w-full pb-12"></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10 font-bold">配送先</div>
                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-4 pb-10"></div>
                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10"></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10 flex justify-between"><p>お名前（漢字）</p><p class="mr-8">必須</p></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-4">
                                {{ request['name-kanji-delivery'] }}
                            </div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10"></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10 flex justify-between"><p>お名前（カナ）</p><p class="mr-8">必須</p></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-4 pb-10">
                                {{ request['name-kana-delivery'] }}
                            </div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10"></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10 flex justify-between"><p>住所</p><p class="mr-8">必須</p></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-4 pb-10">
                                <p>{{ request['post-delivery'] }}</p>
                                <p>{{ request['region-delivery'] }} {{ request['locality-delivery'] }} {{ request['street-delivery'] }}</p>
                            </div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10"></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10 flex justify-between"><p>電話番号</p><p class="mr-8">必須</p></div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-4 pb-10">
                                {{ request['phone-delivery'] }}
                            </div>

                            <div v-if="request['isSameAddress'] !== 'same'" class="col-span-2 pb-10"></div>

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
                                <button type="submit" @click="buy();" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">注文する</button>
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
            history: function() {
                const formElements = document.forms.order;
                this.$inertia.post('/form', {
                    order: this.$page.props.request,
                    _token: this.$page.props.csrf_token,
                })
            },
            buy: function() {

                console.log(this.request.numSheets.summerJumbo.renban.centenary);

                this.request['numSheets']['summerJumbo']['renban']['denary'] = (isNaN(this.request['numSheets']['summerJumbo']['renban']['denary']) ? 0 :this.request['numSheets']['summerJumbo']['renban']['denary'])
                this.request['numSheets']['summerJumbo']['renban']['centenary'] = (isNaN(this.request['numSheets']['summerJumbo']['renban']['centenary']) ? 0 :this.request['numSheets']['summerJumbo']['renban']['centenary'])
                this.request['numSheets']['summerJumbo']['fukuren']['centenary'] = (isNaN(this.request['numSheets']['summerJumbo']['fukuren']['centenary']) ? 0 :this.request['numSheets']['summerJumbo']['fukuren']['centenary'])
                this.request['numSheets']['summerJumbo']['bara']['denary'] = (isNaN(this.request['numSheets']['summerJumbo']['bara']['denary']) ? 0 :this.request['numSheets']['summerJumbo']['bara']['denary'])
                this.request['numSheets']['summerJumbo']['bara']['centenary'] = (isNaN(this.request['numSheets']['summerJumbo']['bara']['centenary']) ? 0 :this.request['numSheets']['summerJumbo']['bara']['centenary'])
                this.request['numSheets']['summerJumbo']['sanrenbara']['tricenary'] = (isNaN(this.request['numSheets']['summerJumbo']['sanrenbara']['tricenary']) ? 0 :this.request['numSheets']['summerJumbo']['sanrenbara']['tricenary'])
                this.request['numSheets']['summerJumbo']['fukubara']['centenary'] = (isNaN(this.request['numSheets']['summerJumbo']['fukubara']['centenary']) ? 0 :this.request['numSheets']['summerJumbo']['fukubara']['centenary'])

                this.request['numSheets']['summerJumboMini']['renban']['denary'] = (isNaN(this.request['numSheets']['summerJumboMini']['renban']['denary']) ? 0 : this.request['numSheets']['summerJumboMini']['renban']['denary']);
                this.request['numSheets']['summerJumboMini']['renban']['centenary']= (isNaN(this.request['numSheets']['summerJumboMini']['renban']['centenary'])  ? 0 : this.request['numSheets']['summerJumboMini']['renban']['centenary'])
                this.request['numSheets']['summerJumboMini']['fukuren']['centenary']=(isNaN(this.request['numSheets']['summerJumboMini']['fukuren']['centenary']) ? 0 : this.request['numSheets']['summerJumboMini']['fukuren']['centenary'])
                this.request['numSheets']['summerJumboMini']['bara']['denary']=(isNaN(this.request['numSheets']['summerJumboMini']['bara']['denary']) ? 0 : this.request['numSheets']['summerJumboMini']['bara']['denary'])
                this.request['numSheets']['summerJumboMini']['bara']['centenary']=(isNaN(this.request['numSheets']['summerJumboMini']['bara']['centenary']) ? 0 : this.request['numSheets']['summerJumboMini']['bara']['centenary'])
                this.request['numSheets']['summerJumboMini']['sanrenbara']['tricenary']=(isNaN(this.request['numSheets']['summerJumboMini']['sanrenbara']['tricenary']) ? 0 : this.request['numSheets']['summerJumboMini']['sanrenbara']['tricenary'])
                this.request['numSheets']['summerJumboMini']['fukubara']['centenary']=(isNaN(this.request['numSheets']['summerJumboMini']['fukubara']['centenary']) ? 0 : this.request['numSheets']['summerJumboMini']['fukubara']['centenary'])

                console.log(this.$page.props.request);
                const formElements = document.forms.order;
                this.$inertia.post('/buy', {
                    order: this.$page.props.request,
                    _token: this.$page.props.csrf_token,
                })
            },
            register: function() {
                // TODO: transaction
                console.log(this.$page.props.request);
                const formElements = document.forms.order;
                this.$inertia.post('/register', {
                    order: this.$page.props.request,
                    _token: this.$page.props.csrf_token,
                })
            }
        }
    }
</script>