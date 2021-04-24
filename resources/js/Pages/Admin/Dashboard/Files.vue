<template>
	<file-layout> 
		<template #form>
			<card-table :files="files"></card-table>
		</template>
	</file-layout> 
</template>
<script>
	 import FileLayout from '@/Pages/Admin/File'
	 import CardTable from '@/Layouts/components/Cards/CardTable'
	export default{
		props:{
			files:Array
		},
		components: {
		    FileLayout,
		    CardTable 
		},
	}
</script>