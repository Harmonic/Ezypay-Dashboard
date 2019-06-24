<template>
  <layout title="Users">
    <h1 class="mb-8 font-bold text-3xl">Users</h1>
    
    <inertia-table :data="users" id="id" :order="order" :filters="filters" :columns="columns" @item-selected="show"></inertia-table>
    
  </layout>
</template>

<script>
import _ from 'lodash'
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import InertiaTable from '@/Shared/InertiaTable'

export default {
  components: {
    Icon,
    Layout,
    InertiaTable
  },
  props: {
    users: Array,
    filters: Object,
    order: Object,
  },
  data() {
    return {
      columns: ["name", "email"],
    }
  },
  watch: {
    
  },
  methods: {
    show() {
      //TODO: Call inertia link somehow: https://github.com/inertiajs/inertia-vue/blob/master/src/link.js
    }
  },
}
</script>
