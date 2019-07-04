<template>
  <layout title="Invoices">
    <h1 class="mb-8 font-bold text-3xl">Invoices</h1>

    <inertia-table :data="invoices" id="id" :columns="columns" :columnDefs="columnDefs" @item-selected="show"></inertia-table>

    <vue-tailwind-modal v-if="invoice !== null" :showing="showModal" @close="showModal = false">
      <h1 class="text-gray-900 font-bold text-xl mb-2">
        {{ invoice.documentNumber }}
      </h1>
      Created: {{ invoice.date }} Due: {{ invoice.dueDate }}
      <div class="sub-header">{{ invoice.status }}</div>
      <h2 class="font-bold">Total: ${{ invoice.amount.value }}</h2>
      <h3 class="mt-2">{{ invoice.subscriptionName }}</h3>
      <p class="text-gray-400 text-xs mt-2 cursor-pointer" @click="toggleJSON">View JSON <span v-html="jsonToggleIcon"></span></p>
      <div class="mt-2 bg-gray-100 p-3" v-if="showJSON">
        <vue-json-pretty
          :path="'res'"
          :data="invoice"
          :deep="2">
        </vue-json-pretty>
      </div>
    </vue-tailwind-modal>
    
  </layout>
</template>

<script>
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import VueTailwindModal from 'vue-tailwind-modal'
import InertiaTable from 'inertia-table'
import VueJsonPretty from 'vue-json-pretty'

export default {
  components: {
	Icon,
    Layout,
    VueTailwindModal,
    VueJsonPretty,
    InertiaTable
  },
  props: {
    invoices: Array
  },
  data() {
    return {
      showModal: false,
      invoice: null,
      jsonToggleIcon: "&#9650;",
      showJSON: false,
      columns: ["ID", "status", "value", "subscriptionName"],
      columnDefs: [ {
          "ID": (item) => {
            return item.documentNumber;
          },
          "value": (item) => {
            return "$" + item.amount.value;
          }
        }
      ]
    }
  },
  watch: {
    
  },
  methods: {
    show: function(invoice) {
      this.invoice = invoice;
      this.showModal = true;
    },
    toggleJSON: function() {
      if (this.showJSON) {
        this.jsonToggleIcon = "&#9650;"; // Up arrow
        this.showJSON = false;
      } else {
        this.jsonToggleIcon = "&#9660;"; // Down arrow
        this.showJSON = true;
      }
    }
  },
}
</script>
