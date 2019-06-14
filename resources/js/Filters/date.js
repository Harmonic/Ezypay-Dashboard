export default (value) => {
    const date = new Date(value + 'Z')
	return date.toLocaleDateString(['en-AU'], {month: 'short', day: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit'})  //if you want, you can change locale date string
} 