<template>
  <layout title="Users">
    <h1 class="mb-8 font-bold text-3xl">Users</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter v-model="form.search" class="w-full max-w-md mr-4" @reset="reset">
        <!-- <label class="block text-grey-darkest">Role:</label>
        <select v-model="form.role" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="user">User</option>
          <option value="owner">Owner</option>
        </select> -->
        <label class="mt-4 block text-grey-darkest">Trashed:</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <inertia-link class="btn-primary" :href="route('users.create')">
        <span>Create</span>
        <span class="hidden md:inline">User</span>
      </inertia-link>
    </div>
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('name')">Name</th>
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('email')">Email</th>
          <!-- <th class="px-6 pt-6 pb-4" colspan="2">Role</th> -->
        </tr>
        <tr v-for="user in users" :key="user.id" class="hover:bg-grey-lightest focus-within:bg-grey-lightest">
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center focus:text-primary" :href="route('users.edit', user.id)">
              {{ user.name }}
              <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-grey ml-2" />
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('users.edit', user.id)" tabindex="-1">
              {{ user.email }}
            </inertia-link>
          </td>
          <!-- <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('users.edit', user.id)" tabindex="-1">
              {{ user.owner ? 'Owner' : 'User' }}
            </inertia-link>
          </td> -->
          <td class="border-t w-px">
            <inertia-link class="px-4 flex items-center" :href="route('users.edit', user.id)" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-grey" />
            </inertia-link>
          </td>
        </tr>
        <tr v-if="users.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No users found.</td>
        </tr>
      </table>
    </div>
  </layout>
</template>

<script>
import _ from 'lodash'
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Icon,
    Layout,
    SearchFilter,
  },
  props: {
    users: Array,
    filters: Object,
    order: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        //role: this.filters.role,
        orderColumn: this.order.orderColumn,
        orderDirection: this.order.orderDirection,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      handler: _.throttle(function() {
        let query = _.pickBy(this.form)
        this.$inertia.replace(this.route('users', Object.keys(query).length ? query : { remember: 'forget' }))
      }, 150),
      deep: true,
    },
  },
  methods: {
    reset() {
      this.form = _.mapValues(this.form, () => null)
    },
    orderBy(column) {
      var direction = 'asc';
      console.log(column);
      if (this.form.orderColumn == column) {
        if (this.form.orderDirection == 'asc') {
          direction = 'desc';
        }
      }
      this.form.orderColumn = column;
      this.form.orderDirection = direction;
    }
  },
}
</script>
