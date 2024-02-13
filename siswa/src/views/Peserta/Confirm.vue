<script setup>
    import InputVue from '@/components/Input.vue';
    import ButtonVue from "@/components/Button.vue"
</script>
<template>
    <div class="container mx-auto">
        <div class="shadow-lg border rounded mt-5 max-w-lg mx-auto bg-white">
            <div class="my-2 text-center">
                <span class="text-lg font-bold block py-2">Konfirmasi Ujian</span>
            </div>
            <div class="p-3">
                <ul class="flex mb-5 gap-3 flex-col  divide-y">
                    <li class="pb-2 flex items-center justify-between">
                        <span>Mata Pelajaran: </span>
                        <span>Matematika</span>
                    </li>
                    <li class="pb-2 flex items-center justify-between">
                        <span>Mata Pelajaran: </span>
                        <span>Matematika</span>
                    </li>
                    <li class="pb-2 flex items-center justify-between">
                        <span>Mata Pelajaran: </span>
                        <span>Matematika</span>
                    </li>
                </ul>
                <InputVue placeholder="Ketikan Token UJIAN"/>
                <div class="py-2">
                    <ButtonVue>Mulai</ButtonVue>
                </div>
            </div>
        </div>
    </div>
</template>