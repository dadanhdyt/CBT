<template>
     <div class="grid grid-cols-1 gap-10 mt-4 sm:grid-cols-3">
          <div v-for="i in 3" class="relative flex flex-col gap-2 p-2 bg-white rounded shadow">
            <div class="flex justify-between">
              <div class="flex flex-row items-center gap-2">
                <span class="w-8 h-8 bg-gray-200 rounded-lg animate-pulse"></span>
                <span class="h-3 bg-gray-200 rounded-lg animate-pulse w-36"></span>
              </div>
              <span class="w-24 h-6 bg-gray-200 rounded-lg animate-pulse"></span>
            </div>
            <div class="flex flex-col gap-3 mt-4">
              <div class="flex justify-between gap-3">
                <span class="h-2 bg-gray-200 rounded-lg animate-pulse w-60"></span>
                <span class="w-24 h-2 bg-gray-200 rounded-lg animate-pulse"></span>
              </div>
              <div class="flex justify-between gap-3">
                <span class="h-2 bg-gray-200 rounded-lg animate-pulse w-60"></span>
                <span class="w-24 h-2 bg-gray-200 rounded-lg animate-pulse"></span>
              </div>
              <div class="flex justify-between gap-3">
                <span class="h-2 bg-gray-200 rounded-lg animate-pulse w-60"></span>
                <span class="w-24 h-2 bg-gray-200 rounded-lg animate-pulse"></span>
              </div>
              <div class="flex justify-between gap-3">
                <span class="h-2 bg-gray-200 rounded-lg animate-pulse w-60"></span>
                <span class="w-24 h-2 bg-gray-200 rounded-lg animate-pulse"></span>
              </div>
              <div class="mt-4">
                <span class="relative block w-full h-8 bg-gray-200 rounded-lg animate-pulse"></span>

              </div>
            </div>
          </div>
        </div>
</template>