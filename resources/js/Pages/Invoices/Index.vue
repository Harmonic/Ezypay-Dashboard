<template>
  <layout title="Invoices">
    <h1 class="mb-8 font-bold text-3xl">Invoices</h1>

	<div>{{ invoices }}</div>

    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('documentNumber')">Invoice Number</th>
		      <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('status')">Status</th>
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('amount.value')">Value</th>
          <th class="px-6 pt-6 pb-4 cursor-pointer" @click="orderBy('subscriptionName')">Plan</th>
          <th class="px-6 pt-6 pb-4"></th>
        </tr>
        <tr v-for="invoice in invoices" :key="invoice.id" @click="show(invoice)" class="hover:bg-grey-lightest focus-within:bg-grey-lightest cursor-pointer">
          <td class="border-t px-6 py-4 flex items-center">
            {{ invoice.documentNumber }}
          </td>
		      <td class="border-t">
            {{ invoice.status }}
          </td>
          <td class="border-t">
            ${{ invoice.amount.value }}
          </td>
          <td class="border-t">{{ invoice.subscriptionName }}</td>
          <td class="border-t w-px">
              <icon name="cheveron-right" class="block w-6 h-6 fill-grey" />
          </td>
        </tr>
        <tr v-if="invoices.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No invoices found.</td>
        </tr>
      </table>
    </div>

    <modal v-if="invoice !== null" :showing="showModal" @close="showModal = false">
      <h1 class="text-gray-900 font-bold text-xl mb-2">
        {{ invoice.documentNumber }}
      </h1>
      Created: {{ invoice.date }} Due: {{ invoice.dueDate }}
      <div class="sub-header">{{ invoice.status }}</div>
      <h2 class="font-bold">Total: ${{ invoice.amount.value }}</h2>
      <h3 class="mt-2">{{ invoice.subscriptionName }}</h3>
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
