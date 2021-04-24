<template>
	<file-layout> 
		<template #form>
			<category-table :categories="categories"></category-table>
		</template>
	</file-layout> 
</template>
<script>
	 import FileLayout from '@/Pages/Admin/File'
	 import CategoryTable from '@/Layouts/components/Cards/CategoryTable'

	export default{
		props:{
			categories:Array
		},
		components: {
		    FileLayout,
		    CategoryTable
		},
	}
</script>