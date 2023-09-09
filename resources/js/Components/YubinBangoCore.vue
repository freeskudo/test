<template>

  <div class="col-span-2 pb-10 flex justify-between"><p>郵便番号</p><p class="mr-8">必須</p></div>

  <div class="col-span-4 pb-10">
    <input
    type="text"
    v-bind:id="'post-'+id"
    v-bind:name="'post-'+id"
    v-model="postalCode"
    autocomplete="postal-code"
    placeholder="例） 0000000"
    @change="changePostCode"
    class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10">
    <div v-show="errors['post-'+id]" class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( errors['post-'+id] ? errors['post-'+id] : "" ).replace('post-'+id, '郵便番号') }}</div>
  </div>

  <div class="col-span-2 pb-10">
    <a href="https://www.post.japanpost.jp/zipcode/" target="_blank" rel="noopener noreferrer" class="underline flex">
      <p class="pl-6 pr-2">郵便番号を調べる</p>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
      </svg>
    </a>
  </div>

  <div class="col-span-2 pb-10 flex justify-between"><p>都道府県</p><p class="mr-8">必須</p></div>

  <div class="col-span-4 pb-10">
    <select
      v-bind:id="'region-'+id"
      v-bind:name="'region-'+id"
      v-model="addressRegion"
      @change="resetValidationMessage"
      autocomplete='address-level1'
      class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10">
      <option disabled selected>都道府県を選択してください</option>
      <option v-for="item in listRegion" v-bind:value="item">{{ item }}</option>
    </select>
    <div v-show="errors['post-'+id]" class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( errors['region-'+id] ? errors['region-'+id] : "" ).replace('region-'+id, '都道府県') }}</div>
  </div>

  <div class="col-span-2 pb-10"></div>

  <div class="col-span-2 pb-10 flex justify-between"><p>市区町村</p><p class="mr-8">必須</p></div>

  <div class="col-span-4 pb-10">
    <input
    type="text"
    v-bind:id="'locality-'+id"
    v-bind:name="'locality-'+id"
    v-model="addressLocality"
    @change="resetValidationMessage"
    autocomplete="address-level2"
    placeholder="例） 新宿区"
    class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10">
    <div v-show="errors['locality-'+id]" class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( errors['locality-'+id] ? errors['locality-'+id] : "" ).replace('locality-'+id, '市区町村') }}</div>
  </div>

  <div class="col-span-2 pb-10"></div>

  <div class="col-span-2 pb-10 flex justify-between"><p>それ以降の住所</p><p class="mr-8">必須</p></div>

  <div class="col-span-4 pb-10">
    <input
      type="text"
      v-bind:id="'street-'+id"
      v-bind:name="'street-'+id"
      v-model="addressStreet"
      @change="resetValidationMessage"
      autocomplete="street-address"
      placeholder="例） 新宿区"
      class="bg-white border border-black hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline w-full px-10">
      <div v-show="errors['street-'+id]" class="p-1 m-1 text-sm text-red-400 mb-10">{{ ( errors['street-'+id] ? errors['street-'+id] : "" ).replace('street-'+id, '住所') }}</div>
  </div>

  <div class="col-span-2 pb-10"></div>

</template>

<script>
  import { Core as YubinBangoCore } from 'yubinbango-core2'
  /*
    Copyright (c) 2016 小林照幸, Shota Watanabe, Ryosuke Tsuji
    Released under the MIT license
    https://github.com/yubinbango/yubinbango-core
  */

  export default {
    props: [
      'id',
      'errors'
    ],
    data() {
      return{
        postalCode : null,
        address : null,
        addressRegion : '都道府県を選択してください',
        addressLocality : null,
        addressStreet : null,
        listRegion : [
          '北海道',
          '青森県',
          '岩手県',
          '宮城県',
          '秋田県',
          '山形県',
          '福島県',
          '茨城県',
          '栃木県',
          '群馬県',
          '埼玉県',
          '千葉県',
          '東京都',
          '神奈川県',
          '新潟県',
          '富山県',
          '石川県',
          '福井県',
          '山梨県',
          '長野県',
          '岐阜県',
          '静岡県',
          '愛知県',
          '三重県',
          '滋賀県',
          '京都府',
          '大阪府',
          '兵庫県',
          '奈良県',
          '和歌山県',
          '鳥取県',
          '島根県',
          '岡山県',
          '広島県',
          '山口県',
          '徳島県',
          '香川県',
          '愛媛県',
          '高知県',
          '福岡県',
          '佐賀県',
          '長崎県',
          '熊本県',
          '大分県',
          '宮崎県',
          '鹿児島県',
          '沖縄県'
        ]
      }
    },
    methods: {
      changePostCode: function (e) {
        this.yubinbango();
        this.resetValidationMessageAll(e);
      },
      yubinbango() {
        this.postalCode = this.postalCode;
        new YubinBangoCore(this.postalCode, (addr)=> {
          this.addressRegion = addr.region // 都道府県
          this.addressLocality = addr.locality // 市区町村
          this.addressStreet = addr.street // 町域

          this.$emit('setAddress', (
            this.address = {
              post: this.postalCode,
              region: this.addressRegion,
              locality: this.addressLocality,
              street: this.addressStreet
            }
          ));

        })
      },
      resetValidationMessageAll(e) {
        this.errors['post-'+this.id] = "";
        this.errors['region-'+this.id]  = "";
        this.errors['locality-'+this.id] = "";
        this.errors['street-'+this.id] = "";
      },
      resetValidationMessage(e) {
        form.errors[e.target.id] = "";
      }
    }
  }
</script>