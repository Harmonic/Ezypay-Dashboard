<template>
  <layout title="Customers">
    <h1 class="mb-8 font-bold text-3xl">Customers</h1>
    <div>{{ customers }}</div>

    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('name')">Name</th>
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('email')">Email</th>
          <!-- <th class="px-6 pt-6 pb-4" colspan="2">Role</th> -->
        </tr>
        <tr v-for="customer in customers" :key="customer.id" @click="show(customer)" class="hover:bg-grey-lightest focus-within:bg-grey-lightest cursor-pointer">
          <td class="border-t px-6 py-4 flex items-center">
            {{ customer.companyName }}
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('customers.show', customer.id)" tabindex="-1">
              {{ customer.email }}
            </inertia-link>
          </td>
          <td class="border-t w-px">
            <inertia-link class="px-4 flex items-center" :href="route('customers.show', customer.id)" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-grey" />
            </inertia-link>
          </td>
        </tr>
        <tr v-if="customers.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No customers found.</td>
        </tr>
      </table>
    </div>

    <modal v-if="customer !== null" :showing="showModal" @close="showModal = false">
      	<h1 class="text-gray-900 font-bold text-xl mb-2">
		  {{ customer.companyName }}
		</h1>
		<p class="text-sm text-gray-600 flex">{{ customer.id }}</p>
		<div class="sub-header">Account Contact</div>
		<div class="flex mb-2">
			<div class="w-2/3 h-12">
				<div class="font-bold text-gray-800 text-xl">{{ customer.firstName }} {{ customer.lastName }}</div>
				<div class="mt-1 text-gray-600"><a :href="`mailto:${customer.email}`">{{ customer.email }}</a></div>
			</div>
			<div class="w-1/3 h-12">
				<div v-if="customer.homePhone" class="flex">
					<icon name="phone" class="w-4 h-4 mr-2 text-gray-400 fill-current" />{{ customer.homePhone }}
				</div>
				<div v-if="customer.mobilePhone" class="flex mt-2">
					<icon name="mobile" class="w-4 h-4 mr-2 text-gray-400 fill-current" />{{ customer.mobilePhone }}
				</div>
			</div>
		</div>
		<div class="sub-header">Address</div>
		<div>
			{{ customer.address.address1 }}
			{{ customer.address.address2 }}
			{{ customer.address.city }}
			{{ customer.address.state }}
			{{ customer.address.postalCode }}
			{{ customer.address.countryCode }}
		</div>
    </modal>
    
  </layout>
</template>

<script>
import _ from 'lodash'
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import Modal from '@/Shared/Modal'

export default {
  components: {
    Icon,
    Layout,
    Modal
  },
  props: {
    customers: Array
  },
  data() {
    return {
      showModal: false,
      customer: null
    }
  },
  watch: {
    
  },
  methods: {
    show: function(customer) {
      this.customer = customer;
      this.showModal = true;
    }

  },
}
</script>
