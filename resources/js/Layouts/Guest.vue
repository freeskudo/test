<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">

            <p v-if="route().current('top')" class="bg-white text-center border border-black">
                2022サマージャンボ受付中！お申し込み期間：7月1日〜8月14日
            </p>

            <header class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden">
                        <div class="p-6 bg-white text-center border border-black">

                            <div class="flex justify-between">

                                <div>

                                    <a @click="jumpToFeature" class="p-4 cursor-pointer">
                                        特徴
                                    </a>

                                    <a @click="jumpToHowToApply" class="p-4 cursor-pointer">
                                        申し込み方法
                                    </a>

                                    <a @click="jumpToPrice" class="p-4 cursor-pointer">
                                        料金
                                    </a>

                                    <a @click="jumpToLotteryTicketsOnSale" class="p-4 cursor-pointer">
                                        販売中の宝くじ
                                    </a>

                                    <a @click="jumpToNews" class="p-4 cursor-pointer">
                                        ニュース
                                    </a>

                                    <a @click="jumpToFAQ" class="p-4 cursor-pointer">
                                        よくあるご質問
                                    </a>

                                </div>

                                <div>

                                    <Link :href="route('form')" class="p-4">
                                        ご注文
                                    </Link>

                                    <Link v-if="$page.props.auth.user" :href="route('login')" class="p-4">
                                        マイページ
                                    </Link>
                                    <Link v-else :href="route('login')" class="p-4">
                                        ログイン
                                    </Link>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>

            <footer class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden">
                        <div class="p-6 bg-white text-center border border-black">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-10">
                                フッター
                            </h2>

                            <div class="flex justify-between m-20">

                                <Link :href="route('about.us')" class="underline cursor-pointer">
                                    会社情報
                                </Link>

                                <a :href="route('terms.of.service')" target="_blank" rel="noopener noreferrer" class="underline cursor-pointer">
                                    利用規約
                                </a>

                                <Link :href="route('specified.commercial.transaction.law')" class="underline cursor-pointer">
                                    特定商取引法
                                </Link>

                                <a :href="route('privacy.policy')" target="_blank" rel="noopener noreferrer" class="underline cursor-pointer">
                                    プライバシーポリシー
                                </a>

                                <Link :href="route('contact.us')" class="underline cursor-pointer">
                                    お問い合わせ
                                </Link>

                            </div>

                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

</template>

<script>
    export default {
        methods: {
            jumpToFeature: function() {
                this.$inertia.get('/#feature');
            },
            jumpToHowToApply: function() {
                this.$inertia.get('/#howToApply');
            },
            jumpToPrice: function() {
                this.$inertia.get('/#price');
            },
            jumpToLotteryTicketsOnSale: function() {
                this.$inertia.get('/#lotteryTicketsOnSale');
            },
            jumpToNews: function() {
                this.$inertia.get('/#news');
            },
            jumpToFAQ: function() {
                this.$inertia.get('/#FAQ');
            }
        }
    }
</script>