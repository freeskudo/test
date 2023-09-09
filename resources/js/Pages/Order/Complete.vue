<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeCheckboxes from '@/Components/Checkboxes.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    lotteries: Array,
    purchase_dates: Array,
    purchase_windows: Array,
    request: Array
});

</script>

<template>
    <Head title="完了" />

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
                            ご注文完了
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
                                <div class="z-50 bg-white font-semibold text-xl text-gray-800 leading-tight border-b border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 50px; width: 50px;">2</div>
                                <p class="pt-3">ご注文確認</p>
                            </div>
                            <div style="position:relative;">
                                <div class="border-t-4 border-gray-900 w-full" style="position:absolute; top:25%; left:0;"></div>
                            </div>
                            <div style="position:relative;">
                                <div class="z-0 border-t-4 border-gray-900 w-1/2" style="position:absolute; top:25%; left:0"></div>
                                <div class="z-50 bg-black font-semibold text-xl text-gray-100 leading-tight border-b border-gray-700 rounded-full flex items-center justify-center mx-auto" style="position:relative; height: 50px; width: 50px;">3</div>
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
                <div class="bg-white overflow-hidden">
                    <div class="p-6 bg-white text-center border border-black">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                            ご注文ありがとうございました。
                        </h2>

                        <div class="grid grid-cols-8 text-left">

                            <div class="col-span-1 pb-10 flex justify-between"></div>

                            <div class="col-span-6 pb-10 text-center">
                                <p class="text-left">ご入力いただいたメールアドレスに「ご注文完了メール」をお送りいたしますので、ご確認お願いいたします。</p>
                                <p class="text-left">振込先情報は、ご注文完了メールでお知らせいたします。</p>
                                <p class="text-left">◯営業日経ってもメールが届かない場合、恐れ入りますが下記までご連絡ください。</p>

                                <p class="text-left">TEL:00-0000-0000</p>
                                <p class="text-left">MAIL: xxx@xxx.co.jp</p>
                            </div>

                            <div class="col-span-1 pb-10"></div>

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
            }
        }
    }
</script>