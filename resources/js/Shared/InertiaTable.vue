<template>
	<div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
			 <th v-for="header in columns" class="px-6 pt-6 pb-4 cursor-pointer" :key="header" @click="orderBy(header)">{{ sentanceCase(header) }}</th>
        </tr>
        <tr v-for="(item) in data" :key="item[id]" @click="$emit('item-selected', item)" class="hover:bg-gray-100 focus-within:bg-gray-100 cursor-pointer">
		  <td v-for="(column, index) in columns" :key="index" class="border-t" v-bind:class="{ 'px-6 py-4 flex items-center': index === 0 }">
			{{ columnData(item, column) }}
          </td>
          <td class="border-t w-px">
            <p class="px-4 flex items-center">
              <icon name="cheveron-right" class="block w-6 h-6 fill-grey" />
            </p>
          </td>
        </tr>
        <tr v-if="data.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No data found.</td>
        </tr>
      </table>
    </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
  components: {
	Icon
  },
  props: {
	columns: Array,
	data: Array,
	columnDefs: Array,
	id: {
		type: String,
		default: 'id'
	}
  },
  data() {
    return {
      item: null
    }
  },
  watch: {
    
  },
  methods: {
    rowClick: function(item) {
      //TODO: return default return value item
    },
	columnData: function(item, column) {
		if (item.hasOwnProperty(column)) {
			return item[column];
		}	
		var columnData = this.columnDefs.find(columnDef => {
			return columnDef.hasOwnProperty(column);
		});

		if (columnData !== undefined) {
			return columnData[column](item);
		}

		return "Column data not found";
	},
	sentanceCase: function(text) {
		const result = text.replace(/([A-Z]+)/g, " $1").replace(/([A-Z][a-z])/g, " $1");
		return result.charAt(0).toUpperCase() + result.slice(1);
	}
  }
}
</script>

<style>

</style>
