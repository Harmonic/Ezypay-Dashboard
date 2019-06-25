<template>
  <layout title="Subscriptions">
    <h1 class="mb-8 font-bold text-3xl">Subscriptions</h1>

	{{ subscriptions }}

    <inertia-table :data="subscriptions" id="id" :columns="columns" :columnDefs="columnDefs" @item-selected="show"></inertia-table>

    <modal v-if="subscription !== null" :showing="showModal" @close="showModal = false">
      <h1 class="text-gray-900 font-bold text-xl mb-2">
        {{ subscription.documentNumber }}
      </h1>
      Created: {{ subscription.date }} Due: {{ subscription.dueDate }}
      <div class="sub-header">{{ subscription.status }}</div>
      <h2 class="font-bold">Total: ${{ subscription.amount.value }}</h2>
      <h3 class="mt-2">{{ subscription.subscriptionName }}</h3>
      <p class="text-gray-400 text-xs mt-2 cursor-pointer" @click="toggleJSON">View JSON <span v-html="jsonToggleIcon"></span></p>
      <div class="mt-2 bg-gray-100 p-3" v-if="showJSON">
        <vue-json-pretty
          :path="'res'"
          :data="subscription"
          :deep="2">
        </vue-json-pretty>
      </div>
    </modal>
    
  </layout>
</template>

<script>
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import Modal from '@/Shared/Modal'
import InertiaTable from 'inertia-table'
import VueJsonPretty from 'vue-json-pretty'

export default {
  components: {
	Icon,
    Layout,
    Modal,
    VueJsonPretty,
    InertiaTable
  },
  props: {
    subscriptions: Array
  },
  data() {
    return {
      showModal: false,
      subscription: null,
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
    show: function(subscription) {
      this.subscription = subscription;
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
