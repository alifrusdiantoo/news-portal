<x-dashboard>
	<!-- Start block -->
	<section class="bg-gray-50 dark:bg-gray-900 antialiased">
		<div class="mx-auto max-w-screen px-4 lg:px-4">
			<!-- Start coding here -->
			<div class="p-8 bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
				<div class="flex flex-col md:flex-row mb-8 justify-between space-y-3 md:space-y-0 md:space-x-4">
					<button onclick="openModal('create-category-modal')" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
						<svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
						</svg>
						Add category
					</button>
				</div>

				<!-- Alert -->
				@if(session()->has('success'))
				<div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
					<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
					<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
					<span class="sr-only">Info</span>
					<div class="ms-3 text-sm font-medium">
						{{ session('success') }}
					</div>
					<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
					</svg>
					</button>
				</div>
				@endif
				
				<div class="overflow-x-auto">
					<table class="mb-10 w-full text-sm text-left text-gray-500 dark:text-gray-400">
						<thead class="text-xs text-gray-700 text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
							<tr>
								<th scope="col" class="px-4 py-3">No</th>
								<th scope="col" class="px-4 py-3">Name</th>
								<th scope="col" class="px-4 py-3">Actions</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($categories as $category)
							<tr class="border-b dark:border-gray-700">
								<td scope="row" class="px-4 py-3">{{ $loop->iteration }}</td>
								<td class="px-4 py-3">{{ $category->name }}</td>
								<td class="px-4 py-3 flex justify-center">
									<button onclick="openEditModal('{{ $category->id }}','{{ $category->name }}')" class="text-gray-700">
										<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
											<path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
										</svg>
									</button>

									<button onclick="openDeleteModal('{{ $category->id }}')" class="text-red-500">
										<svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
											<path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
										</svg>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!-- End block -->

	<!-- Create Category Modal -->
	<div id="create-category-modal" class="fixed inset-0 hidden bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
		<div class="bg-white rounded-md shadow-lg p-6 max-w-sm">
			<h2 class="text-xl font-bold mb-4">Add Category</h2>
			<form action="/dashboard/categories" method="post">
				@csrf
				<div class="my-8">
					<label for="name" class="block text-gray-700 font-bold mb-2">Nama:</label>
					<input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Name">
				</div>
				<div class="text-center flex flex-fill gap-2">
					<button type="submit" class="basis-1/2 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">Submit</button>
					<button type="button" onclick="closeModal('create-category-modal')" class="basis-1/2 bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 focus:bg-gray-700 focus:outline-none">Batal</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Edit Category Modal -->
	<div id="edit-category-modal" class="fixed inset-0 hidden bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
		<div class="bg-white rounded-md shadow-lg p-6 max-w-sm">
			<h2 class="text-xl font-bold mb-4">Edit Category</h2>
			<form id="edit-category-form" method="post" action="">
				@method('put')
				@csrf
				<div class="my-8">
					<label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
					<input type="text" name="name" id="edit-category-name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama">
				</div>
				<div class="text-center flex flex-fill gap-2">
					<button type="submit" class="basis-1/2 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">Edit</button>
					<button type="button" onclick="closeModal('edit-category-modal')" class="basis-1/2 bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 focus:bg-gray-700 focus:outline-none">Batal</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Delete Category Modal -->
	<div id="delete-category-modal" class="fixed inset-0 hidden bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
		<div class="flex flex-col justify-center items-center bg-white rounded-md shadow-lg p-6 max-w-sm">
			<svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
			</svg>

			<p class="text-center text-gray-500 dark:text-gray-300">Are you sure you want to delete this category ?</p>
			<p class="mb-4 text-center text-gray-500 dark:text-gray-300">(ID: <span id="id-category"></span>)</p>

			<div class="text-center flex flex-fill gap-2">
				<form action="" method="post" id="delete-category-form" class="basis-1/2">
					@method('delete')
					@csrf
					<button class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes</button>
				</form>
				<button onclick="closeModal('delete-category-modal')" class="basis-1/2 py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
			</div>

		</div>
	</div>

	<script>
		function openModal(modalId) {
			document.getElementById(modalId).classList.remove('hidden');
		}

		function closeModal(modalId) {
			document.getElementById(modalId).classList.add('hidden');
		}

		function openEditModal(id, name) {
			document.getElementById('edit-category-form').action = '/dashboard/categories/' + id;
			document.getElementById('edit-category-name').value = name;
			openModal('edit-category-modal');
		}

		function openDeleteModal(id) {
			document.getElementById('delete-category-form').action = '/dashboard/categories/' + id;
			document.getElementById('id-category').innerHTML = id;
			openModal('delete-category-modal');
		}
	</script>
</x-dashboard>