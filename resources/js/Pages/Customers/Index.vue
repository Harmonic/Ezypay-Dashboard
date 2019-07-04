<template>
  <layout title="Customers">
    <h1 class="mb-8 font-bold text-3xl">Customers</h1>

    <inertia-table 
      :data="customers" 
      id="id" 
      :columns="columns" 
      :columnDefs="columnDefs" 
      @item-selected="show"
      routeName="customers"
      >
    </inertia-table>

    <vue-tailwind-modal v-if="customer !== null" :showing="showModal" @close="showModal = false">
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
			{{ customer.address.address1 }}<br />
			{{ customer.address.address2 }}<br />
			{{ customer.address.city }}<br />
			{{ customer.address.state }}<br />
			{{ customer.address.postalCode }}
			{{ customer.address.countryCode }}
		</div>
		<div class="sub-header">Meta Data</div>
		<div class="mb-2" v-for="(value, key) in customer.metadata" v-bind:key="key">
			{{ sentanceCase(key) }}: {{ value }}
		</div>
		<div class="mt-4 text-xs text-gray-400">
			Created {{ customer.createdOn | date }}
		</div>
    </vue-tailwind-modal>
    
  </layout>
</template>

<script>
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import InertiaTable from 'inertia-table'
import VueTailwindModal from 'vue-tailwind-modal'

export default {
  components: {
	  Icon,
    Layout,
    VueTailwindModal,
    InertiaTable
  },
  props: {
    customers: Array
  },
  data() {
    return {
      showModal: false,
      customer: null,
      columns: ["name", "email", "subscription"],
      columnDefs: [ {
          "name": (item) => {
            //return item.firstName + ' ' + item.lastName
            return item.companyName;
          }
        },
        {
          "subscription": (item) => {
            return '<a href="/subscriptions?search='+item.id+'">Subscription</a>';
          }
        }
      ]
    }
  },
  watch: {
    
  },
  methods: {
    show: function(customer) {
      this.customer = customer;
      this.showModal = true;
    },
	sentanceCase: function(text) {
		const result = text.replace(/([A-Z]+)/g, " $1").replace(/([A-Z][a-z])/g, " $1");
		return result.charAt(0).toUpperCase() + result.slice(1);
	}
  },
}
</script>
