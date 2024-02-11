<script setup>
import { $api } from '@/api'
$api.get('peserta/get_user')
</script>
<template>
  <h1>Home view</h1>
</template>
