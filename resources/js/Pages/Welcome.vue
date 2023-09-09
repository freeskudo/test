<script setup>

import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>

    <Head title="トップ" />

    <BreezeGuestLayout>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="p-6 text-center">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            コピー
                        </h2>

                        <div class="grid grid-cols-7 py-10">
                            <div style="position:relative;">
                            </div>
                            <div style="position:relative;">
                                <div class="z-50 bg-white font-semibold text-sm text-gray-800 leading-tight border border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 10vw; width: 10vw;">サービスの特徴</div>
                            </div>
                            <div style="position:relative;">
                            </div>
                            <div style="position:relative;">
                                <div class="z-50 bg-white font-semibold text-sm text-gray-800 leading-tight border border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 10vw; width: 10vw;">サービスの特徴</div>
                            </div>
                            <div style="position:relative;">
                            </div>
                            <div style="position:relative;">
                                <div class="z-50 bg-white font-semibold text-sm text-gray-800 leading-tight border border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 10vw; width: 10vw;">サービスの特徴</div>
                            </div>
                            <div style="position:relative;">
                            </div>
                        </div>

                        <div class="flex justify-end py-10">
                            <a href="#" class="w-50 h-30 border border-black p-4">
                                受付中の宝くじのバナー
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            コンセプト（概要）
                        </h2>

                        <p class="py-10">
                            テキストテキストテキストテキスト
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 id="feature" class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            [サービス名]の特徴
                        </h2>

                        <div class="grid grid-cols-3 py-10">
                            <p>①西銀座チャンスセンターで購入</p>
                            <p>②購入日指定可能</p>
                            <p>③送料無料</p>
                        </div>

                        <div class="grid grid-cols-2 py-10">
                            <p>④ポイントが使える</p>
                            <p>⑤メルマガをお届け</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10 flex justify-between"></div>

                            <div class="col-span-4 py-10 text-center">
                                <button type="submit" @click="jumpToOrder" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">ご注文はこちらから</button>
                            </div>

                            <div class="col-span-2 pb-10"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 id="howToApply" class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            申し込み方法
                        </h2>

                        <div class="grid grid-cols-4 p-10 text-left border border-black">
                            <div class="col-span-1">
                                <h3 class="pb-10">Step 1</h3>
                                <p class="pb-10">ネットからご注文</p>
                            </div>
                            <div class="col-span-1">
                                <div class="z-50 bg-white font-semibold text-sm text-gray-800 leading-tight border border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 10vw; width: 10vw;">アイコン</div>
                            </div>
                            <div class="col-span-2">テキストテキストテキストテキスト</div>
                        </div>

                        <div class="flex justify-center p-10">↓</div>

                        <div class="grid grid-cols-4 p-10 text-left border border-black">
                            <div class="col-span-1">
                                <h3 class="pb-10">Step 2</h3>
                                <p class="pb-10">お支払い</p>
                            </div>
                            <div class="col-span-1">
                                <div class="z-50 bg-white font-semibold text-sm text-gray-800 leading-tight border border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 10vw; width: 10vw;">アイコン</div>
                            </div>
                            <div class="col-span-2">テキストテキストテキストテキスト</div>
                        </div>

                        <div class="flex justify-center p-10">↓</div>

                        <div class="grid grid-cols-4 p-10 text-left border border-black">
                            <div class="col-span-1">
                                <h3 class="pb-10">Step 3</h3>
                                <p class="pb-10">購入</p>
                            </div>
                            <div class="col-span-1">
                                <div class="z-50 bg-white font-semibold text-sm text-gray-800 leading-tight border border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 10vw; width: 10vw;">アイコン</div>
                            </div>
                            <div class="col-span-2">テキストテキストテキストテキスト</div>
                        </div>

                        <div class="flex justify-center p-10">↓</div>

                        <div class="grid grid-cols-4 p-10 text-left border border-black">
                            <div class="col-span-1">
                                <h3 class="pb-10">Step 4</h3>
                                <p class="pb-10">お受け取り</p>
                            </div>
                            <div class="col-span-1">
                                <div class="z-50 bg-white font-semibold text-sm text-gray-800 leading-tight border border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 10vw; width: 10vw;">アイコン</div>
                            </div>
                            <div class="col-span-2">テキストテキストテキストテキスト</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 id="price" class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            料金
                        </h2>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 id="lotteryTicketsOnSale" class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            販売中の宝くじ情報
                        </h2>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-2 pb-10 flex justify-between"></div>

                            <div class="col-span-4 py-10 text-center">
                                <button type="submit" @click="jumpToOrder" class="border border-black text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-5/6 px-5 py-2.5 text-center">ご注文はこちらから</button>
                            </div>

                            <div class="col-span-2 pb-10"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 id="news" class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            ニュース
                        </h2>

                        <div class="grid grid-cols-3 gap-10 p-10 text-left">

                            <div class="border border-black text-center" style="height:300px;">
                                写真
                            </div>

                            <div class="border border-black text-center" style="height:300px;">
                                写真
                            </div>

                            <div class="border border-black text-center" style="height:300px;">
                                写真
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

                        <h2 id="FAQ" class="font-semibold text-xl text-gray-800 leading-tight py-10">
                            よくあるご質問
                        </h2>

                        <p>Q テキストテキストテキストテキスト</p>

                        <p>A テキストテキストテキストテキスト</p>

                    </div>
                </div>
            </div>
        </div>

    </BreezeGuestLayout>
</template>

<script>
    export default {
        methods: {
            jumpToOrder: function() {
                this.$inertia.get('/form');
            }
        }
    }
</script>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>
