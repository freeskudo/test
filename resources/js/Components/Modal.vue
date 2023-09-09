
<script setup>

import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

const open = ref(true)
</script>

<template>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="relative z-50" @close="open = false">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
      </TransitionChild>

      <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <DialogPanel class="relative transform overflow-hidden bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

              <div class="min-h-screen text-center m-10">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight py-10">
                    購入の種類
                </h2>

                <div class="text-left p-10">
                  <h4 class="font-bold pb-4">連番</h4>
                  <p>テキストが入ります</p>
                </div>

                <div class="text-left p-10">
                  <h4 class="font-bold pb-4">福連100</h4>
                  <p>連番10枚が10セットの計100枚（下2桁00〜99全てあり）</p>
                </div>

                <div class="text-left p-10">
                  <h4 class="font-bold pb-4">バラ</h4>
                  <p>テキストが入ります</p>
                </div>

                <div class="text-left p-10">
                  <h4 class="font-bold pb-4">3連バラ</h4>
                  <p>最低30枚の購入が必要で、「バラで連番3枚を10通り買う」という購入方法</p>
                </div>

                <div class="text-left p-10">
                  <h4 class="font-bold pb-4">福バラ100</h4>
                  <p>バラ10枚が10セットの100枚（下2桁00〜99全てあり）さらに組番号が100種類揃っている</p>
                </div>

                <div class="text-left p-10"></div>

              </div>

            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>