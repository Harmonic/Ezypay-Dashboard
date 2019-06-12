<template>
  <layout title="Users">
    <h1 class="mb-8 font-bold text-3xl">Customers</h1>
    <div>{{ customers }}</div>
  </layout>
</template>

<script>
import _ from 'lodash'
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'

export default {
  components: {
    Icon,
    Layout
  },
  props: {
    customers: Array
  },
  data() {
    return {
      
    }
  },
  watch: {
    
  },
  methods: {
    
  },
}
</script>
