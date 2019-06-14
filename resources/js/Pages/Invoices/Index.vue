<template>
  <layout title="Invoices">
    <h1 class="mb-8 font-bold text-3xl">Invoices</h1>

	<div>{{ invoices }}</div>

    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('ID')">ID</th>
		  <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('status')">Status</th>
          <th class="px-6 pt-6 pb-4"></th>
        </tr>
        <tr v-for="invoice in invoices" :key="invoice.id" @click="show(invoice)" class="hover:bg-grey-lightest focus-within:bg-grey-lightest cursor-pointer">
          <td class="border-t px-6 py-4 flex items-center">
            {{ invoice.id }}
          </td>
		  <td class="border-t">
            {{ invoice.status }}
          </td>
          <td class="border-t w-px">
            <inertia-link class="px-4 flex items-center" :href="route('customers.show', invoice.id)" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-grey" />
            </inertia-link>
          </td>
        </tr>
        <tr v-if="invoices.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No invoices found.</td>
        </tr>
      </table>
    </div>

    <modal v-if="invoice !== null" :showing="showModal" @close="showModal = false">
    </modal>
    
  </layout>
</template>

<script>
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
    invoices: Array
  },
  data() {
    return {
      showModal: false,
      invoice: null
    }
  },
  watch: {
    
  },
  methods: {
    show: function(invoice) {
      this.invoice = invoice;
      this.showModal = true;
    }
  },
}
</script>
