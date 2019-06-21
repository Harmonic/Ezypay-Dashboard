<template>
	<div>
		<div v-if="form" class="mb-6 flex justify-between items-center">
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
				<th v-for="header in columns" class="px-6 pt-6 pb-4 cursor-pointer" :class="{'cursor-pointer': order}" :key="header" @click="orderBy(header)">{{ sentanceCase(header) }}</th>
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
	</div>
</template>

<script>
import _ from 'lodash'
import Icon from '@/Shared/Icon'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
	Icon,
	SearchFilter
  },
  props: {
	filters: {
		type: Object,
		default: null
	},
    order: {
		type: Object,
		default: null
	},
	columns: Array,
	data: Array,
	columnDefs: Array,
	id: {
		type: String,
		default: 'id'
	},
	routeName: String
  },
  data() {
    return {
	  item: null,
	  form: null,
    }
  },
  watch: {
    form: {
      handler: _.throttle(function() {
        let query = _.pickBy(this.form)
        this.$inertia.replace(this.route(routeName, Object.keys(query).length ? query : { remember: 'forget' }))
      }, 150),
      deep: true,
	},
	filters: {
		hander: function() {
			this.form = {
				search: this.filters.search,
				orderColumn: this.order.orderColumn,
				orderDirection: this.order.orderDirection,
				trashed: this.filters.trashed,
			}
		},
		deep: true
	},
	orderColumn: {
		hander: function() {
			this.form = {
				search: this.filters.search,
				orderColumn: this.order.orderColumn,
				orderDirection: this.order.orderDirection,
				trashed: this.filters.trashed,
			}
		},
		deep: true
	}
  },
  methods: {
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
	},
	reset() {
      this.form = _.mapValues(this.form, () => null)
    },
    orderBy(column) {
	  if (this.order == null) {
		  return;
	  } 
	  var direction = 'asc';
      if (this.form.orderColumn == column) {
        if (this.form.orderDirection == 'asc') {
          direction = 'desc';
        }
      }
      this.form.orderColumn = column;
      this.form.orderDirection = direction;
    }
  }
}
</script>

<style>

</style>
