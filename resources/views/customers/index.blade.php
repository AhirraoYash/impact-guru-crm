<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customer Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">All Customers</h3>
                        
                        <a href="{{ route('customers.create') }}" 
                           style="background-color: blue; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                            + Add New Customer
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="border px-4 py-2">Image</th>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Email</th>
                                    <th class="border px-4 py-2">Phone</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr class="hover:bg-gray-50">
                                    
                                    <td class="border px-4 py-2">
                                        @if($customer->profile_image)
                                            <img src="{{ asset('images/' . $customer->profile_image) }}" alt="Img" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                        @else
                                            <span class="text-gray-400 text-sm">No Img</span>
                                        @endif
                                    </td>

                                    <td class="border px-4 py-2">{{ $customer->name }}</td>
                                    <td class="border px-4 py-2">{{ $customer->email }}</td>
                                    <td class="border px-4 py-2">{{ $customer->phone }}</td>
                                    
                                    <td class="border px-4 py-2">
                                        
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                                        
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                
                                @if($customers->isEmpty())
                                <tr>
                                    <td colspan="5" class="border px-4 py-4 text-center text-gray-500">
                                        No customers found. Click "Add New Customer" to start.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $customers->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>