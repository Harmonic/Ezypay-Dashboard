<template>
  <div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" href="/">
        <icon name="dashboard" class="w-4 h-4 mr-2" :class="isUrl('') ? 'text-white fill-current' : 'text-primary-400 fill-current group-hover:text-white fill-current'" />
        <div :class="isUrl('') ? 'text-white' : 'text-primary-400 group-hover:text-white'">Dashboard</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" href="/users">
        <icon name="users" class="w-4 h-4 mr-2" :class="isUrl('users') ? 'text-white fill-current' : 'text-primary-400 fill-current group-hover:text-white fill-current'" />
        <div :class="isUrl('users') ? 'text-white' : 'text-primary-400 group-hover:text-white'">Users</div>
      </inertia-link>
    </div>
	  <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('customers')">
        <icon name="office" class="w-4 h-4 mr-2" :class="isUrl('customers') ? 'text-white fill-current' : 'text-primary-400 fill-current group-hover:text-white fill-current'" />
        <div :class="isUrl('customers') ? 'text-white' : 'text-primary-400 group-hover:text-white'">Customers</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('invoices')">
        <icon name="office" class="w-4 h-4 mr-2" :class="isUrl('invoices') ? 'text-white fill-current' : 'text-primary-400 fill-current group-hover:text-white fill-current'" />
        <div :class="isUrl('invoices') ? 'text-white' : 'text-primary-400 group-hover:text-white'">Invoices</div>
      </inertia-link>
    </div>
  </div>
    
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
  },
  methods: {
    isUrl(...urls) {
      if (urls[0] === '') {
        return location.pathname.substr(1) === ''
      }

      return urls.filter(url => location.pathname.substr(1).startsWith(url)).length
    },
  },
}
</script>
