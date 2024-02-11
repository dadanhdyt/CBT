<script setup>
const model = defineModel()
const props = defineProps({
  error: Boolean,
  placeholder: String,
  type: String,
  errorMsg: String
})
</script>
<template>
  <input
    :type="type ?? 'text'"
    :placeholder="placeholder ?? ''"
    :class="
      props.error
        ? `bg-red-50 border border-red-400 rounded outline-none  px-3 block focus:ring-red-500 focus:border-red-500 text-gray-700 w-full py-2`
        : 'w-full py-2 bg-gray-100 border border-gray-200 rounded outline-none  px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700'
    "
    type="text"
    v-model="model"
  />
  <div v-if="props.error == true" class="flex items-center mt-1 text-red-700">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
      <path
        fill-rule="evenodd"
        d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
        clip-rule="evenodd"
      />
    </svg>
    <p class="ml-1 text-xs">{{ errorMsg ?? '' }}</p>
  </div>
</template>
